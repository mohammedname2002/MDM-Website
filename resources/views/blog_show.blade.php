@extends('layouts.master')
@section('title', $blog->title . ' — ' . config('app.name', 'MDM'))

@section('content')
    <main id="content" class="wrapper layout-page">
        <section class="pt-13 pb-16 py-lg-18">
            <div class="container" style="max-width: 800px">
                <p class="text-body-secondary mb-3">
                    <a href="{{ url('/') }}" class="text-decoration-none">Home</a>
                    <span class="mx-2">/</span>
                    <span>Blog</span>
                </p>
                <h1 class="mb-6">{{ $blog->title }}</h1>
                <ul class="post-meta list-inline lh-1 d-flex flex-wrap m-0 mb-10 text-body-secondary">
                    @if (filled($blog->name))
                        <li class="list-inline-item border-end pe-5 me-5">{{ $blog->name }}</li>
                    @endif
                    <li class="list-inline-item">{{ $blog->created_at?->format('M j, Y') }}</li>
                </ul>
                @if ($blog->mainImageUrl())
                    <figure class="mb-10">
                        <img src="{{ $blog->mainImageUrl() }}" class="img-fluid w-100" alt="{{ $blog->title }}"
                            width="800" height="600">
                    </figure>
                @endif
                @if (filled($blog->description))
                    <div class="fs-18px text-body blog-post-body">
                        {!! nl2br(e($blog->description)) !!}
                    </div>
                @endif
                @php
                    $gallery = $blog->imageUrls();
                    $rest = count($gallery) > 1 ? array_slice($gallery, 1) : [];
                @endphp
                @foreach ($rest as $url)
                    <figure class="mt-8 mb-0">
                        <img src="{{ $url }}" class="img-fluid w-100" alt="" loading="lazy">
                    </figure>
                @endforeach
            </div>
        </section>
    </main>
@endsection
