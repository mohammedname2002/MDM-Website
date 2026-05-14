<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('hero_kicker', 255)->default('Introducing');
            $table->string('hero_title', 255)->default('About us');
            $table->string('hero_bg_light')->nullable();
            $table->string('hero_bg_dark')->nullable();
            $table->string('intro_image')->nullable();
            $table->text('intro_heading')->nullable();
            $table->text('intro_body')->nullable();
            $table->string('story_one_image')->nullable();
            $table->string('story_one_heading')->nullable();
            $table->text('story_one_body')->nullable();
            $table->string('story_two_image')->nullable();
            $table->string('story_two_heading')->nullable();
            $table->text('story_two_body')->nullable();
            $table->string('team_section_heading')->nullable();
            $table->json('testimonials')->nullable();
            $table->json('team_members')->nullable();
            $table->timestamps();
        });

        $now = now();
        DB::table('about_pages')->insert([
            'hero_kicker' => 'Introducing',
            'hero_title' => 'About '.config('app.name', 'MDM'),
            'hero_bg_light' => null,
            'hero_bg_dark' => null,
            'intro_image' => null,
            'intro_heading' => 'We strive to live with compassion, kindness and empathy',
            'intro_body' => 'A lot of so-called stretch denim pants out there are just glorified sweatpants – they get baggy and lose their shape. Not cool. Our tightly knitted fabric holds its form after repeated wear.',
            'story_one_image' => null,
            'story_one_heading' => 'Give your skin a healthy glow everyone',
            'story_one_body' => 'Luxe, lightweight, and made with the perfect blend of cashmere and cotton, our Sonoma Pillows and Throws are inspired by the basics we turn to season after season.',
            'story_two_image' => null,
            'story_two_heading' => 'Our mission',
            'story_two_body' => 'Get to know the cozy essentials that will elevate your space in an instant.',
            'team_section_heading' => 'We pride ourselves on having a team of highly skilled professionals',
            'testimonials' => json_encode([
                ['quote' => 'Millions of combinations, meaning you get a totally unique piece of furniture exactly the way you want it.'],
                ['quote' => 'Great tags, light weight and great colours available.'],
                ['quote' => 'Amazing product. The results are so transformative in texture and my face feels plump and healthy. Highly recommend!'],
            ]),
            'team_members' => json_encode([
                ['name' => 'Team member 1', 'role' => 'Founder, Chief Creative', 'photo' => null],
                ['name' => 'Team member 2', 'role' => 'Founder, CEO', 'photo' => null],
                ['name' => 'Team member 3', 'role' => 'Founder, COO', 'photo' => null],
            ]),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
