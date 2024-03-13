<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Orderbook
 * 
 * @property int|null $OrderID
 * @property int|null $Book_ID
 * @property int $Quantity
 * 
 * @property Order|null $order
 * @property Book|null $book
 *
 * @package App\Models
 */
class Orderbook extends Model
{
	protected $table = 'orderbooks';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'OrderID' => 'int',
		'Book_ID' => 'int',
		'Quantity' => 'int'
	];

	protected $fillable = [
		'OrderID',
		'Book_ID',
		'Quantity'
	];

	public function order()
	{
		return $this->belongsTo(Order::class, 'OrderID');
	}

	public function book()
	{
		return $this->belongsTo(Book::class, 'Book_ID');
	}
}
