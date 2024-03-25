<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket', function (Blueprint $table) {
            $table->integer('Book_ID')->nullable();
            $table->integer('Quantity');
            $table->unsignedBigInteger('user_id')->nullable();
            
            $table->foreign('Book_ID', 'fk_book_id')->references('Book_ID')->on('books');
            $table->foreign('user_id', 'fk_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket');
    }
}
