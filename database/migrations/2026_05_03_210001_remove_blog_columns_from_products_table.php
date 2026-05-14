<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $toDrop = collect(['blog_title', 'blog_description', 'blog_image'])
            ->filter(fn (string $col) => Schema::hasColumn('products', $col))
            ->values()
            ->all();

        if ($toDrop === []) {
            return;
        }

        Schema::table('products', function (Blueprint $table) use ($toDrop) {
            $table->dropColumn($toDrop);
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('blog_title')->nullable()->after('images');
            $table->text('blog_description')->nullable()->after('blog_title');
            $table->string('blog_image')->nullable()->after('blog_description');
        });
    }
};
