<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class HomePage extends Model
{
    public const CACHE_KEY = 'home_page.v2';

    public const CACHE_TTL_SECONDS = 3600;

    protected $fillable = [
        'section2_card_1_title',
        'section2_card_1_link_label',
        'section2_card_1_link_url',
        'section2_card_1_image_light',
        'section2_card_1_image_dark',
        'section2_card_2_title',
        'section2_card_2_link_label',
        'section2_card_2_link_url',
        'section2_card_2_image_light',
        'section2_card_2_image_dark',
        'section2_card_3_title',
        'section2_card_3_link_label',
        'section2_card_3_link_url',
        'section2_card_3_image_light',
        'section2_card_3_image_dark',
        'science_heading',
        'science_body',
        'science_button_label',
        'science_button_url',
        'science_image_main',
        'science_image_main_alt',
        'science_image_overlay',
        'science_image_overlay_alt',
        'science_features',
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
        'section4_image',
        'section4_kicker',
        'section4_badge',
        'section4_title',
        'section4_description',
        'section4_countdown_ends_at',
        'section4_button_label',
        'section4_button_url',
        'section5_image',
        'section5_video_url',
        'section5_kicker',
        'section5_title',
        'section5_description',
        'section5_button_label',
        'section5_button_url',
        'blog_section_heading',
        'blog_section_intro',
        'choose_us_heading',
        'choose_us_intro',
        'choose_us_items',
        'partners_heading',
        'partners_intro',
        'partners_bg_image',
        'partners_logos',
    ];

    protected function casts(): array
    {
        return [
            'section4_countdown_ends_at' => 'datetime',
            'choose_us_items' => 'array',
            'partners_logos' => 'array',
            'science_features' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget(self::CACHE_KEY));
        static::deleted(fn () => Cache::forget(self::CACHE_KEY));
    }

    /**
     * Uploaded path (`storage/...` on public disk) or `assets/...` under public; otherwise fallback asset.
     */
    public function mediaUrl(?string $path, string $fallbackRelativeToPublic): string
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
