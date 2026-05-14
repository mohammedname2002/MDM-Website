<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('legal_pages', function (Blueprint $table) {
            $table->id();
            $table->string('key', 64)->unique();
            $table->string('title', 255);
            $table->longText('content')->nullable();
            $table->timestamps();
        });

        DB::table('legal_pages')->insert([
            [
                'key' => 'terms',
                'title' => 'Terms & Conditions',
                'content' => '<p>Add your terms here.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'privacy',
                'title' => 'Privacy Policy',
                'content' => '<p>Add your privacy policy here.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('legal_pages');
    }
};

