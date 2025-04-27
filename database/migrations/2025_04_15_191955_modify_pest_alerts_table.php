<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pest_alerts', function (Blueprint $table) {
            if (!Schema::hasColumn('pest_alerts', 'title')) {
                $table->string('title')->after('id');
            }
            if (!Schema::hasColumn('pest_alerts', 'pest_name')) {
                $table->string('pest_name')->after('description');
            }
            if (!Schema::hasColumn('pest_alerts', 'affected_crops')) {
                $table->string('affected_crops')->after('pest_name');
            }
            if (!Schema::hasColumn('pest_alerts', 'status')) {
                $table->string('status')->default('active')->after('severity');
            }
            if (!Schema::hasColumn('pest_alerts', 'alert_date')) {
                $table->date('alert_date')->after('status');
            }
            if (!Schema::hasColumn('pest_alerts', 'expiry_date')) {
                $table->date('expiry_date')->nullable()->after('alert_date');
            }
            if (!Schema::hasColumn('pest_alerts', 'severity')) {
                $table->string('severity')->after('description');
            }
            if (!Schema::hasColumn('pest_alerts', 'recommendations')) {
                $table->text('recommendations')->nullable()->after('status');
            }
            
            // Modify existing columns if needed
            $table->string('severity')->default('medium')->change();
        });
    }

    public function down()
    {
        Schema::table('pest_alerts', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'pest_name',
                'affected_crops',
                'status',
                'alert_date',
                'expiry_date',
                'severity',
                'recommendations'
            ]);
        });
    }
}; 