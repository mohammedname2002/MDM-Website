@php
    $imageUrl = $product->mainImageUrl() ?? asset('assets/images/products/product-11-330x440.jpg');
@endphp
<div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="card card-product grid-1 bg-transparent border-0 h-100 w-100" data-animate="fadeInUp">
        <figure class="card-img-top position-relative mb-7 overflow-hidden rounded-3">
            <a href="{{ route('products.show', $product) }}" class="hover-zoom-in d-block" title="{{ $product->title }}">
                <span class="product-card-media d-block">
                    <img src="{{ $imageUrl }}" class="product-card-img" alt="{{ $product->title }}" loading="lazy"
                        decoding="async">
                </span>
            </a>

            @if ($product->shouldDisplayFlashBadge())
                <div class="position-absolute product-flash z-index-2 ">
                    <span
                        class="badge badge-product-flash {{ $product->flashBadgeCssClass() }}">{{ $product->flash_badge }}</span>
                </div>
            @endif
        </figure>
        <div class="card-body text-center p-0 pt-2">
            <h3 class="product-title card-title fs-16px fw-semibold mb-0 lh-sm px-2">
                <a class="text-decoration-none text-body"
                    href="{{ route('products.show', $product) }}">{{ $product->title }}</a>
            </h3>
        </div>
    </div>
</div>
