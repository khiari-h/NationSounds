<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('preference', function (Blueprint $table) {
            $table->increments('Id');
            $table->unsignedInteger('Id_user');
            $table->string('Theme');
            $table->string('Genre');
            $table->string('Notification');

            $table->foreign('Id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('preference');
    }
};

