<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('Order_ID');
            $table->unsignedBigInteger('User_ID')->nullable();
            $table->string('Shipping_First_Name');
            $table->string('Shipping_Last_Name');
            $table->text('Shipping_Address');
            $table->string('Shipping_City');
            $table->decimal('Order_Total', 10, 2);
            $table->timestamp('Created_At')->useCurrent();
            $table->timestamp('Updated_At')->useCurrent();
            
            $table->foreign('User_ID', 'fk_orders_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
