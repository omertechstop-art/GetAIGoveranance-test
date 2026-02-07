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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('description');
            $table->string('website_url');
            $table->string('logo')->nullable();
            $table->string('company_size')->nullable(); // startup, small, medium, enterprise
            $table->string('pricing_model')->nullable(); // free, freemium, paid, enterprise
            $table->text('key_features')->nullable();
            $table->text('use_cases')->nullable();
            $table->text('target_audience')->nullable();
            $table->json('marketplace_categories'); // Array of category IDs
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('click_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
            
            $table->index(['is_active', 'is_featured']);
            $table->index('click_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
