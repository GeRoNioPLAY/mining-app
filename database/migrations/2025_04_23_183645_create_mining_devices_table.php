<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiningDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('mining_devices', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('device_name');
            $table->decimal('cost', 10, 2);
            $table->decimal('power_consumption', 10, 2);
            $table->timestamps();
        });
    }


public function down()
    {
        Schema::dropIfExists('mining_devices');
    }
}
