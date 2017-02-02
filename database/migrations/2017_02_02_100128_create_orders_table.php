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
            $table->increments('order_id');
            $table->timestamp('order_created_at')->useCurrent();
            $table->integer('order_state_id')->unsigned();
            $table->foreign('order_state_id')->references('state_id')->on('state');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->integer('item_id');
            $table->string('item_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('orders');
    }
}
