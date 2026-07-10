<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'category_id' => 'integer',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Subcategory $subcategory): void {
            if (! filled($subcategory->slug) && filled($subcategory->name)) {
                $subcategory->slug = static::makeUniqueSlug(
                    Str::slug($subcategory->name),
                    (int) $subcategory->category_id,
                    $subcategory->exists ? $subcategory->getKey() : null
                );
            }
        });

        static::saved(fn () => Cache::forget('nav_categories'));
        static::deleted(fn () => Cache::forget('nav_categories'));
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function makeUniqueSlug(string $base, int $categoryId, ?int $ignoreId = null): string
    {
        $base = Str::slug($base) ?: 'subcategory';

        $slug = $base;
        $i = 2;
        while (static::query()
            ->where('category_id', $categoryId)
            ->where('slug', $slug)
            ->when($ignoreId !== null, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function subSubcategories(): HasMany
    {
        return $this->hasMany(SubSubcategory::class)->orderBy('sort_order')->orderBy('name');
    }

    public function activeSubSubcategories(): HasMany
    {
        return $this->subSubcategories()->where('is_active', true);
    }
}
