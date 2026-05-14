<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('compare_at_price', 12, 2)->nullable()->after('price');
            $table->string('flash_badge', 32)->nullable()->after('compare_at_price');
            $table->boolean('is_featured')->default(false)->after('images');
            $table->unsignedInteger('featured_sort')->default(0)->after('is_featured');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['compare_at_price', 'flash_badge', 'is_featured', 'featured_sort']);
        });
    }
};
