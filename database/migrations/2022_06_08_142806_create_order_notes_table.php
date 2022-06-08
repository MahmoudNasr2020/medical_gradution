<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('order_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->text('notes');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('order_notes');
    }
};
