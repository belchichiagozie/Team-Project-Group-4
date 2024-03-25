<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->integer('Book_ID');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('Customer_Name', 20);
            $table->string('Title');
            $table->string('Body');
            $table->timestamps();
            
            $table->foreign('Book_ID', 'fk_reviews_book_id')->references('Book_ID')->on('books');
            $table->foreign('User_ID', 'fk_reviews_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
