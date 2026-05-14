@extends('layouts.master')

@section('title')
    {{ $product->title }} — MDM
@endsection

@section('css')
    <style>
        .page-product-detail {
            --product-surface: #f9f7f2;
        }

        html[data-bs-theme="dark"] .page-product-detail {
            --product-surface: var(--bs-body-bg);
        }

        .page-product-detail .product-detail-hero {
            background: var(--product-surface);
        }

        .page-product-detail .product-detail-gallery-wrap {
            background: var(--bs-body-bg);
            border-radius: 1.25rem;
            padding: clamp(0.75rem, 2vw, 1.25rem);
            box-shadow: 0 0.4rem 1.75rem rgba(var(--bs-body-color-rgb), 0.07);
            border: 1px solid rgba(var(--bs-primary-rgb), 0.08);
        }

        html[data-bs-theme="dark"] .page-product-detail .product-detail-gallery-wrap {
            box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.25);
            border-color: rgba(255, 255, 255, 0.06);
        }

        .page-product-detail .product-detail-gallery-wrap .hover-zoom-in img {
            border-radius: 0.75rem;
        }

        .page-product-detail .product-detail-title {
            font-size: clamp(1.65rem, 3vw, 2.15rem);
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -0.02em;
            color: var(--bs-primary);
        }

        .page-product-detail .product-detail-lead {
            font-size: 1.0625rem;
            line-height: 1.7;
            color: var(--bs-body-color);
            max-width: 36rem;
        }

        .page-product-detail .product-detail-tabs-section {
            background: var(--bs-body-bg);
        }

        .page-product-detail .nav-tabs .nav-link {
            border-radius: 0;
        }

        .page-product-detail #productTabs .nav-link.active {
            color: var(--bs-primary) !important;
            border-bottom: 2px solid var(--bs-primary) !important;
            background: transparent !important;
        }

        .page-product-detail #productTabs .nav-link:not(.active):hover {
            color: var(--bs-primary);
            opacity: 0.85;
        }

        .page-product-detail .product-related-heading {
            color: var(--bs-primary);
            font-weight: 700;
        }

        .page-product-detail .prose img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
        }
    </style>
@endsection

@section('title_page')
@endsection

@section('title_page2')
@endsection

