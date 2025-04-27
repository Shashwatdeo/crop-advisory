<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('weather_alerts', function (Blueprint $table) {
            if (!Schema::hasColumn('weather_alerts', 'title')) {
                $table->string('title')->after('id');
            }
            if (!Schema::hasColumn('weather_alerts', 'description')) {
                $table->text('description')->after('title');
            }
            if (!Schema::hasColumn('weather_alerts', 'alert_type')) {
                $table->string('alert_type')->after('description');
            }
            if (!Schema::hasColumn('weather_alerts', 'severity')) {
                $table->string('severity')->default('medium')->after('alert_type');
            }
            if (!Schema::hasColumn('weather_alerts', 'status')) {
                $table->string('status')->default('active')->after('severity');
            }
            if (!Schema::hasColumn('weather_alerts', 'alert_date')) {
                $table->date('alert_date')->after('status');
            }
            if (!Schema::hasColumn('weather_alerts', 'expiry_date')) {
                $table->date('expiry_date')->nullable()->after('alert_date');
            }
            if (!Schema::hasColumn('weather_alerts', 'affected_areas')) {
                $table->string('affected_areas')->after('expiry_date');
            }
        });
    }

    public function down()
    {
        Schema::table('weather_alerts', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'description',
                'alert_type',
                'severity',
                'status',
                'alert_date',
                'expiry_date',
                'affected_areas'
            ]);
        });
    }
}; 