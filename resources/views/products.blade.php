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
                <div class="mb-13 text-center pb-3" data-animate="fadeInUp">
                    <h1 class="h3 mb-0">Products</h1>
                    @if (!empty($search))
                        <p class="text-body-secondary mb-0 mt-3">Results for &ldquo;{{ $search }}&rdquo;</p>
                    @else
                        <p class="text-body-secondary mb-0 mt-3">All items from your catalog</p>
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
