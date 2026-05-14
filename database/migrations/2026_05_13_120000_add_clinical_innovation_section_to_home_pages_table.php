<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->text('clinical_heading')->nullable()->after('section2_card_3_image_dark');

            $table->string('clinical_card_1_badge', 255)->nullable();
            $table->text('clinical_card_1_title')->nullable();
            $table->text('clinical_card_1_body')->nullable();
            $table->string('clinical_card_1_image', 512)->nullable();
            $table->string('clinical_card_1_image_alt', 255)->nullable();

            $table->string('clinical_card_2_badge', 255)->nullable();
            $table->text('clinical_card_2_title')->nullable();
            $table->text('clinical_card_2_body')->nullable();
            $table->string('clinical_card_2_image', 512)->nullable();
            $table->string('clinical_card_2_image_alt', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn([
                'clinical_heading',
                'clinical_card_1_badge',
                'clinical_card_1_title',
                'clinical_card_1_body',
                'clinical_card_1_image',
                'clinical_card_1_image_alt',
                'clinical_card_2_badge',
                'clinical_card_2_title',
                'clinical_card_2_body',
                'clinical_card_2_image',
                'clinical_card_2_image_alt',
            ]);
        });
    }
};
