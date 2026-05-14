<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_pages', function (Blueprint $table) {
            $table->id();
            $table->string('breadcrumb_label', 120)->default('Contact Us');
            $table->string('hero_title', 255)->default('Keep In Touch with Us');
            $table->text('hero_subtitle')->nullable();
            $table->string('address_heading', 120)->default('Address');
            $table->text('address_body')->nullable();
            $table->string('directions_url')->nullable();
            $table->string('directions_label', 120)->default('Get Direction');
            $table->string('contact_heading', 120)->default('Contact');
            $table->string('mobile_label', 80)->default('Mobile:');
            $table->string('mobile', 120)->nullable();
            $table->string('hotline_label', 80)->default('Hotline:');
            $table->string('hotline', 120)->nullable();
            $table->string('email_label', 80)->default('E-mail:');
            $table->string('email', 255)->nullable();
            $table->string('hours_heading', 120)->default('Hour of operation');
            $table->string('weekday_label', 80)->default('Mon – Fri:');
            $table->string('weekday_hours', 120)->nullable();
            $table->string('weekend_label', 80)->default('Sat & Sun:');
            $table->string('weekend_hours', 120)->nullable();
            $table->unsignedSmallInteger('map_height')->default(530);
            $table->text('mapbox_access_token')->nullable();
            $table->json('map_options')->nullable();
            $table->json('map_markers')->nullable();
            $table->string('form_heading', 255)->default('Sent A Message');
            $table->string('placeholder_name', 120)->default('Name');
            $table->string('placeholder_email', 120)->default('Email');
            $table->string('placeholder_message', 120)->default('Messenger');
            $table->text('checkbox_label')->nullable();
            $table->string('submit_label', 120)->default('Submit');
            $table->timestamps();
        });

        $now = now();
        $defaultMapOptions = [
            'center' => [-106.53671888774004, 35.12362056187368],
            'setLngLat' => [-106.53671888774004, 35.12362056187368],
            'style' => 'mapbox://styles/mapbox/light-v10',
            'zoom' => 5,
        ];
        $defaultMarkers = [
            [
                'backgroundImage' => 'assets/images/others/marker.png',
                'backgroundRepeat' => 'no-repeat',
                'className' => 'marker',
                'height' => '70px',
                'position' => [-102.53671888774004, 38.12362056187368],
                'width' => '70px',
            ],
            [
                'backgroundImage' => 'assets/images/others/marker.png',
                'backgroundRepeat' => 'no-repeat',
                'className' => 'marker',
                'height' => '70px',
                'position' => [-109.03671888774004, 33.02362056187368],
                'width' => '70px',
            ],
        ];

        DB::table('contact_pages')->insert([
            'breadcrumb_label' => 'Contact Us',
            'hero_title' => 'Keep In Touch with Us',
            'hero_subtitle' => 'We’re talking about clean beauty gift sets, of course – and we’ve got a bouquet of beauties for yourself or someone you love.',
            'address_heading' => 'Address',
            'address_body' => "3245 Abbot Kinney BLVD –\nPH Venice, CA 124\n\n76 East Houston Street\nPH Venice, CA 124",
            'directions_url' => '#',
            'directions_label' => 'Get Direction',
            'contact_heading' => 'Contact',
            'mobile_label' => 'Mobile:',
            'mobile' => '068 26589 996',
            'hotline_label' => 'Hotline:',
            'hotline' => '1900 26886',
            'email_label' => 'E-mail:',
            'email' => 'hello@grace.com',
            'hours_heading' => 'Hour of operation',
            'weekday_label' => 'Mon – Fri:',
            'weekday_hours' => '08:30 – 20:00',
            'weekend_label' => 'Sat & Sun:',
            'weekend_hours' => '09:30 – 21:30',
            'map_height' => 530,
            'mapbox_access_token' =>  env('MAPBOX_TOKEN', ''),
            'map_options' => json_encode($defaultMapOptions),
            'map_markers' => json_encode($defaultMarkers),
            'form_heading' => 'Sent A Message',
            'placeholder_name' => 'Name',
            'placeholder_email' => 'Email',
            'placeholder_message' => 'Messenger',
            'checkbox_label' => 'Save my name, email in this browse for the next time I comment',
            'submit_label' => 'Submit',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_pages');
    }
};