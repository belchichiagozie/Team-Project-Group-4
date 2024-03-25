<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('Order_Item_ID');
            $table->unsignedInteger('Order_ID');
            $table->integer('Book_ID');
            $table->integer('Quantity')->nullable();
            $table->timestamps();
            
            $table->foreign('Book_ID', 'fk_books_book_id')->references('Book_ID')->on('books');
            $table->foreign('Order_ID', 'fk_orders_order_id')->references('Order_ID')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
