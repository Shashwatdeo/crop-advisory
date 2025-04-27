<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('weather_alerts', function (Blueprint $table) {
            $table->dropColumn('region');
        });
    }

    public function down()
    {
        Schema::table('weather_alerts', function (Blueprint $table) {
            $table->string('region');
        });
    }
}; 