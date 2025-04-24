<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptocurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('cryptocurrencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('network_difficulty', 10, 2);
            $table->decimal('block_reward', 10, 2);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('cryptocurrencies');
    }
}
