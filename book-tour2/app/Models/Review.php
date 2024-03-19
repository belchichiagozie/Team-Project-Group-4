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
	public $timestamps = true;

	public $incrementing = false;

	protected $casts = [
		'Customer_ID' => 'int'
	];

	protected $fillable = [
		'Customer_ID',
		'Title',
		'Body',
		'Customer_Name',
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
