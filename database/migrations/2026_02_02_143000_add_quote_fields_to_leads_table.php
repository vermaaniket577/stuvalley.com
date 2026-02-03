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
        Schema::table('leads', function (Blueprint $table) {
            $table->string('company')->nullable()->after('phone');
            $table->string('city')->nullable()->after('company');
            $table->string('budget')->nullable()->after('message');
            $table->string('timeline')->nullable()->after('budget');
            $table->string('file_path')->nullable()->after('timeline');
            $table->string('type')->default('contact')->after('status'); // 'contact' or 'quote'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn(['company', 'city', 'budget', 'timeline', 'file_path', 'type']);
        });
    }
};
