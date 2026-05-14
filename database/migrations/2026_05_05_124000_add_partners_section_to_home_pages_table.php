<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->string('partners_heading', 255)->nullable()->after('choose_us_items');
            $table->text('partners_intro')->nullable()->after('partners_heading');
            $table->string('partners_bg_image', 512)->nullable()->after('partners_intro');
            $table->json('partners_logos')->nullable()->after('partners_bg_image');
        });

        $logos = [
            ['image' => null, 'alt' => 'Partner 1', 'url' => null],
            ['image' => null, 'alt' => 'Partner 2', 'url' => null],
            ['image' => null, 'alt' => 'Partner 3', 'url' => null],
            ['image' => null, 'alt' => 'Partner 4', 'url' => null],
            ['image' => null, 'alt' => 'Partner 5', 'url' => null],
            ['image' => null, 'alt' => 'Partner 6', 'url' => null],
        ];

        DB::table('home_pages')->where('id', 1)->update([
            'partners_heading' => 'Partners in Success',
            'partners_intro' => 'We take pride in collaborating with world-renowned brands and trusted manufacturers who share our vision for innovation and quality.',
            'partners_logos' => json_encode($logos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn(['partners_heading', 'partners_intro', 'partners_bg_image', 'partners_logos']);
        });
    }
};

