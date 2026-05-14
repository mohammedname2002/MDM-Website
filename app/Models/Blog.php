<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'name',
        'category',
        'tags',
        'description',
        'content',
        'cover_image',
        'views',
        'published_at',
        'images',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
            'tags' => 'array',
            'views' => 'integer',
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Blog $blog): void {
            if (! filled($blog->slug) && filled($blog->title)) {
                $blog->slug = static::makeUniqueSlug(
                    Str::slug($blog->title),
                    $blog->exists ? $blog->getKey() : null
                );
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function makeUniqueSlug(string $base, ?int $ignoreId = null): string
    {
        $base = Str::slug($base);
        if ($base === '') {
            $base = 'blog';
        }

        $slug = $base;
        $i = 2;
        while (static::query()
            ->where('slug', $slug)
            ->when($ignoreId !== null, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }

    /**
     * @return array<int, string>
     */
    public function imageUrls(): array
    {
        if (! is_array($this->images)) {
            return [];
        }

        return collect($this->images)
            ->filter()
            ->map(fn (string $path) => Storage::disk('public')->url($path))
            ->all();
    }

    public function mainImageUrl(): ?string
    {
        $urls = $this->imageUrls();

        return $urls[0] ?? null;
    }

    public function coverUrl(): ?string
    {
        if (filled($this->cover_image)) {
            $path = (string) $this->cover_image;
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '//')) {
                return $path;
            }

            return Storage::disk('public')->url($path);
        }

        return $this->mainImageUrl();
    }

    public function excerpt(int $limit = 160): string
    {
        $text = filled($this->description) ? (string) $this->description : (string) $this->content;

        return Str::limit(trim(strip_tags($text)), $limit);
    }
}
