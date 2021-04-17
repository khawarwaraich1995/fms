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
            $table->id();
            $table->integer('outlet_id');
            $table->integer('order_no');
            $table->integer('customer_id');
            $table->string('customer_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_latLong')->nullable();
            $table->string('order_type');
            $table->dateTime('order_date')->nullable();
            $table->string('order_note')->nullable();
            $table->integer('total_items')->default(0);
            $table->double('subtotal')->default(0.00);
            $table->double('total_price')->default(0.00);
            $table->string('payment_method')->default('cash');
            $table->integer('payment_status')->default(0);
            $table->string('order_status');
            $table->integer('rejected')->default(0);
            $table->string('rejected_reason')->nullable();
            $table->dateTime('rejected_dateTime');
            $table->string('order_platform')->default('web');
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
