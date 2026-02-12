<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->longText('resume_data')->nullable()->after('resume_path'); // Changed from LONGBLOB for compatibility if needed, but DB::statement is better for REAL BLOB
            // Use DB::statement for REAL LONGBLOB because Laravel doesn't have a direct 'longblob' type in Blueprint
        });

        // Forcing LONGBLOB via raw SQL
        if (config('database.default') === 'mysql') {
            \DB::statement("ALTER TABLE job_applications MODIFY resume_data LONGBLOB");
        }

        Schema::table('job_applications', function (Blueprint $table) {
            $table->string('resume_filename')->nullable()->after('resume_data');
            $table->string('resume_mime')->nullable()->after('resume_filename');
            $table->unsignedBigInteger('resume_size')->nullable()->after('resume_mime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn(['resume_data', 'resume_filename', 'resume_mime', 'resume_size']);
        });
    }
};
