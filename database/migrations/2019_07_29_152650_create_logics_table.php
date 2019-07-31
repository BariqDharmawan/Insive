<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('option_3', 255);
            $table->string('option_4', 255);
            $table->string('face_result', 50);
            $table->text('face_description');
            $table->string('special_ingredients', 100);
            $table->string('no_formula', 20);
            $table->string('face_icon', 50);
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
        Schema::dropIfExists('logics');
    }
}
