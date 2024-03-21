<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'Order_Item_ID';

    public $timestamps = true;
    protected $fillable = [
        'Order_ID',
        'Book_ID',
        'Quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'Order_ID');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'Book_ID');
    }
}