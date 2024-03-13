<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Admin
 * 
 * @property int $Admin_ID
 * @property string $First_Name
 * @property string $Surname
 * @property string $Email
 * @property string $Passkey
 *
 * @package App\Models
 */
class Admin extends Model
{
	use HasFactory, Notifiable;
	use HasApiTokens;
	protected $table = 'admins';
	protected $primaryKey = 'Admin_ID';
	public $timestamps = false;

	protected $fillable = [
		'First_Name',
		'Surname',
		'Email',
		'Passkey'
	];
}
