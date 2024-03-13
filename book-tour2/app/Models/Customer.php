<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property int $Customer_ID
 * @property string $First_Name
 * @property string $Surname
 * @property string $Email
 * @property string $Passkey
 * 
 * @property Basket $basket
 * @property Collection|Order[] $orders
 * @property Readinglist $readinglist
 * @property Collection|Review[] $reviews
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customers';
	protected $primaryKey = 'Customer_ID';
	public $timestamps = false;

	protected $fillable = [
		'First_Name',
		'Surname',
		'Email',
		'Passkey'
	];

	public function basket()
	{
		return $this->hasOne(Basket::class, 'Customer_ID');
	}

	public function orders()
	{
		return $this->hasMany(Order::class, 'Customer_ID');
	}

	public function readinglist()
	{
		return $this->hasOne(Readinglist::class, 'Customer_ID');
	}

	public function reviews()
	{
		return $this->hasMany(Review::class, 'Customer_ID');
	}
}
