<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @property array<int, string>|null $images Storage paths on the `public` disk (e.g. products/gallery/…).
 */
class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'how_to_use',
        'price',
        'compare_at_price',
        'flash_badge',
        'is_featured',
        'featured_sort',
        'images',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
            'price' => 'decimal:2',
            'compare_at_price' => 'decimal:2',
            'is_featured' => 'boolean',
            'featured_sort' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Product $product): void {
            if (! filled($product->slug) && filled($product->title)) {
                $product->slug = static::makeUniqueSlug(
                    Str::slug($product->title),
                    $product->exists ? $product->getKey() : null
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
            $base = 'product';
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

    public function isOnSale(): bool
    {
        if ($this->compare_at_price === null) {
            return false;
        }

        return (float) $this->compare_at_price > (float) $this->price;
    }

    public function flashBadgeCssClass(): ?string
    {
        if (! filled($this->flash_badge)) {
            return null;
        }

        return strcasecmp(trim($this->flash_badge), 'new') === 0
            ? 'on-new'
            : 'on-sale bg-primary';
    }

    /**
     * Show flash badge on the storefront only when it is not a discount / percentage promo.
     */
    public function shouldDisplayFlashBadge(): bool
    {
        if (! filled($this->flash_badge)) {
            return false;
        }

        $raw = trim((string) $this->flash_badge);

        if (str_contains($raw, '%')) {
            return false;
        }

        if (preg_match('/^\s*-\s*\d+/i', $raw)) {
            return false;
        }

        $lower = mb_strtolower($raw);
        foreach (['% off', 'off%', 'percent', 'save $', 'discount'] as $needle) {
            if (str_contains($lower, $needle)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return array<int, string>
     */
    public function galleryUrls(): array
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
        $urls = $this->galleryUrls();

        return $urls[0] ?? null;
    }

    public function saleDiscountPercent(): ?int
    {
        if (! $this->isOnSale()) {
            return null;
        }

        $compare = (float) $this->compare_at_price;
        if ($compare <= 0) {
            return null;
        }

        return (int) round((1 - ((float) $this->price / $compare)) * 100);
    }
}
