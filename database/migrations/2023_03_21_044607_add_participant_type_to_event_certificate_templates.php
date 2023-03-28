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
            // $table->unsignedBigInteger('participantType_id')->nullable();
            // $table->unsignedBigInteger('event_id')->nullable();

            // $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            // $table->foreign('participantType_id')->references('id')->on('participant_types')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_certificate_templates', function (Blueprint $table) {
            // $table->dropColumn('participantType_id');
            // $table->dropColumn('event_id');


            // $table->dropForeign(['event_id']);
            // $table->dropColumn('event_id');
        });
    }
};
