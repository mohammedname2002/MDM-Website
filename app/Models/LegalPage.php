<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class LegalPage extends Model
{
    public const CACHE_TTL_SECONDS = 3600;

    protected $fillable = [
        'key',
        'title',
        'content',
    ];

    protected static function booted(): void
    {
        static::saved(function (LegalPage $page): void {
            Cache::forget(self::cacheKey((string) $page->key));
        });
        static::deleted(function (LegalPage $page): void {
            Cache::forget(self::cacheKey((string) $page->key));
        });
    }

    public static function cacheKey(string $key): string
    {
        return 'legal_page.v1.'.$key;
    }
}

