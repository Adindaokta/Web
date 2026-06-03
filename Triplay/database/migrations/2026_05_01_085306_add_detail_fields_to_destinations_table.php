<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('destinations', function (Blueprint $table) {
        if (!Schema::hasColumn('destinations', 'location')) {
            $table->string('location')->nullable()->after('category');
        }

        if (!Schema::hasColumn('destinations', 'meeting_point')) {
            $table->string('meeting_point')->nullable()->after('location');
        }

        if (!Schema::hasColumn('destinations', 'estimated_duration')) {
            $table->string('estimated_duration')->nullable()->after('meeting_point');
        }

        if (!Schema::hasColumn('destinations', 'altitude_mdpl')) {
            $table->integer('altitude_mdpl')->nullable()->after('estimated_duration');
        }

        if (!Schema::hasColumn('destinations', 'difficulty_level')) {
            $table->enum('difficulty_level', ['easy', 'medium', 'hard'])->default('easy')->after('altitude_mdpl');
        }

        if (!Schema::hasColumn('destinations', 'facilities')) {
            $table->text('facilities')->nullable()->after('difficulty_level');
        }

        if (!Schema::hasColumn('destinations', 'safety_notes')) {
            $table->text('safety_notes')->nullable()->after('facilities');
        }
    });
}

public function down(): void
{
    Schema::table('destinations', function (Blueprint $table) {
        $table->dropColumn([
            'location',
            'meeting_point',
            'estimated_duration',
            'altitude_mdpl',
            'difficulty_level',
            'facilities',
            'safety_notes',
        ]);
    });
}
};
