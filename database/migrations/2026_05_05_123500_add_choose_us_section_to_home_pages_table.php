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
            $table->string('choose_us_heading', 255)->nullable()->after('blog_section_intro');
            $table->text('choose_us_intro')->nullable()->after('choose_us_heading');
            $table->json('choose_us_items')->nullable()->after('choose_us_intro');
        });

        // Seed defaults for the first (and only) home page row.
        $items = [
            [
                'icon' => 'bi bi-clipboard2-pulse',
                'title' => 'Advanced NAD+ therapies',
                'body' => 'Advanced NAD+ therapies and injectable treatments for skin rejuvenation and cellular health.',
            ],
            [
                'icon' => 'bi bi-flower1',
                'title' => 'Premium dermatology',
                'body' => 'Premium dermatology and skincare products designed for aesthetic professionals and clinics.',
            ],
            [
                'icon' => 'bi bi-capsule',
                'title' => 'Comprehensive care',
                'body' => 'Comprehensive care supplies serving clinics and specialists with precision and reliability.',
            ],
            [
                'icon' => 'bi bi-shield-check',
                'title' => 'Certified standards',
                'body' => 'Cutting-edge medical equipment and devices, all certified to the highest healthcare standards.',
            ],
        ];

        DB::table('home_pages')->where('id', 1)->update([
            'choose_us_heading' => 'Why Choose Us',
            'choose_us_intro' => 'We are dedicated to delivering trusted medical supplies, combining innovation, quality, and care.',
            'choose_us_items' => json_encode($items, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn(['choose_us_heading', 'choose_us_intro', 'choose_us_items']);
        });
    }
};

