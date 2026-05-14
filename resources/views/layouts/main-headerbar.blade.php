@php
    $mdmLogoPath = 'assets/images/mdm.png';
    $mdmLogoFile = public_path($mdmLogoPath);
    $hasMdmLogo = file_exists($mdmLogoFile);
    $mdmLogoUrl = $hasMdmLogo ? asset($mdmLogoPath) : null;
    $brandName = config('app.name', 'MDM');
@endphp

<header id="header"
	class="header header-sticky header-transparent header-sticky-smart disable-transition-all position-absolute start-0 end-0 z-index-5">
	<div class="sticky-area">
		<div
			class="main-header nav navbar navbar-dark bg-transparent navbar-expand-xl transition-all-1 py-4 py-xl-5">
			<div class="container-wide container">
				<div class="header-bar-grid">
					<a href="{{ url('/') }}"
						class="header-bar-brand navbar-brand d-inline-flex align-items-center py-2 my-0 flex-shrink-0 text-decoration-none"
						aria-label="{{ $brandName }} — Home">
						@if ($mdmLogoUrl)
							<img src="{{ $mdmLogoUrl }}" alt="" class="img-fluid d-block header-bar-logo">
						@else
							<span class="fs-1 fw-bold lh-sm text-primary">{{ $brandName }}</span>
						@endif
					</a>
					<div class="header-bar-actions d-flex align-items-center flex-wrap justify-content-end gap-2 min-w-0">
						<div class="header-bar-icons d-flex align-items-center gap-2 flex-shrink-0">
						<button type="button"
							class="btn btn-sm btn-outline-light rounded-pill header-ctrl-outline border d-inline-flex d-xl-none align-items-center justify-content-center"
							style="width: 2.5rem; height: 2.5rem;"
							data-bs-toggle="offcanvas"
							data-bs-target="#offCanvasNavBar"
							aria-controls="offCanvasNavBar"
							aria-label="Open menu">
							<i class="bi bi-list" aria-hidden="true"></i>
						</button>
						<a href="{{ route('products') }}"
							class="btn btn-sm header-nav-link d-none d-xl-inline-flex">
							Products
						</a>
						<a href="{{ route('blogs.index') }}"
							class="btn btn-sm header-nav-link d-none d-xl-inline-flex">
							Blogs
						</a>
						<a href="{{ route('about') }}"
							class="btn btn-sm header-nav-link header-nav-link--primary d-none d-xl-inline-flex">
							About
						</a>
						<a href="{{ route('contact') }}"
							class="btn btn-sm header-nav-link header-nav-link--primary d-none d-xl-inline-flex">
							Contact
						</a>
						<button type="button" id="header-theme-toggle"
							class="btn btn-sm btn-outline-light rounded-pill header-ctrl-outline border d-inline-flex align-items-center justify-content-center"
							style="width: 2.5rem; height: 2.5rem;" aria-label="Toggle color theme">
							<i class="bi bi-moon-fill theme-icon-when-light" aria-hidden="true"></i>
							<i class="bi bi-sun-fill theme-icon-when-dark d-none" aria-hidden="true"></i>
						</button>
						</div>
						<form class="header-bar-search d-flex align-items-center gap-2 min-w-0" method="get"
							action="{{ route('products') }}" role="search">
							<label for="header-search-q" class="visually-hidden">Search products</label>
							<input id="header-search-q" type="search" name="q" value="{{ old('q', request('q')) }}"
								class="form-control form-control-sm header-search-input rounded-pill px-3"
								placeholder="Search products" autocomplete="off">
							<button type="submit"
								class="btn btn-sm rounded-pill px-3 header-search-btn"
								aria-label="Search">
								<i class="bi bi-search" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<div id="offCanvasNavBar" class="offcanvas offcanvas-end" tabindex="-1" aria-labelledby="offCanvasNavBarLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offCanvasNavBarLabel">{{ $brandName }}</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<ul class="list-unstyled mb-0">
			<li class="mb-3">
				<a class="text-decoration-none fw-semibold" href="{{ url('/') }}">Home</a>
			</li>
			<li class="mb-3">
				<a class="text-decoration-none fw-semibold" href="{{ route('products') }}">Products</a>
			</li>
			<li class="mb-3">
				<a class="text-decoration-none fw-semibold" href="{{ route('blogs.index') }}">Blogs</a>
			</li>
			<li class="mb-3">
				<a class="text-decoration-none fw-semibold" href="{{ route('about') }}">About</a>
			</li>
			<li class="mb-3">
				<a class="text-decoration-none fw-semibold" href="{{ route('contact') }}">Contact</a>
			</li>
			<li class="mt-4 pt-3 border-top">
				<a class="text-decoration-none" href="{{ route('privacy') }}">Privacy Policy</a>
			</li>
			<li class="mt-3">
				<a class="text-decoration-none" href="{{ route('terms') }}">Terms &amp; Conditions</a>
			</li>
		</ul>
	</div>
</div>
