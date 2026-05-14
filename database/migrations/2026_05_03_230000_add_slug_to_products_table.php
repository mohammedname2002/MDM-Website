<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('title');
        });

        foreach (DB::table('products')->orderBy('id')->get() as $row) {
            $base = Str::slug($row->title ?? '');
            if ($base === '') {
                $base = 'product';
            }
            $slug = $base;
            $n = 2;
            while (DB::table('products')->where('slug', $slug)->exists()) {
                $slug = $base.'-'.$n++;
            }
            DB::table('products')->where('id', $row->id)->update(['slug' => $slug]);
        }

        Schema::table('products', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