@section('content')
    @php
        $galleryUrls = $product->galleryUrls();
        $placeholder = asset('assets/images/products/product-11-330x440.jpg');
    @endphp

    <main id="content" class="wrapper layout-page page-product-detail">
        <section class="z-index-2 position-relative pb-2 mb-0">
            <div class="bg-body-secondary mb-0">
                <div class="container">
                    <nav class="py-4 lh-30px" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center py-1 mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <section class="product-detail-hero pt-8 pt-lg-10 pb-12 pb-lg-16">
            <div class="container">
                <div class="row g-4 g-lg-5 align-items-start">
                    <div class="col-md-6 pe-lg-13">
                        @if (count($galleryUrls) > 0)
                            <div class="product-detail-gallery-wrap">
                                <div id="product-detail-gallery" class="row g-3">
                                    @foreach ($galleryUrls as $url)
                                        <div class="{{ $loop->first ? 'col-12' : 'col-6' }}">
                                            <a href="{{ $url }}" class="d-block overflow-hidden hover-zoom-in">
                                                <img src="{{ $url }}" class="img-fluid w-100"
                                                    alt="{{ $product->title }}" width="540" height="720"
                                                    @if (! $loop->first) loading="lazy" decoding="async" @endif>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="product-detail-gallery-wrap">
                                <div class="overflow-hidden rounded-3">
                                    <img src="{{ $placeholder }}" class="img-fluid w-100" alt="{{ $product->title }}">
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6 pt-md-0 pt-8">
                        @if ($product->shouldDisplayFlashBadge())
                            <div class="mb-4">
                                <span
                                    class="badge badge-product-flash {{ $product->flashBadgeCssClass() }} px-3 py-2">{{ $product->flash_badge }}</span>
                            </div>
                        @endif

                        <h1 class="product-detail-title mb-5 pb-1">{{ $product->title }}</h1>

                        @if (filled($product->description))
                            <p class="product-detail-lead mb-0">
                                {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($product->description), ENT_QUOTES | ENT_HTML5, 'UTF-8'), 320) }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <div class="border-top border-opacity-10 w-100"></div>

        <section class="product-detail-tabs-section container pt-14 pb-12 pt-lg-16 pb-lg-20">
            <div class="collapse-tabs">
                <ul class="nav nav-tabs border-0 justify-content-center pb-10 pb-md-12 d-none d-md-flex gap-md-2"
                    id="productTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link m-auto fw-semibold py-3 px-6 fs-5 border-0 text-body-emphasis active"
                            id="product-details-tab" data-bs-toggle="tab" data-bs-target="#product-details" type="button"
                            role="tab" aria-controls="product-details" aria-selected="true">Product details</button>
                    </li>
                    @if (filled($product->how_to_use))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link m-auto fw-semibold py-3 px-6 fs-5 border-0 text-body-emphasis"
                                id="how-to-use-tab" data-bs-toggle="tab" data-bs-target="#how-to-use" type="button"
                                role="tab" aria-controls="how-to-use" aria-selected="false">How to use</button>
                        </li>
                    @endif
                </ul>

                <div class="tab-content">
                    <div class="tab-inner">
                        <div class="tab-pane fade show active" id="product-details" role="tabpanel"
                            aria-labelledby="product-details-tab" tabindex="0">
                            <div class="card border-0 bg-transparent">
                                <div
                                    class="card-header border-0 bg-transparent px-0 py-4 product-tabs-mobile d-block d-md-none">
                                    <h5 class="mb-0">
                                        <button class="btn lh-2 fs-5 py-3 px-6 shadow-none w-100 border text-primary"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapse-product-detail"
                                            aria-expanded="true" aria-controls="collapse-product-detail">Product details</button>
                                    </h5>
                                </div>
                                <div class="collapse show border-md-0 border rounded-3 p-md-0 p-6 bg-body-tertiary bg-opacity-25"
                                    id="collapse-product-detail">
                                    <div class="prose fs-15px text-body product-detail-prose mx-auto" style="max-width: 52rem;">
                                        @if (filled($product->description))
                                            {!! $product->description !!}
                                        @else
                                            <p class="text-body-secondary mb-0">No description has been added for this product yet.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (filled($product->how_to_use))
                            <div class="tab-pane fade" id="how-to-use" role="tabpanel" aria-labelledby="how-to-use-tab"
                                tabindex="0">
                                <div class="card border-0 bg-transparent">
                                    <div
                                        class="card-header border-0 bg-transparent px-0 py-4 product-tabs-mobile d-block d-md-none">
                                        <h5 class="mb-0">
                                            <button class="btn lh-2 fs-5 py-3 px-6 shadow-none w-100 border text-primary"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapse-how-to-use"
                                                aria-expanded="false" aria-controls="collapse-how-to-use">How to use</button>
                                        </h5>
                                    </div>
                                    <div class="collapse border-md-0 border rounded-3 p-md-0 p-6 bg-body-tertiary bg-opacity-25"
                                        id="collapse-how-to-use">
                                        <div class="prose fs-15px text-body mx-auto" style="max-width: 52rem;">
                                            {!! $product->how_to_use !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        @if ($relatedProducts->isNotEmpty())
            <div class="border-top border-opacity-10 w-100"></div>
            <section class="container pt-14 pb-15 pt-lg-16 pb-lg-20">
                <div class="text-center mb-10 mb-lg-11">
                    <h2 class="h3 mb-0 product-related-heading">You may also like</h2>
                </div>
                <div class="row gy-50px justify-content-center">
                    @foreach ($relatedProducts as $related)
                        @include('partials.product-grid-card', ['product' => $related])
                    @endforeach
                </div>
            </section>
        @endif
    </main>
@endsection

@section('scripts')
@endsection
