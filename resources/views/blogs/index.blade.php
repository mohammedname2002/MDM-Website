@extends('layouts.master')

@section('title', 'Blogs')

@section('content')
	<main id="content" class="wrapper layout-page">
		<section class="page-title z-index-2 position-relative">
			<div class="bg-body-secondary">
				<div class="container">
					<nav class="py-4 lh-30px" aria-label="breadcrumb">
						<ol class="breadcrumb justify-content-center py-1">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Blogs</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="text-center py-13">
				<div class="container">
					<h2 class="mb-0">Blog Update</h2>
				</div>
			</div>
		</section>

		<div class="container mb-lg-18 mb-16 pb-3">
			<div class="row">
				<div class="col-lg-8 order-lg-1">
					<div class="row gy-50px">
						@forelse ($blogs as $blog)
							<div class="col-12">
								<article class="card card-post-classic bg-transparent border-0" data-animate="fadeInUp">
									<figure class="card-img-top position-relative mb-10">
										<a href="{{ route('blogs.show', $blog->slug) }}" class="hover-shine hover-zoom-in d-block"
											title="{{ $blog->title }}">
											<img
												data-src="{{ $blog->coverUrl() ?: asset('assets/images/blog/post-01-770x470.jpg') }}"
												class="img-fluid lazy-image w-100" alt="{{ $blog->title }}" width="770" height="470"
												src="#">
										</a>

										@if (filled($blog->category))
											<a href="{{ route('blogs.index', ['category' => $blog->category]) }}"
												class="post-item-cate btn btn-text-light-body-emphasis btn-hover-bg-dark btn-hover-text-light fw-500 btn-light post-cat position-absolute top-100 start-50 translate-middle py-2 px-7 border-0"
												title="{{ $blog->category }}">{{ $blog->category }}</a>
										@endif
									</figure>
									<div class="card-body text-center px-md-9 py-0">
										<h4 class="card-title fs-3 mb-6 pb-2 mt-3">
											<a class="text-decoration-none" href="{{ route('blogs.show', $blog->slug) }}"
												title="{{ $blog->title }}">{{ $blog->title }}</a>
										</h4>
										<ul class="post-meta list-inline lh-1 d-flex flex-wrap justify-content-center m-0 align-items-center">
											<li class="list-inline-item border-end pe-5 me-5 ps-11 position-relative">
												<img data-src="{{ asset('assets/images/others/author-avatar.jpg') }}" width="32"
													height="32"
													class="rounded-circle position-absolute start-0 top-0 bottom-0 m-auto img-fluid lazy-image d-inline-flex"
													alt="{{ $blog->name ?: 'Admin' }}" src="#">
												By <a href="#" title="{{ $blog->name ?: 'Admin' }}">{{ $blog->name ?: 'Admin' }}</a>
											</li>
											<li class="list-inline-item me-5">
												{{ optional($blog->published_at)->format('M jS, Y') ?: $blog->created_at->format('M jS, Y') }}
											</li>
											<li class="list-inline-item me-5">
												<span style="--square-size: 4px;" class="square rounded-circle bg-dark bg-opacity-30"></span>
											</li>
											<li class="list-inline-item">{{ (int) ($blog->views ?? 0) }} views</li>
										</ul>
										<p class="card-text post-desc mt-6 mb-10">{{ $blog->excerpt(220) }}</p>
										<a href="{{ route('blogs.show', $blog->slug) }}"
											class="btn btn-dark btn-hover-bg-primary btn-hover-text-light btn-hover-border-primary">Read More</a>
									</div>
								</article>
							</div>
						@empty
							<div class="col-12">
								<div class="alert alert-info mb-0">
									No blogs found.
								</div>
							</div>
						@endforelse
					</div>

					@if ($blogs->hasPages())
						<nav class="d-flex mt-13 pt-3 justify-content-center" aria-label="pagination" data-animate="fadeInUp">
							{{ $blogs->links() }}
						</nav>
					@endif
				</div>

				<div class="col-lg-4 order-0">
					<div class="position-sticky top-0">
						<aside class="primary-sidebar mt-12 pt-2 mt-lg-0 pt-lg-0 pe-xl-9 me-xl-2">
							<div class="widget widget-search">
								<h4 class="widget-title fs-5 mb-6">Search</h4>
								<form method="get" action="{{ route('blogs.index') }}">
									@if (filled($category))
										<input type="hidden" name="category" value="{{ $category }}">
									@endif
									@if (filled($tag))
										<input type="hidden" name="tag" value="{{ $tag }}">
									@endif
									<div class="input-group">
										<button type="submit"
											class="input-group-text bg-transparent px-4 border-0 position-absolute z-index-4 text-body-emphasis fs-5 start-0 top-0 bottom-0 m-auto">
											<svg class="icon icon-magnifying-glass-light">
												<use xlink:href="#icon-magnifying-glass-light"></use>
											</svg>
										</button>
										<input type="search" name="search" class="form-control ps-11" placeholder="Search"
											value="{{ $search }}">
									</div>
								</form>
							</div>

							<div class="widget widget-category">
								<h4 class="widget-title fs-5 mb-6">Category</h4>
								<ul class="navbar-nav navbar-nav-cate" id="widget_category">
									@foreach ($categories as $c)
										<li class="nav-item">
											<a href="{{ route('blogs.index', array_filter(['search' => $search, 'category' => $c, 'tag' => $tag])) }}"
												title="{{ $c }}"
												class="text-reset position-relative d-block text-decoration-none text-body-emphasis-hover d-flex align-items-center {{ $category === $c ? 'active' : '' }}">
												<span class="text-hover-underline">{{ $c }}</span>
											</a>
										</li>
									@endforeach
								</ul>
							</div>

							<div class="widget widget-post">
								<h4 class="widget-title fs-5 mb-6">Recent posts</h4>
								<ul class="list-unstyled mb-0 row gy-7 gx-0">
									@foreach ($recentPosts as $p)
										<li class="col-12">
											<div class="card border-0 flex-row">
												<figure class="flex-shrink-0 mb-0 me-7">
													<a href="{{ route('blogs.show', $p->slug) }}" class="d-block" title="{{ $p->title }}">
														<img data-src="{{ $p->coverUrl() ?: asset('assets/images/blog/post-12-60x80.jpg') }}"
															class="img-fluid lazy-image" alt="{{ $p->title }}" width="60" height="80"
															src="#">
													</a>
												</figure>
												<div class="card-body p-0">
													@if (filled($p->category))
														<h5 class="card-text fw-semibold ls-1 text-uppercase fs-13px mb-3 text-body text-primary-hover">
															<a class="text-decoration-none text-reset"
																href="{{ route('blogs.index', ['category' => $p->category]) }}"
																title="{{ $p->category }}">{{ $p->category }}</a>
														</h5>
													@endif
													<h4 class="card-title mb-0 text-body-emphasis fs-15px lh-base text-primary-hover">
														<a class="text-decoration-none text-reset" href="{{ route('blogs.show', $p->slug) }}"
															title="{{ $p->title }}">{{ $p->title }}</a>
													</h4>
												</div>
											</div>
										</li>
									@endforeach
								</ul>
							</div>

							<div class="widget widget-tags">
								<h4 class="widget-title fs-5 mb-6">Tags</h4>
								<ul class="w-100 mt-n4 list-unstyled d-flex flex-wrap mb-0">
									@foreach ($tags as $t)
										<li class="me-6 mt-4">
											<a href="{{ route('blogs.index', array_filter(['search' => $search, 'category' => $category, 'tag' => $t])) }}"
												title="{{ $t }}"
												class="text-reset d-block text-decoration-none text-body-emphasis-hover text-hover-underline">
												{{ $t }}
											</a>
										</li>
									@endforeach
								</ul>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection

