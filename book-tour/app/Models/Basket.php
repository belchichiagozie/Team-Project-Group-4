<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Basket
 * 
 * @property int|null $Customer_ID
 * @property int|null $Book_ID
 * @property string $Quantity
 * 
 * @property Customer|null $customer
 * @property Book|null $book
 *
 * @package App\Models
 */
class Basket extends Model
{
	protected $table = 'basket';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Customer_ID' => 'int',
		'Book_ID' => 'int'
	];

	protected $fillable = [
		'Customer_ID',
		'Book_ID',
		'Quantity'
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
