<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptocurrencyListsTable extends Migration
{
    public function up()
    {
        Schema::create('cryptocurrency_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cryptocurrency_id')->constrained()->onDelete('cascade')->onUpdate('cascade');;
            $table->foreignId('exchange_id')->constrained()->onDelete('cascade')->onUpdate('cascade');;
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cryptocurrency_lists');
    }
}
