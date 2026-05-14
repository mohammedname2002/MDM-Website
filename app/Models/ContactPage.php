<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ContactPage extends Model
{
    public const CACHE_KEY = 'contact_page.v1';

    public const CACHE_TTL_SECONDS = 3600;

    protected $fillable = [
        'breadcrumb_label',
        'hero_title',
        'hero_subtitle',
        'address_heading',
        'address_body',
        'directions_url',
        'directions_label',
        'contact_heading',
        'mobile_label',
        'mobile',
        'hotline_label',
        'hotline',
        'email_label',
        'email',
        'hours_heading',
        'weekday_label',
        'weekday_hours',
        'weekend_label',
        'weekend_hours',
        'map_height',
        'mapbox_access_token',
        'map_options',
        'map_markers',
        'form_heading',
        'placeholder_name',
        'placeholder_email',
        'placeholder_message',
        'checkbox_label',
        'submit_label',
    ];

    protected function casts(): array
    {
        return [
            'map_options' => 'array',
            'map_markers' => 'array',
            'map_height' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget(self::CACHE_KEY));
        static::deleted(fn () => Cache::forget(self::CACHE_KEY));
    }

    /**
     * Marker images for Mapbox theme.js (expects absolute or full URLs in JSON).
     *
     * @return array<int, array<string, mixed>>
     */
    public function mapMarkersResolved(): array
    {
        $markers = is_array($this->map_markers) ? $this->map_markers : [];
        foreach ($markers as &$m) {
            if (empty($m['backgroundImage']) || ! is_string($m['backgroundImage'])) {
                continue;
            }
            $bg = $m['backgroundImage'];
            if (str_starts_with($bg, 'http://') || str_starts_with($bg, 'https://') || str_starts_with($bg, '//') || str_starts_with($bg, 'data:')) {
                continue;
            }
            $m['backgroundImage'] = asset(ltrim($bg, '/'));
        }

        return $markers;
    }

    /**
     * @return array<string, mixed>
     */
    public function mapOptionsResolved(): array
    {
        return is_array($this->map_options) ? $this->map_options : [];
    }
}
