<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->float('amount');
            $table->integer('order_status_id');
            $table->integer('user_id');
            $table->string('costumer_full_name');
            $table->string('costumer_phone_number');
            $table->string('costumer_email');
            $table->integer('payment_method')->default(null);
            $table->string('region')->default(null);
            $table->string('delivery_address');

            $table->timestamps();
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
