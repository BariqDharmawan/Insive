<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image')->default('files/people.png');
            $table->string('email')->unique();
            $table->enum('provider', ['socialite', 'built-in'])->default('built-in'); //can't be edit
            $table->enum('role', ['admin', 'customer'])->default('customer'); //can't be edit
            $table->string('phone')->nullable();
            $table->longText('address')->nullable();
            $table->timestamp('email_verified_at')->nullable(); //can't be edit
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
