<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_charges', function (Blueprint $table) {
            $table->id();
            $table->integer('outlet_id');
            $table->integer('order_id');
            $table->string('charges_name');
            $table->string('charges_type');
            $table->double('charges_amount');
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
        Schema::dropIfExists('order_charges');
    }
}
