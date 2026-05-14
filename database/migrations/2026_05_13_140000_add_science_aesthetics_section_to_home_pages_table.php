<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->text('science_heading')->nullable()->after('clinical_card_2_image_alt');
            $table->text('science_body')->nullable();
            $table->string('science_button_label', 255)->nullable();
            $table->text('science_button_url')->nullable();
            $table->string('science_image_main', 512)->nullable();
            $table->string('science_image_main_alt', 255)->nullable();
            $table->string('science_image_overlay', 512)->nullable();
            $table->string('science_image_overlay_alt', 255)->nullable();
            $table->json('science_features')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn([
                'science_heading',
                'science_body',
                'science_button_label',
                'science_button_url',
                'science_image_main',
                'science_image_main_alt',
                'science_image_overlay',
                'science_image_overlay_alt',
                'science_features',
            ]);
        });
    }
};
