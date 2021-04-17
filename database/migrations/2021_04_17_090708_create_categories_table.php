<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('outlet_id');
            $table->string('cat_name');
            $table->string('cat_desc')->nullable();
            $table->integer('rank');
            $table->integer('discount_status')->default(0);
            $table->string('discount_name')->nullable();
            $table->double('discount_amount')->nullable()->default(0.00);
            $table->string('discount_type')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('categories');
    }
}
