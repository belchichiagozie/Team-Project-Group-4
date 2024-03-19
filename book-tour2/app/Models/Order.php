<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $Order_ID
 * @property int $Customer_ID
 * @property string $Status
 * 
 * @property Customer $customer
 * @property Collection|Book[] $books
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'order_items';
	public $timestamps = true;

	protected $casts = [
		'User_ID' => 'int',
		'Book_ID' => 'int'
	];

	protected $fillable = [
		'User_ID',
		'Book_ID',
		'Quantity'
	];

	public function customer()
	{
		return $this->belongsTo(User::class, 'User_ID');
	}

	public function books()
{
    return $this->belongsToMany(Book::class, 'order_items', 'User_ID', 'Book_ID')->withPivot('Quantity');
}



}