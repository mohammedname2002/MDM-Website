<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();

            $table->text('section2_card_1_title')->nullable();
            $table->string('section2_card_1_link_label', 255)->nullable();
            $table->text('section2_card_1_link_url')->nullable();
            $table->string('section2_card_1_image_light', 512)->nullable();
            $table->string('section2_card_1_image_dark', 512)->nullable();

            $table->text('section2_card_2_title')->nullable();
            $table->string('section2_card_2_link_label', 255)->nullable();
            $table->text('section2_card_2_link_url')->nullable();
            $table->string('section2_card_2_image_light', 512)->nullable();
            $table->string('section2_card_2_image_dark', 512)->nullable();

            $table->text('section2_card_3_title')->nullable();
            $table->string('section2_card_3_link_label', 255)->nullable();
            $table->text('section2_card_3_link_url')->nullable();
            $table->string('section2_card_3_image_light', 512)->nullable();
            $table->string('section2_card_3_image_dark', 512)->nullable();

            $table->string('section4_image', 512)->nullable();
            $table->string('section4_kicker', 120)->nullable();
            $table->string('section4_badge', 80)->nullable();
            $table->string('section4_title', 255)->nullable();
            $table->text('section4_description')->nullable();
            $table->timestamp('section4_countdown_ends_at')->nullable();
            $table->string('section4_button_label', 255)->nullable();
            $table->text('section4_button_url')->nullable();

            $table->string('section5_image', 512)->nullable();
            $table->text('section5_video_url')->nullable();
            $table->string('section5_kicker', 120)->nullable();
            $table->string('section5_title', 255)->nullable();
            $table->text('section5_description')->nullable();
            $table->string('section5_button_label', 255)->nullable();
            $table->text('section5_button_url')->nullable();

            $table->string('blog_section_heading', 255)->nullable();
            $table->text('blog_section_intro')->nullable();

            $table->timestamps();
        });

        $now = now();
        DB::table('home_pages')->insert([
            'section2_card_1_title' => 'Essential<br />Items',
            'section2_card_1_link_label' => 'Buy 1 Get 1',
            'section2_card_1_link_url' => '#',
            'section2_card_2_title' => 'Save<br />on Sets',
            'section2_card_2_link_label' => 'Save $15.99',
            'section2_card_2_link_url' => '#',
            'section2_card_3_title' => '25% off<br />Everything',
            'section2_card_3_link_label' => 'Shop Sale',
            'section2_card_3_link_url' => '#',

            'section4_kicker' => 'SPECIAL OFFER',
            'section4_badge' => '-20%',
            'section4_title' => 'Save on Sets',
            'section4_description' => 'Made using clean, non-toxic ingredients, our products are designed for everyone.',
            'section4_countdown_ends_at' => $now->copy()->addMonths(2),
            'section4_button_label' => 'Get Only $39,00',
            'section4_button_url' => '#',

            'section5_video_url' => 'https://www.youtube.com/watch?v=6v2L2UGZJAM',
            'section5_kicker' => 'Special offer',
            'section5_title' => 'Beauty Inspired by Real Life',
            'section5_description' => 'Made using clean, non-toxic ingredients, our products are designed for everyone.',
            'section5_button_label' => 'Discover Now',
            'section5_button_url' => '#',

            'blog_section_heading' => 'From Our Blog',
            'blog_section_intro' => 'Our bundles were designed to conveniently package your tanning essentials while saving you money.',

            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
