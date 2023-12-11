<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * 
 * @property int $Book_ID
 * @property int|null $Customer_ID
 * @property string $Title
 * @property string $Body
 * 
 * @property Book $book
 * @property Customer|null $customer
 *
 * @package App\Models
 */
class Review extends Model
{
	protected $table = 'reviews';
	protected $primaryKey = ['Book_ID', 'Customer_ID'];
	public $timestamps = false;

	protected $casts = [
		'Customer_ID' => 'int',
		'Book_ID' => 'int'
	];

	protected $fillable = [
		'Book_ID',
		'Customer_ID',
		'Title',
		'Body'
	];

	public function book()
	{
		return $this->belongsTo(Book::class, 'Book_ID');
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'Customer_ID');
	}
}
