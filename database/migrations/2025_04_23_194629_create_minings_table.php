<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiningsTable extends Migration
{
    public function up()
    {
        Schema::create('minings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mining_device_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cryptocurrency_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('algorithm_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('hashrate', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('minings');
    }
}
