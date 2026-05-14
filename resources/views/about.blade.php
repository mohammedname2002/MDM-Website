@extends('layouts.master')
@section('title', 'About us — ' . config('app.name', 'MDM'))

@php
	$testimonials = is_array($about->testimonials) ? $about->testimonials : [];
	$teamMembers = is_array($about->team_members) ? $about->team_members : [];
	$heroLight = $about->mediaUrl($about->hero_bg_light, 'assets/images/banner/banner-48.jpg');
	$heroDark = $about->mediaUrl($about->hero_bg_dark, 'assets/images/banner/banner-white-42.jpg');
	$introImg = $about->mediaUrl($about->intro_image, 'assets/images/banner/banner-white-42.jpg');
	$storyOneImg = $about->mediaUrl($about->story_one_image, 'assets/images/banner/banner-48.jpg');
	$storyTwoImg = $about->mediaUrl($about->story_two_image, 'assets/images/banner/banner-white-42.jpg');
@endphp

@section('content')
	<main id="content" class="wrapper layout-page">
		<section class="position-relative" id="about_introduction">
			<div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100 light-mode-img"
				data-bg-src="{{ $heroLight }}"></div>
			<div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100"
				data-bg-src="{{ $heroDark }}"></div>
			<div class="position-relative z-index-2 container py-18 py-lg-25">
				<p class="fw-semibold ls-15 text-uppercase text-body-emphasis mb-lg-7 mt-lg-16">{{ $about->hero_kicker }}</p>
				<h2 class="fs-56px mb-7">{{ $about->hero_title }}</h2>
			</div>
		</section>

		@include('partials.science-aesthetics', [
		    'home' => $home,
		    'sectionId' => 'about-science-aesthetics',
		    'extraClass' => 'science-aesthetics-section--rounded-bottom',
		])

		<section>
			<div class="container pt-lg-17 pb-lg-20 pb-15 pt-11 mb-lg-4">
				<div class="text-center pb-lg-17 pb-13 mb-3">
					<img data-src="{{ $introImg }}" alt="" class="img-fluid lazy-image m-auto" width="150" height="158"
						src="#">
					@if (filled($about->intro_heading))
						<h3 class="mw-xl-50 mw-lg-60 mx-lg-auto mb-8">{{ $about->intro_heading }}</h3>
					@endif
					@if (filled($about->intro_body))
						<p class="mw-xl-60 mw-lg-75 mx-lg-auto mb-0">{{ $about->intro_body }}</p>
					@endif
				</div>
				<div class="row mb-lg-18 mb-15 pb-3 align-items-center">
					<div class="col-lg-6 pe-lg-0">
						<div class="card border-0 hover-zoom-in rounded-0">
							<div class="image-box-4">
								<img class="lazy-image img-fluid w-100" src="#" data-src="{{ $storyOneImg }}" width="960"
									height="640" alt="">
							</div>
						</div>
					</div>
					<div class="col-lg-6 px-lg-12 ps-xl-18 pe-xl-20 mt-12 mt-lg-0">
						@if (filled($about->story_one_heading))
							<h3 class="mb-8">{{ $about->story_one_heading }}</h3>
						@endif
						@if (filled($about->story_one_body))
							<p class="mb-0">{{ $about->story_one_body }}</p>
						@endif
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-lg-6 ps-lg-0 order-lg-1">
						<div class="card border-0 hover-zoom-in rounded-0">
							<div class="image-box-4">
								<img class="lazy-image img-fluid w-100" src="#" data-src="{{ $storyTwoImg }}" width="960"
									height="640" alt="">
							</div>
						</div>
					</div>
					<div class="col-lg-6 mt-12 mt-lg-0 ps-xl-15 pe-xl-20 px-lg-12">
						@if (filled($about->story_two_heading))
							<h3 class="mb-8">{{ $about->story_two_heading }}</h3>
						@endif
						@if (filled($about->story_two_body))
							<p class="mb-0">{{ $about->story_two_body }}</p>
						@endif
					</div>
				</div>
			</div>
		</section>

		@if (count($testimonials) > 0)
			<section id="about_testimonials" class="bg-body-tertiary">
				<div class="container pt-lg-20 pb-lg-19 pt-15 pb-16">
					<div class="row mb-11 mb-lg-15">
						<div class="col-lg-9 offset-lg-1 col-xl-8 offset-xl-2">
							<div class="slick-slider about-testimonials-slider"
								data-slick-options='{"slidesToShow":1,"dots":true,"arrows":false}'>
								@foreach ($testimonials as $item)
									@php $quote = is_array($item) ? ($item['quote'] ?? '') : ''; @endphp
									@if (filled($quote))
										<div class="text-center px-2">
											<h4 class="mb-0">&ldquo;{{ $quote }}&rdquo;</h4>
										</div>
									@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>
		@endif

		@if (count($teamMembers) > 0)
			<section class="pt-lg-18 pb-lg-16 pt-15 pb-md-13 pb-16">
				<div class="container">
					@if (filled($about->team_section_heading))
						<div class="text-center mx-auto w-xl-40 w-lg-50 mb-12 mb-lg-15">
							<h3 class="fs-3">{{ $about->team_section_heading }}</h3>
						</div>
					@endif
					<div class="slick-slider about-team-slider mx-xl-n11"
						data-slick-options='{"slidesToShow":3,"dots":false,"arrows":false,"responsive":[{"breakpoint":768,"settings":{"slidesToShow":2,"dots":true}},{"breakpoint":576,"settings":{"slidesToShow":1,"dots":true}}]}'>
						@foreach ($teamMembers as $member)
							@php
								$name = is_array($member) ? ($member['name'] ?? '') : '';
								$role = is_array($member) ? ($member['role'] ?? '') : '';
								$photo = is_array($member) ? ($member['photo'] ?? null) : null;
								$photoUrl = $about->mediaUrl($photo, 'assets/images/banner/banner-48.jpg');
							@endphp
							@if (filled($name))
								<div class="px-xl-11">
									<div class="card border-0 hover-change-image">
										<div class="position-relative overflow-hidden">
											<img class="card-img img-fluid lazy-image" src="#" data-src="{{ $photoUrl }}"
												width="377" height="446" alt="{{ $name }}">
										</div>
										<div class="card-body px-0 py-7 text-start">
											<h4 class="mb-1">{{ $name }}</h4>
											@if (filled($role))
												<p class="card-text mb-0 text-body-secondary">{{ $role }}</p>
											@endif
										</div>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</section>
		@endif
	</main>
@endsection
