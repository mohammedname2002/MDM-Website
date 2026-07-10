@extends('layouts.master')
@section('title')

MDM
@endsection
@section('css')



@endsection
@section('title_page')


@endsection
@section('title_page2')



@endsection
@section('content')

    <main id="content" class="wrapper layout-page">
        <section class="pb-15 pb-lg-20">
            <div class="container">
                @php
                    $activeCategory = $activeCategory ?? null;
                    $activeSubcategory = $activeSubcategory ?? null;
                    $pageHeading = $activeSubcategory->name ?? $activeCategory->name ?? 'Products';
                @endphp
                <div class="mb-13 text-center pb-3" data-animate="fadeInUp">
                    <h1 class="h3 mb-0">{{ $pageHeading }}</h1>
                    @if (!empty($search))
                        <p class="text-body-secondary mb-0 mt-3">Results for &ldquo;{{ $search }}&rdquo;</p>
                    @elseif ($activeSubcategory && $activeCategory)
                        <p class="text-body-secondary mb-0 mt-3">{{ $activeCategory->name }} &rsaquo; {{ $activeSubcategory->name }}</p>
                    @elseif ($activeCategory)
                        <p class="text-body-secondary mb-0 mt-3">Browsing the {{ $activeCategory->name }} category</p>
                    @else
                        <p class="text-body-secondary mb-0 mt-3">All items from your catalog</p>
                    @endif
                    @if ($activeCategory || $activeSubcategory)
                        <a href="{{ route('products') }}" class="btn btn-sm header-nav-link mt-3">
                            <i class="bi bi-arrow-left me-1" aria-hidden="true"></i> All products
                        </a>
                    @endif
                </div>

                <div class="row gy-50px justify-content-center">
                    @forelse ($products as $product)
                        @include('partials.product-grid-card', ['product' => $product])
                    @empty
                        <div class="col-12 text-center py-10">
                            <p class="text-body-secondary mb-0">No products yet. Add them in the admin panel under Shop
                                &rarr; Products.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

@endsection
@section('scripts')



@endsection
