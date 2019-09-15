<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

        $table->increments('products_id');
        $table->string('name');
        $table->string('categories');
        $table->string('type');
        $table->string('model');
        $table->string('photo');
        $table->string('size');
        $table->string('additional information');
        $table->integer('price');
        $table->integer('old_price');
        $table->string('status');
        $table->string('color');
        $table->text('description');
        $table->text('reviews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
