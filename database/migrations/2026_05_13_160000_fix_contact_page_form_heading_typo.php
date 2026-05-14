<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('contact_pages')
            ->where('form_heading', 'Sent A Message')
            ->update(['form_heading' => 'Send a message']);

        DB::table('contact_pages')
            ->where('form_heading', 'sent a message')
            ->update(['form_heading' => 'Send a message']);
    }

    public function down(): void
    {
        DB::table('contact_pages')
            ->where('form_heading', 'Send a message')
            ->update(['form_heading' => 'Sent A Message']);
    }
};
