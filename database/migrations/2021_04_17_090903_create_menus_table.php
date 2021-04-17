<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('outlet_id');
            $table->string('item_name');
            $table->integer('item_cat_id');
            $table->double('item_price');
            $table->string('item_image')->nullable();
            $table->string('item_description')->nullable();
            $table->integer('itmeDiscount_status')->default(0);
            $table->double('item_discount')->nullable();
            $table->string('item_discount_type')->nullable();
            $table->integer('itemVat_status')->default(0);
            $table->double('item_vat')->nullable();
            $table->integer('has_extras')->default(0);
            $table->integer('is_featured')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('menus');
    }
}
