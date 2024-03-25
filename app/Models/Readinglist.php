<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Readinglist
 * 
 * @property int $User_ID
 * @property int $Book_ID
 * 
 * @property User $user
 * @property Book $book
 *
 * @package App\Models
 */
class Readinglist extends Model
{
	protected $table = 'readinglist';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'User_ID' => 'int',
		'Book_ID' => 'int'
	];

	protected $fillable = [
		'User_ID',
		'Book_ID'
	];

	public function customer()
	{
		return $this->belongsTo(User::class, 'User_ID');
	}

	public function book()
	{
		return $this->belongsTo(Book::class, 'Book_ID');
	}
}
