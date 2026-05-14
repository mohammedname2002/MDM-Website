<?php

use App\Models\Blog;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
            $table->string('category', 120)->nullable()->after('name');
            $table->json('tags')->nullable()->after('category');
            $table->longText('content')->nullable()->after('description');
            $table->string('cover_image', 512)->nullable()->after('content');
            $table->unsignedBigInteger('views')->default(0)->after('cover_image');
            $table->timestamp('published_at')->nullable()->after('views');
        });

        $blogs = DB::table('blogs')->select(['id', 'title', 'slug'])->orderBy('id')->get();
        foreach ($blogs as $b) {
            if (filled($b->slug)) {
                continue;
            }
            $base = Str::slug((string) $b->title);
            if ($base === '') {
                $base = 'blog';
            }
            $slug = $base;
            $i = 2;
            while (DB::table('blogs')->where('slug', $slug)->exists()) {
                $slug = $base.'-'.$i++;
            }
            DB::table('blogs')->where('id', $b->id)->update(['slug' => $slug]);
        }

        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
            $table->unique('slug');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn([
                'slug',
                'category',
                'tags',
                'content',
                'cover_image',
                'views',
                'published_at',
            ]);
        });
    }
};

