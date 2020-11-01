<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cart_id')->unsigned()->nullable();
            $table->integer('sheet_id')->unsigned()->nullable();
            $table->integer('fragrance_id')->unsigned()->nullable();
            $table->integer('qty');
            $table->integer('price');
            $table->integer('total_price');
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
        Schema::dropIfExists('custom_products');
    }
}
