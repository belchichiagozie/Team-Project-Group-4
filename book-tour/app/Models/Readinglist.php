<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Readinglist
 * 
 * @property int $Customer_ID
 * @property int $Book_ID
 * 
 * @property Customer $customer
 * @property Book $book
 *
 * @package App\Models
 */
class Readinglist extends Model
{
	protected $table = 'readinglist';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Customer_ID' => 'int',
		'Book_ID' => 'int'
	];

	protected $fillable = [
		'Customer_ID',
		'Book_ID'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'Customer_ID');
	}

	public function book()
	{
		return $this->belongsTo(Book::class, 'Book_ID');
	}
}
