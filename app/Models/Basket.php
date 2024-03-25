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
		'user_id' => 'int',
		'Book_ID' => 'int'
	];

	protected $fillable = [
		'user_id',
		'Book_ID',
		'Quantity'
	];

	public function customer()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function book()
	{
		return $this->belongsTo(Book::class, 'Book_ID');
	}
}
