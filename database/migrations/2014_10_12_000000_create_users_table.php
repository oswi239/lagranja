<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user')->unique();
            $table->integer('type_user')->nullable();
            $table->integer('status')->default(1)->nullable();
            $table->string('password_view')->nullable();
            $table->string('password');


            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
};