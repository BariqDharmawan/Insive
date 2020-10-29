<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('shipping_id')->unsigned()->nullable();
            $table->integer('logic_id')->unsigned()->nullable();
            $table->string('checked_options')->nullable();
            $table->string('cart_code', 100);
            $table->string('formula_code', 100);
            $table->integer('total_qty')->default(0);
            $table->string('tracking_number')->nullable();
            $table->enum('type_cart', ['catalog', 'custom']);
            $table->integer('total_price')->default(0);
            $table->integer('shipping_cost')->default(0);
            $table->string('snap_token')->nullable();
            $table->enum('status', ['waiting', 'pending', 'success', 'failed', 'expired']);
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
        Schema::dropIfExists('carts');
    }
}
