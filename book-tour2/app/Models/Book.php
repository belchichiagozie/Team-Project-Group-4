<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * 
 * @property int $Book_ID
 * @property string $Title
 * @property string $Author
 * @property string $Genre
 * @property float $Price
 * @property string $Stock
 * @property string $file
 * 
 * @property Basket $basket
 * @property Collection|Order[] $orders
 * @property Readinglist $readinglist
 * @property Review $review
 *
 * @package App\Models
 */
class Book extends Model
{
	protected $table = 'books';
	protected $primaryKey = 'Book_ID';
	public $timestamps = false;

	protected $casts = [
		'Price' => 'float'
	];

	protected $fillable = [
		'Title',
		'Author',
		'Genre',
		'Price',
		'Stock',
		'Favourite',
		'file'
	];

	public function basket()
	{
		return $this->hasOne(Basket::class, 'Book_ID');
	}

	public function orders()
	{
		return $this->belongsToMany(Order::class, 'orderbooks', 'Book_ID', 'OrderID')
					->withPivot('Quantity');
	}

	public function readinglist()
	{
		return $this->hasOne(Readinglist::class, 'Book_ID');
	}

	public function review()
	{
		return $this->hasOne(Review::class, 'Book_ID');
	}

	public function getReviews()
    {
        // Retrieve reviews associated with this book
        return Review::where('Book_ID', $this->Book_ID)->get();
    }

}
