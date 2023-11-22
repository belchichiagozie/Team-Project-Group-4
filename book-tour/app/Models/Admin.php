<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
