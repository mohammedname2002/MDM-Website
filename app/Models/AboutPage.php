<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class AboutPage extends Model
{
    public const CACHE_KEY = 'about_page.v1';

    public const CACHE_TTL_SECONDS = 3600;

    protected $fillable = [
        'hero_kicker',
        'hero_title',
        'hero_bg_light',
        'hero_bg_dark',
        'intro_image',
        'intro_heading',
        'intro_body',
        'story_one_image',
        'story_one_heading',
        'story_one_body',
        'story_two_image',
        'story_two_heading',
        'story_two_body',
        'team_section_heading',
        'testimonials',
        'team_members',
    ];

    protected function casts(): array
    {
        return [
            'testimonials' => 'array',
            'team_members' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget(self::CACHE_KEY));
        static::deleted(fn () => Cache::forget(self::CACHE_KEY));
    }

    /**
     * Resolve a public URL for a path stored as either `assets/...` (under public/) or an uploaded file on the `public` disk.
     */
    public function mediaUrl(?string $path, string $fallbackRelativeToPublic = 'assets/images/banner/banner-white-42.jpg'): string
    {
        if (blank($path)) {
            return asset($fallbackRelativeToPublic);
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '//')) {
            return $path;
        }
        if (str_starts_with($path, 'assets/')) {
            return asset($path);
        }

        return Storage::disk('public')->exists($path)
            ? Storage::disk('public')->url($path)
            : asset($fallbackRelativeToPublic);
    }
}
