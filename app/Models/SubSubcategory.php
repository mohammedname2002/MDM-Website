<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class SubSubcategory extends Model
{
    protected $fillable = [
        'subcategory_id',
        'name',
        'slug',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'subcategory_id' => 'integer',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (SubSubcategory $subSubcategory): void {
            if (! filled($subSubcategory->slug) && filled($subSubcategory->name)) {
                $subSubcategory->slug = static::makeUniqueSlug(
                    Str::slug($subSubcategory->name),
                    (int) $subSubcategory->subcategory_id,
                    $subSubcategory->exists ? $subSubcategory->getKey() : null
                );
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function makeUniqueSlug(string $base, int $subcategoryId, ?int $ignoreId = null): string
    {
        $base = Str::slug($base) ?: 'sub-subcategory';

        $slug = $base;
        $i = 2;
        while (static::query()
            ->where('subcategory_id', $subcategoryId)
            ->where('slug', $slug)
            ->when($ignoreId !== null, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
