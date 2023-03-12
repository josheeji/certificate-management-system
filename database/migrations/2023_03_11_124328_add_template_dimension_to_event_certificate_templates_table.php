<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('event_certificate_templates', function (Blueprint $table) {
            $table->float('template_width')->nullable();
            $table->float('template_height')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_certificate_templates', function (Blueprint $table) {
            $table->dropColumn('template_width');
            $table->dropColumn('template_height');
        });
    }
};
