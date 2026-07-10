<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sub_subcategories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subcategory_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['subcategory_id', 'slug']);
        });

        Schema::table('products', function (Blueprint $table) {
            // Denormalised category path: category is always stored, the deeper
            // levels only when the admin drills down to them.
            $table->foreignId('category_id')
                ->nullable()
                ->after('slug')
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('sub_subcategory_id')
                ->nullable()
                ->after('subcategory_id')
                ->constrained()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropConstrainedForeignId('sub_subcategory_id');
            $table->dropConstrainedForeignId('category_id');
        });

        Schema::dropIfExists('sub_subcategories');
    }
};
