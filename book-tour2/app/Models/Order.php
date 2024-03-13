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
	protected $table = 'orders';
	protected $primaryKey = 'Order_ID';
	public $timestamps = false;

	protected $casts = [
		'Customer_ID' => 'int'
	];

	protected $fillable = [
		'Customer_ID',
		'Status'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'Customer_ID');
	}

	public function books()
	{
		return $this->belongsToMany(Book::class, 'orderbooks', 'OrderID', 'Book_ID')
					->withPivot('Quantity');
	}
}
