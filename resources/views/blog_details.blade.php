@extends('layouts.master')

@section('title', ($blog->title ?? 'Blog') . ' — ' . config('app.name', 'MDM'))

@section('content')
    @php
        $cover = $blog->coverUrl() ?? asset('assets/images/blog/post-style-4-img-1.jpg');
        $postTags = is_array($blog->tags) ? collect($blog->tags)->filter()->values()->all() : [];
        $shareUrl = url()->current();
        $shareText = $blog->title ?? '';
    @endphp

    <main id="content" class="wrapper layout-page">
        <section class="z-index-2 position-relative pb-2 mb-12">
            <div class="bg-body-secondary mb-3">
                <div class="container">
                    <nav class="py-4 lh-30px" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center py-1 mb-0">
                            <li class="breadcrumb-item"><a title="Home" href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <section class="pt-10 pb-16 pb-lg-18">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="position-sticky top-0">
                            <aside class="primary-sidebar mt-12 pt-2 mt-lg-0 pt-lg-0 pe-xl-9 me-xl-2">
                                <div class="widget widget-search">
                                    <h4 class="widget-title fs-5 mb-6">Search</h4>
                                    <form method="get" action="{{ url()->current() }}">
                                        <div class="input-group">
                                            <button type="submit"
                                                class="input-group-text bg-transparent px-4 border-0 position-absolute z-index-4 text-body-emphasis fs-5 start-0 top-0 bottom-0 m-auto"
                                                aria-label="Search">
                                                <i class="bi bi-search"></i>
                                            </button>
                                            <input type="search" name="search" value="{{ $search ?? '' }}"
                                                class="form-control ps-11" placeholder="Search">
                                        </div>
                                    </form>
                                </div>

                                <div class="widget widget-category">
                                    <h4 class="widget-title fs-5 mb-6">Category</h4>
                                    @if ($categories->isEmpty())
                                        <p class="text-body-secondary mb-0">No categories yet.</p>
                                    @else
                                        <ul class="navbar-nav navbar-nav-cate" id="widget_category">
                                            @foreach ($categories as $cat)
                                                <li class="nav-item">
                                                    <a href="{{ url()->current() . '?category=' . urlencode($cat) }}"
                                                        class="text-reset position-relative d-block text-decoration-none text-body-emphasis-hover d-flex align-items-center {{ $blog->category === $cat ? 'active' : '' }}"><span
                                                            class="text-hover-underline">{{ $cat }}</span></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                                <div class="widget widget-post">
                                    <h4 class="widget-title fs-5 mb-6">Recent posts</h4>
                                    @if ($recentPosts->isEmpty())
                                        <p class="text-body-secondary mb-0">No posts yet.</p>
                                    @else
                                        <ul class="list-unstyled mb-0 row gy-7 gx-0">
                                            @foreach ($recentPosts as $p)
                                                @php
                                                    $thumb =
                                                        $p->coverUrl() ??
                                                        $p->mainImageUrl() ??
                                                        asset('assets/images/blog/post-12-60x80.jpg');
                                                @endphp
                                                <li class="col-12">
                                                    <div class="card border-0 flex-row">
                                                        <figure class="flex-shrink-0 mb-0 me-7">
                                                            <a href="{{ route('blogs.show', $p) }}" class="d-block"
                                                                title="{{ $p->title }}">
                                                                <img data-src="{{ $thumb }}"
                                                                    class="img-fluid lazy-image" alt="{{ $p->title }}"
                                                                    width="60" height="80" src="#">
                                                            </a>
                                                        </figure>
                                                        <div class="card-body p-0">
                                                            @if (filled($p->category))
                                                                <h5
                                                                    class="card-text fw-semibold ls-1 text-uppercase fs-13px mb-3 text-body text-primary-hover">
                                                                    <a class="text-decoration-none text-reset"
                                                                        href="{{ route('blogs.show', $p) }}"
                                                                        title="{{ $p->category }}">{{ $p->category }}</a>
                                                                </h5>
                                                            @endif
                                                            <h4
                                                                class="card-title mb-0 text-body-emphasis fs-15px lh-base text-primary-hover">
                                                                <a class="text-decoration-none text-reset"
                                                                    href="{{ route('blogs.show', $p) }}"
                                                                    title="{{ $p->title }}">{{ $p->title }}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                                <div class="widget widget-tags">
                                    <h4 class="widget-title fs-5 mb-6">Tags</h4>
                                    @if ($tags->isEmpty())
                                        <p class="text-body-secondary mb-0">No tags yet.</p>
                                    @else
                                        <ul class="w-100 mt-n4 list-unstyled d-flex flex-wrap mb-0">
                                            @foreach ($tags as $t)
                                                <li class="me-6 mt-4">
                                                    <a href="{{ url()->current() . '?tag=' . urlencode($t) }}"
                                                        class="text-reset d-block text-decoration-none text-body-emphasis-hover text-hover-underline">#{{ $t }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </aside>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="text-center mb-13">
                            @if (filled($blog->category))
                                <span
                                    class="btn btn-light btn-hover-bg-dark btn-hover-border-dark btn-hover-text-light shadow-none py-0 px-6 mb-6">{{ $blog->category }}</span>
                            @endif
                            <h2 class="px-6 text-body-emphasis border-0 fw-500 mb-4 fs-3">
                                {{ $blog->title }}
                            </h2>
                            <ul
                                class="list-inline fs-15px fw-semibold letter-spacing-01 d-flex justify-content-center align-items-center flex-wrap">
                                @if (filled($blog->name))
                                    <li class="border-end px-6 text-body-emphasis border-0 text-body">
                                        By <span>{{ $blog->name }}</span>
                                    </li>
                                @endif
                                <li class="list-inline-item px-6">{{ $blog->published_at?->format('M j, Y') ?? $blog->created_at?->format('M j, Y') }}</li>
                                <li class="ms-5 list-style-disc">{{ number_format((int) ($blog->views ?? 0)) }} views
                                </li>
                            </ul>
                        </div>

                        <div class="post-content">
                            <img data-src="{{ $cover }}" width="770" height="470" alt="" class="lazy-image mb-12 img-fluid"
                                src="#">

                            @if (filled($blog->description))
                                <p class="mb-6">{{ $blog->description }}</p>
                            @endif

                            @if (filled($blog->content))
                                <div class="mb-12">{!! $blog->content !!}</div>
                            @endif

                            @php
                                $gallery = $blog->imageUrls();
                                $rest = $gallery ? array_slice($gallery, 0, 6) : [];
                            @endphp
                            @if (! empty($rest))
                                <div class="row g-4">
                                    @foreach ($rest as $url)
                                        <div class="col-6 col-md-4">
                                            <a href="{{ $url }}" class="d-block hover-zoom-in hover-shine"
                                                data-gallery="blog_gallery">
                                                <img src="#" data-src="{{ $url }}" class="img-fluid lazy-image w-100"
                                                    alt="">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="row no-gutters pt-11 justify-content-sm-between">
                            <div class="col-sm-6 mb-4 mb-sm-0">
                                @if (! empty($postTags))
                                    <ul class="list-inline fw-semibold mb-0">
                                        @foreach ($postTags as $t)
                                            <li class="list-inline-item me-3">
                                                <a href="{{ url()->current() . '?tag=' . urlencode($t) }}"
                                                    class="text-body text-body-emphasis-hover text-decoration-none">#{{ $t }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="col-sm-6 d-flex justify-content-sm-end">
                                <label class="text-secondary fw-semibold me-7 mb-0">Share:</label>
                                <ul class="list-inline mb-0 lh-1">
                                    <li class="list-inline-item me-7">
                                        <a class="fs-18px lh-14 fw-normal"
                                            href="https://twitter.com/intent/tweet?text={{ urlencode($shareText) }}&url={{ urlencode($shareUrl) }}"
                                            target="_blank" rel="noreferrer">X</a>
                                    </li>
                                    <li class="list-inline-item me-7">
                                        <a class="fs-18px lh-14 fw-normal"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}"
                                            target="_blank" rel="noreferrer">Facebook</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="fs-18px lh-14 fw-normal"
                                            href="https://wa.me/?text={{ urlencode($shareText . ' ' . $shareUrl) }}"
                                            target="_blank" rel="noreferrer">WhatsApp</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 mt-5 mb-7">
                                <div class="border-bottom"></div>
                            </div>
                        </div>

                        <div class="pt-14 pb-13 pb-lg-15 pt-lg-18 mx-n5" id="post_related">
                            <div class="container">
                                <div class="text-center">
                                    <h2 class="mb-6 fs-3">Related Posts</h2>
                                </div>
                            </div>
                            <div class="container container-xxl mt-10 pt-3">
                                @if ($relatedPosts->isEmpty())
                                    <p class="text-center text-body-secondary mb-0">No related posts yet.</p>
                                @else
                                    <div class="slick-slider"
                                        data-slick-options='{&#34;arrows&#34;:false,&#34;dots&#34;:false,&#34;responsive&#34;:[{&#34;breakpoint&#34;:1200,&#34;settings&#34;:{&#34;slidesToShow&#34;:3}},{&#34;breakpoint&#34;:992,&#34;settings&#34;:{&#34;dots&#34;:true,&#34;slidesToShow&#34;:2}},{&#34;breakpoint&#34;:768,&#34;settings&#34;:{&#34;dots&#34;:true,&#34;slidesToShow&#34;:1}}],&#34;slidesToShow&#34;:3}'>
                                        @foreach ($relatedPosts as $rp)
                                            @php
                                                $img =
                                                    $rp->coverUrl() ??
                                                    $rp->mainImageUrl() ??
                                                    asset('assets/images/blog/post-12-237x288.jpg');
                                            @endphp
                                            <div>
                                                <article class="card card-post-grid-3 bg-transparent border-0"
                                                    data-animate="fadeInUp">
                                                    <figure class="card-img-top mb-8 position-relative">
                                                        <a href="{{ route('blogs.show', $rp) }}"
                                                            class="hover-shine hover-zoom-in d-block"
                                                            title="{{ $rp->title }}">
                                                            <img data-src="{{ $img }}"
                                                                class="img-fluid lazy-image w-100" alt="{{ $rp->title }}"
                                                                width="237" height="288" src="#">
                                                        </a>
                                                    </figure>
                                                    <div class="card-body p-0">
                                                        @if (filled($rp->category))
                                                            <ul
                                                                class="post-meta list-inline lh-1 d-flex flex-wrap fs-13px text-uppercase ls-1 fw-semibold m-0">
                                                                <li class="list-inline-item">
                                                                    <a class="text-reset text-decoration-none text-primary-hover"
                                                                        href="{{ route('blogs.show', $rp) }}"
                                                                        title="{{ $rp->category }}">{{ $rp->category }}</a>
                                                                </li>
                                                            </ul>
                                                        @endif
                                                        <h4 class="card-title fs-6 lh-base mt-5 pt-2 mb-0">
                                                            <a class="text-decoration-none"
                                                                href="{{ route('blogs.show', $rp) }}"
                                                                title="{{ $rp->title }}">{{ $rp->title }}</a>
                                                        </h4>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
