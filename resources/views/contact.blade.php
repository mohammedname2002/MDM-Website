@extends('layouts.master')
@section('title', ($contact->breadcrumb_label ?? 'Contact us') . ' — ' . config('app.name', 'MDM'))

@section('css')
	<style>
		.page-contact {
			--contact-surface: #f9f7f2;
			--contact-pattern: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cpath fill='%23666' fill-opacity='0.028' d='M40 4c8 12-16 20-4 32s28-8 32 4-24 20-12 32 28-4 28 4-12 16-20 24S48 76 40 68 12 84 4 76s8-28 20-36 4-28-8-32S4 40 4 28 12 4 40 4z'/%3E%3C/svg%3E");
			--contact-gap-section: clamp(3rem, 6vw, 5.5rem);
			--contact-gap-block: clamp(2.25rem, 4vw, 3.75rem);
			--contact-hero-top: clamp(0.85rem, 2vw, 1.5rem);
		}

		html[data-bs-theme="dark"] .page-contact {
			--contact-surface: var(--bs-body-bg);
			--contact-pattern: none;
		}

		.page-contact .contact-page-surface {
			background-color: var(--contact-surface);
			background-image: var(--contact-pattern);
			background-size: 80px 80px;
		}

		.page-contact .contact-breadcrumb-bar {
			background: rgba(var(--bs-primary-rgb), 0.07);
			border-bottom: 1px solid rgba(var(--bs-primary-rgb), 0.07);
			padding-top: 1.1rem;
			padding-bottom: 1.1rem;
		}

		html[data-bs-theme="dark"] .page-contact .contact-breadcrumb-bar {
			background: rgba(var(--bs-primary-rgb), 0.1);
			border-bottom-color: rgba(255, 255, 255, 0.06);
		}

		.page-contact .contact-hero-zone {
			padding-top: var(--contact-hero-top);
			padding-bottom: var(--contact-gap-section);
		}

		.page-contact .contact-hero-heading-wrap {
			margin-bottom: var(--contact-gap-block);
			max-width: 48rem;
			margin-left: auto;
			margin-right: auto;
		}

		.page-contact .contact-hero-title {
			color: var(--bs-primary);
			font-weight: 700;
			font-size: clamp(1.85rem, 3.5vw, 2.65rem);
			line-height: 1.2;
			letter-spacing: -0.02em;
		}

		.page-contact .contact-hero-lead {
			font-size: 1.0625rem;
			line-height: 1.75;
			max-width: 38rem;
			margin-left: auto;
			margin-right: auto;
			margin-top: 1.25rem;
		}

		.page-contact .contact-cards-row {
			margin-top: 0.25rem;
		}

		.page-contact .contact-info-card {
			background: var(--bs-body-bg);
			border-radius: 1.25rem;
			padding: 2rem 1.65rem;
			height: 100%;
			box-shadow: 0 0.35rem 1.75rem rgba(var(--bs-body-color-rgb), 0.06);
			border: 1px solid rgba(var(--bs-primary-rgb), 0.07);
			transition: box-shadow 0.2s ease, transform 0.2s ease;
		}

		html[data-bs-theme="dark"] .page-contact .contact-info-card {
			box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.25);
			border-color: rgba(255, 255, 255, 0.06);
		}

		@media (min-width: 768px) {
			.page-contact .contact-info-card:hover {
				box-shadow: 0 0.65rem 2rem rgba(var(--bs-body-color-rgb), 0.09);
			}
		}

		.page-contact .contact-info-card h3 {
			color: var(--bs-primary);
			font-weight: 700;
			font-size: 1.05rem;
		}

		.page-contact .contact-icon-ring {
			width: 3rem;
			height: 3rem;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-shrink: 0;
			background: rgba(var(--bs-primary-rgb), 0.11);
			color: var(--bs-primary);
		}

		.page-contact .contact-map-section {
			padding-top: var(--contact-gap-section);
			padding-bottom: var(--contact-gap-section);
		}

		.page-contact .contact-map-wrap {
			border-radius: 1.25rem;
			overflow: hidden;
			box-shadow: 0 0.5rem 2rem rgba(var(--bs-body-color-rgb), 0.07);
			border: 1px solid rgba(var(--bs-primary-rgb), 0.08);
		}

		html[data-bs-theme="dark"] .page-contact .contact-map-wrap {
			box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.35);
		}

		.page-contact .contact-form-section {
			padding-top: var(--contact-gap-section);
			padding-bottom: clamp(4rem, 8vw, 6rem);
		}

		.page-contact .contact-form-panel {
			background: var(--bs-body-bg);
			border-radius: 1.5rem;
			padding: clamp(2rem, 4vw, 3rem) clamp(1.5rem, 3vw, 2.85rem);
			box-shadow: 0 0.5rem 2.25rem rgba(var(--bs-body-color-rgb), 0.07);
			border: 1px solid rgba(var(--bs-primary-rgb), 0.08);
		}

		html[data-bs-theme="dark"] .page-contact .contact-form-panel {
			box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.3);
		}

		.page-contact .contact-form-panel h2 {
			color: var(--bs-primary);
			font-weight: 700;
			margin-bottom: clamp(1.75rem, 3vw, 2.5rem);
		}

		.page-contact .contact-form .form-control {
			border-radius: 0.85rem;
			padding: 0.9rem 1.15rem;
			border-color: rgba(var(--bs-body-color-rgb), 0.12);
			background-color: rgba(var(--bs-body-color-rgb), 0.04);
		}

		html[data-bs-theme="dark"] .page-contact .contact-form .form-control {
			border-color: rgba(255, 255, 255, 0.1);
			background-color: rgba(255, 255, 255, 0.04);
		}

		.page-contact .contact-form .form-control:focus {
			background-color: var(--bs-body-bg);
			border-color: var(--bs-primary);
			box-shadow: 0 0 0 0.2rem rgba(var(--bs-primary-rgb), 0.2);
		}

		.page-contact .contact-form .btn-submit {
			border-radius: 999px;
			padding: 0.9rem 2.35rem;
			font-weight: 600;
			display: inline-flex;
			align-items: center;
			gap: 0.5rem;
		}

		.page-contact .contact-directions-link {
			color: var(--bs-primary);
			text-decoration: none;
			font-weight: 600;
			border-bottom: 1px solid rgba(var(--bs-primary-rgb), 0.35);
			padding-bottom: 1px;
		}

		.page-contact .contact-directions-link:hover {
			border-bottom-color: var(--bs-primary);
			color: var(--bs-primary);
		}

		.page-contact .breadcrumb-item.active {
			color: var(--bs-primary);
			font-weight: 600;
		}

		.page-contact .contact-form .row-fields {
			margin-bottom: 1.35rem;
		}

		@media (min-width: 768px) {
			.page-contact .contact-form .row-fields {
				margin-bottom: 1.6rem;
			}
		}
	</style>
