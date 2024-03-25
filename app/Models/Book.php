<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
	use SoftDeletes;
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
		'file'
	];

	public function basket()
	{
		return $this->hasMany(Basket::class, 'Book_ID');
	}

	public function orders()
{
    return $this->belongsToMany(Order::class, 'order_items', 'Book_ID', 'User_ID')->withPivot('Quantity');
}



	public function readinglist()
	{
		return $this->hasOne(Readinglist::class, 'Book_ID');
	}

	public function review()
	{
		return $this->hasOne(Review::class, 'Book_ID');
	}

	public function users()
    {
        return $this->belongsToMany(User::class, 'basket', 'Book_ID', 'user_id')->withPivot('Quantity');
    }
}
