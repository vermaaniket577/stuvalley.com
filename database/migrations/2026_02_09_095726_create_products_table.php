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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category'); // E-Commerce, Corporate, FinTech, EdTech
            $table->text('short_description');
            $table->longText('full_description');
            $table->text('value_proposition')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('features')->nullable(); // Array of features/modules
            $table->json('tech_stack')->nullable(); // Technologies used
            $table->json('gallery')->nullable(); // Array of screenshot URLs
            $table->string('industry')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('icon')->nullable(); // Font Awesome icon class
            $table->string('color_scheme')->default('#3b82f6'); // Primary color for the product
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
