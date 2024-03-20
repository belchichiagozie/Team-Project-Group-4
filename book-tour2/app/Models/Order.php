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
	public $timestamps = true;

	protected $casts = [
		'User_ID' => 'int',
		'Book_ID' => 'int'
	];

	protected $fillable = [
        'User_ID',
        'Shipping_First_Name',
        'Shipping_Last_Name',
        'Shipping_Address',
        'Shipping_City',
        'Order_Total',
    ];

	public function customer()
	{
		return $this->belongsTo(User::class, 'User_ID');
	}

	public function items()
    {
        return $this->hasMany(OrderItem::class, 'Order_ID');
    }



}