@endsection

@php
	$mapOpts = $contact->mapOptionsResolved();
	$mapMarkers = $contact->mapMarkersResolved();
	$token = trim((string) ($contact->mapbox_access_token ?? ''));
@endphp

@section('content')
	<main id="content" class="wrapper layout-page page-contact">
		<section class="contact-page-surface">
			<div class="contact-breadcrumb-bar py-4">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center mb-0">
						<li class="breadcrumb-item">
							<a class="text-decoration-none text-body-secondary" href="{{ url('/') }}">Home</a>
						</li>
						<li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">
							{{ $contact->breadcrumb_label }}
						</li>
					</ol>
				</nav>
			</div>
			<div class="container contact-hero-zone">
				<div class="text-center contact-hero-heading-wrap">
					<h1 class="contact-hero-title mb-0">{{ $contact->hero_title }}</h1>
					@if (filled($contact->hero_subtitle))
						<p class="contact-hero-lead text-body mb-0">{{ $contact->hero_subtitle }}</p>
					@endif
				</div>
				<div class="row g-4 g-lg-5 contact-cards-row">
					<div class="col-md-4">
						<div class="contact-info-card">
							<div class="d-flex align-items-start gap-3">
								<div class="contact-icon-ring">
									<i class="bi bi-geo-alt fs-4" aria-hidden="true"></i>
								</div>
								<div class="min-w-0">
									<h3 class="mb-2">{{ $contact->address_heading }}</h3>
									@if (filled($contact->address_body))
										<div class="fs-6 text-body mb-3">{!! nl2br(e($contact->address_body)) !!}</div>
									@endif
									@if (filled($contact->directions_url))
										<a href="{{ $contact->directions_url }}" class="contact-directions-link fs-6"
											@if (str_starts_with((string) $contact->directions_url, 'http')) target="_blank" rel="noopener noreferrer" @endif>
											{{ $contact->directions_label }}
										</a>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-info-card">
							<div class="d-flex align-items-start gap-3">
								<div class="contact-icon-ring">
									<i class="bi bi-telephone fs-4" aria-hidden="true"></i>
								</div>
								<div class="min-w-0">
									<h3 class="mb-4">{{ $contact->contact_heading }}</h3>
									<div class="fs-6 text-body">
										@if (filled($contact->mobile))
											<p class="mb-2 mb-md-3">{{ $contact->mobile_label }}<span
													class="text-body-emphasis"> {{ $contact->mobile }}</span></p>
										@endif
										@if (filled($contact->hotline))
											<p class="mb-2 mb-md-3">{{ $contact->hotline_label }}<span
													class="text-body-emphasis"> {{ $contact->hotline }}</span></p>
										@endif
										@if (filled($contact->email))
											<p class="mb-0">{{ $contact->email_label }}
												<a class="text-body-emphasis text-decoration-none"
													href="mailto:{{ e($contact->email) }}">{{ $contact->email }}</a>
											</p>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-info-card">
							<div class="d-flex align-items-start gap-3">
								<div class="contact-icon-ring">
									<i class="bi bi-clock fs-4" aria-hidden="true"></i>
								</div>
								<div class="min-w-0">
									<h3 class="mb-4">{{ $contact->hours_heading }}</h3>
									<div class="fs-6 text-body">
										@if (filled($contact->weekday_hours))
											<dl class="d-flex mb-3 mb-md-2">
												<dt class="pe-3 text-body-emphasis fw-500 flex-shrink-0" style="width: 7rem">
													{{ $contact->weekday_label }}</dt>
												<dd class="mb-0"> {{ $contact->weekday_hours }}</dd>
											</dl>
										@endif
										@if (filled($contact->weekend_hours))
											<dl class="d-flex mb-0">
												<dt class="pe-3 text-body-emphasis fw-500 flex-shrink-0" style="width: 7rem">
													{{ $contact->weekend_label }}</dt>
												<dd class="mb-0"> {{ $contact->weekend_hours }}</dd>
											</dl>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		@if ($token !== '' && $mapOpts !== [])
			<section class="contact-page-surface contact-map-section">
				<div class="container">
					<div class="contact-map-wrap">
						<div id="map"
							class="mapbox-gl map-point-animate map-box-has-effect"
							style="height:{{ max(200, (int) $contact->map_height) }}px"
							data-mapbox-access-token="{{ e($token) }}"
							data-mapbox-options="{{ e(json_encode($mapOpts, JSON_UNESCAPED_SLASHES)) }}"
							data-mapbox-marker="{{ e(json_encode($mapMarkers, JSON_UNESCAPED_SLASHES)) }}">
						</div>
					</div>
				</div>
			</section>
		@endif

		<section class="contact-page-surface contact-form-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10 col-xl-8">
						<div class="contact-form-panel text-center">
							<h2 class="fs-2 mb-0">{{ $contact->form_heading }}</h2>
							@if (session('contact_sent'))
								<div class="alert alert-success text-start mb-8 rounded-3 border-0" role="alert">
									Thank you — your message was received.
								</div>
							@endif
							<form class="contact-form text-start" method="post" action="{{ route('contact.submit') }}">
								@csrf
								<input type="hidden" name="redirect_to" value="{{ route('contact') }}">
								<div class="row mb-6 mb-md-8">
									<div class="col-md-6 col-12 mb-5 mb-md-0">
										<label class="visually-hidden" for="contactName">{{ $contact->placeholder_name }}</label>
										<input id="contactName" type="text" name="name" value="{{ old('name') }}"
											class="form-control input-focus @error('name') is-invalid @enderror"
											placeholder="{{ $contact->placeholder_name }}" required aria-required="true"
											autocomplete="name">
										@error('name')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="col-md-6 col-12">
										<label class="visually-hidden" for="contactEmail">{{ $contact->placeholder_email }}</label>
										<input id="contactEmail" type="email" name="email" value="{{ old('email') }}"
											class="form-control input-focus @error('email') is-invalid @enderror"
											placeholder="{{ $contact->placeholder_email }}" required aria-required="true"
											autocomplete="email">
										@error('email')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
								<div class="mb-6">
									<label class="visually-hidden" for="contactMessage">{{ $contact->placeholder_message }}</label>
									<textarea id="contactMessage" name="message" rows="6"
										class="form-control input-focus @error('message') is-invalid @enderror"
										placeholder="{{ $contact->placeholder_message }}" required
										aria-required="true">{{ old('message') }}</textarea>
									@error('message')
										<div class="invalid-feedback d-block mb-2">{{ $message }}</div>
									@enderror
								</div>
								@if (filled($contact->checkbox_label))
									<div class="form-check mb-8 text-start">
										<input class="form-check-input rounded-2" type="checkbox" value="1" name="remember"
											id="contactRemember" {{ old('remember') ? 'checked' : '' }}>
										<label class="form-check-label text-body" for="contactRemember">
											{{ $contact->checkbox_label }}
										</label>
									</div>
								@endif
								<div class="text-center pt-2">
									<button type="submit"
										class="btn btn-primary btn-submit text-white px-9 shadow-sm">
										{{ $contact->submit_label }}
										<i class="bi bi-arrow-right-circle" aria-hidden="true"></i>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection
