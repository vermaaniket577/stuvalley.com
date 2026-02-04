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
        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('price');
            $table->string('currency')->default('₹')->nullable();
            $table->string('tag_text')->nullable();
            $table->boolean('is_popular')->default(false);
            $table->boolean('is_light')->default(false);
            $table->json('features')->nullable();
            $table->string('button_text')->default('Get Started');
            $table->string('button_link')->default('#');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_plans');
    }
};
