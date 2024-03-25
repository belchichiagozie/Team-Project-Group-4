<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $role
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use Notifiable, HasApiTokens, HasFactory;
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function readingList()
{
    return $this->belongsToMany(Book::class, 'readinglist', 'User_ID', 'Book_ID');
}

	public function basket()
	{
		return $this->belongsToMany(Basket::class,'basket', 'user_id', 'Book_ID');
	}

	public function books()
	{
		return $this->belongsToMany(Book::class, 'basket', 'user_id', 'Book_ID')->withPivot('Quantity');
	}

	public function orders()
	{
		return $this->belongsToMany(Book::class, 'order_items')->withPivot('Quantity', 'Price');
	}
}
