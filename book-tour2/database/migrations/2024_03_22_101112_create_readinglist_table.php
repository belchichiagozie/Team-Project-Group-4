<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadinglistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readinglist', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('Book_ID');
            
            $table->foreign('Book_ID', 'fk_readinglist_book_id')->references('Book_ID')->on('books');
            $table->foreign('User_ID', 'fk_readinglist_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('readinglist');
    }
}
