


<title>@yield('title', 'MDM')</title>



	<link rel="stylesheet" href="{{ asset('assets/vendors/lightgallery/css/lightgallery-bundle.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/animate/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/cdn.jsdelivr.net/npm/bootstrap-icons%401.9.1/font/bootstrap-icons.css') }}">
	<link
		href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
	<style>
		/* ======================================================
		   DARK MODE: Primary aligned with MDM logo blue (#3277d8)
		   ====================================================== */
		html[data-bs-theme="dark"] {
			/* Core primary color variables */
			--bs-primary: #3277d8 !important;
			--bs-primary-rgb: 50, 119, 216 !important;
			--bs-primary-text: #93c5fd !important;
			--bs-primary-text-emphasis: #93c5fd !important;
			--bs-primary-bg-subtle: rgba(50, 119, 216, 0.22) !important;
			--bs-primary-border-subtle: rgba(100, 165, 235, 0.45) !important;

			/* Link colors */
			--bs-link-color: #93c5fd !important;
			--bs-link-hover-color: #bfdbfe !important;

			/* Body background: dark navy instead of greenish */
			--bs-body-bg: #0d1a2d !important;
			--bs-secondary-bg: #162236 !important;
			--bs-tertiary-bg: #1a2940 !important;

			/* Section backgrounds: override greenish colors with navy variants */
			--bs-section-color-2: #162236 !important;
			--bs-section-color-3: #162236 !important;
			--bs-section-color-4: #0a1528 !important;
			--bs-section-color-5: #3277d8 !important;
			--bs-section-color-6: #162236 !important;
			--bs-section-color-7: #0d1a2d !important;
			--bs-section-color-8: #1a2940 !important;
			--bs-section-color-9: #162236 !important;
			--bs-section-color-10: #2563c0 !important;
			--bs-section-color-11: #162236 !important;

			/* Dropdown active */
			--bs-dropdown-link-active-bg: #3277d8 !important;

			/* Nav pills */
			--bs-nav-pills-link-active-bg: #3277d8 !important;

			/* Pagination */
			--bs-pagination-active-color: #3277d8 !important;

			/* Accordion focus border */
			--bs-accordion-btn-focus-border-color: #3277d8 !important;
		}

		/* Buttons: .btn-primary */
		html[data-bs-theme="dark"] .btn-primary {
			--bs-btn-bg: #3277d8 !important;
			--bs-btn-border-color: #3277d8 !important;
			--bs-btn-hover-color: #fff !important;
			--bs-btn-hover-bg: #4a94eb !important;
			--bs-btn-hover-border-color: #4a94eb !important;
			--bs-btn-active-color: #fff !important;
			--bs-btn-active-bg: #2563c0 !important;
			--bs-btn-active-border-color: #2563c0 !important;
			--bs-btn-disabled-bg: #3277d8 !important;
			--bs-btn-disabled-border-color: #3277d8 !important;
			background-color: #3277d8 !important;
			border-color: #3277d8 !important;
		}
		html[data-bs-theme="dark"] .btn-primary:hover {
			background-color: #4a94eb !important;
			border-color: #4a94eb !important;
		}

		/* Buttons: .btn-outline-primary */
		html[data-bs-theme="dark"] .btn-outline-primary {
			--bs-btn-color: #93c5fd !important;
			--bs-btn-border-color: #3277d8 !important;
			--bs-btn-hover-color: #fff !important;
			--bs-btn-hover-bg: #3277d8 !important;
			--bs-btn-hover-border-color: #3277d8 !important;
			--bs-btn-active-color: #fff !important;
			--bs-btn-active-bg: #2563c0 !important;
			--bs-btn-active-border-color: #2563c0 !important;
			--bs-btn-disabled-color: #3277d8 !important;
			--bs-btn-disabled-border-color: #3277d8 !important;
		}

		/* Hover text primary */
		html[data-bs-theme="dark"] .btn-hover-text-primary:hover {
			color: #93c5fd !important;
		}

		/* Button hover utility classes */
		html[data-bs-theme="dark"] .btn-hover-bg-primary {
			--bs-btn-hover-bg: #3277d8 !important;
		}
		html[data-bs-theme="dark"] .btn-hover-bg-primary:hover {
			background-color: #3277d8 !important;
		}
		html[data-bs-theme="dark"] .btn-hover-border-primary {
			--bs-btn-hover-border-color: #3277d8 !important;
		}
		html[data-bs-theme="dark"] .btn-hover-border-primary:hover {
			border-color: #3277d8 !important;
		}
		html[data-bs-theme="dark"] .btn-hover-text-primary {
			--bs-btn-hover-color: #bfdbfe !important;
		}

		/* Background utilities */
		html[data-bs-theme="dark"] .bg-primary {
			background-color: #3277d8 !important;
		}

		/* Text utilities */
		html[data-bs-theme="dark"] .text-primary {
			color: #93c5fd !important;
		}
		html[data-bs-theme="dark"] a.text-primary:hover {
			color: #bfdbfe !important;
		}

		/* Link utilities */
		html[data-bs-theme="dark"] .link-primary {
			color: #93c5fd !important;
		}
		html[data-bs-theme="dark"] .link-primary:hover {
			color: #bfdbfe !important;
		}

		/* Badge */
		html[data-bs-theme="dark"] .badge.bg-primary {
			background-color: #3277d8 !important;
		}

		/* Pagination active */
		html[data-bs-theme="dark"] .pagination .page-item.active .page-link {
			background-color: #3277d8 !important;
			border-color: #3277d8 !important;
		}

		/* Nav pills active */
		html[data-bs-theme="dark"] .nav-pills .nav-link.active {
			background-color: #3277d8 !important;
		}

		/* Dropdown active */
		html[data-bs-theme="dark"] .dropdown-item.active,
		html[data-bs-theme="dark"] .dropdown-item:active {
			background-color: #3277d8 !important;
		}

		/* Form focus states */
		html[data-bs-theme="dark"] .form-control:focus,
		html[data-bs-theme="dark"] .form-select:focus {
			border-color: #3277d8 !important;
			box-shadow: 0 0 0 0.25rem rgba(50, 119, 216, 0.25) !important;
		}

		/* Checkbox / Radio checked */
		html[data-bs-theme="dark"] .form-check-input:checked {
			background-color: #3277d8 !important;
			border-color: #3277d8 !important;
		}

		/* Progress bar */
		html[data-bs-theme="dark"] .progress-bar {
			background-color: #3277d8 !important;
		}

		/* Accordion */
		html[data-bs-theme="dark"] .accordion-button:focus {
			border-color: #3277d8 !important;
			box-shadow: 0 0 0 0.25rem rgba(50, 119, 216, 0.25) !important;
		}

		/* Alert primary */
		html[data-bs-theme="dark"] .alert-primary {
			background-color: rgba(50, 119, 216, 0.2) !important;
			border-color: #3277d8 !important;
			color: #93c5fd !important;
		}

		/* List group active */
		html[data-bs-theme="dark"] .list-group-item.active {
			background-color: #3277d8 !important;
			border-color: #3277d8 !important;
		}

		/* Table primary */
		html[data-bs-theme="dark"] .table-primary {
			--bs-table-bg: rgba(50, 119, 216, 0.2) !important;
			--bs-table-border-color: #3277d8 !important;
		}

		/* Border primary utility */
		html[data-bs-theme="dark"] .border-primary {
			border-color: #3277d8 !important;
		}

		/* Progress bar */
		html[data-bs-theme="dark"] .progress {
			--bs-progress-bar-bg: #3277d8 !important;
		}

		/* List group active */
		html[data-bs-theme="dark"] .list-group {
			--bs-list-group-active-bg: #3277d8 !important;
			--bs-list-group-active-border-color: #3277d8 !important;
		}

		/* Nav tabs */
		html[data-bs-theme="dark"] .nav-tabs {
			--bs-nav-tabs-link-hover-border-color: #3277d8 !important;
			--bs-nav-tabs-link-active-border-color: #3277d8 !important;
		}
		html[data-bs-theme="dark"] .nav-tabs .nav-link.active {
			color: #3277d8 !important;
			border-color: #3277d8 !important;
		}
		html[data-bs-theme="dark"] .nav-tabs .nav-link:hover {
			border-color: #3277d8 !important;
		}

		/* Link hover color override */
		html[data-bs-theme="dark"] {
			--bs-link-hover-color-rgb: 191, 219, 254 !important;
		}

		/* Additional primary color utilities */
		html[data-bs-theme="dark"] .link-hover-primary:hover {
			color: #93c5fd !important;
		}
		html[data-bs-theme="dark"] [class*="border-primary"] {
			border-color: #3277d8 !important;
		}
		html[data-bs-theme="dark"] [class*="bg-primary"] {
			background-color: #3277d8 !important;
		}

		/* Product cards: stabilize image size across catalog */
		.product-card-media {
			width: 100%;
			aspect-ratio: 3 / 4;
			background: #fff;
			overflow: hidden;
		}

		.product-card-img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			object-position: center;
			display: block;
		}

		@supports not (aspect-ratio: 1 / 1) {
			.product-card-media {
				position: relative;
				padding-top: 133.3333%;
			}

			.product-card-img {
				position: absolute;
				inset: 0;
			}
		}

		/* Home: Why Choose Us */
		.choose-us-grid {
			border: 1px solid rgba(0, 0, 0, 0.06);
		}

		html[data-bs-theme="dark"] .choose-us-grid {
			border-color: rgba(255, 255, 255, 0.10);
		}

		.choose-us-item {
			border-right: 1px solid rgba(0, 0, 0, 0.06);
			border-bottom: 1px solid rgba(0, 0, 0, 0.06);
		}

		html[data-bs-theme="dark"] .choose-us-item {
			border-right-color: rgba(255, 255, 255, 0.10);
			border-bottom-color: rgba(255, 255, 255, 0.10);
		}

		.choose-us-item:nth-child(4n) {
			border-right: 0;
		}

		@media (max-width: 991.98px) {
			.choose-us-item:nth-child(2n) {
				border-right: 0;
			}
		}

		@media (max-width: 575.98px) {
			.choose-us-item {
				border-right: 0;
			}
		}

		.choose-us-icon-ring {
			width: 64px;
			height: 64px;
			border-radius: 999px;
			border: 2px solid rgba(3, 34, 99, 0.28);
			background: rgba(3, 34, 99, 0.06);
			font-size: 1.6rem;
		}

		html[data-bs-theme="dark"] .choose-us-icon-ring {
			border-color: rgba(126, 163, 255, 0.40);
			background: rgba(3, 34, 99, 0.20);
		}

		/* Home: Partners section */
		.partners-section {
			min-height: 320px;
		}

		.partners-bg {
			background-size: cover;
			background-position: center;
			filter: grayscale(10%);
			transform: scale(1.02);
		}

		.partners-overlay {
			background: rgba(0, 0, 0, 0.55);
		}

		html[data-bs-theme="dark"] .partners-overlay {
			background: rgba(0, 0, 0, 0.45);
		}

		.partners-copy {
			max-width: 920px;
		}

		/* Perfect circles (not stretched pills) — do not put w-100 on .partners-logo-link */
		.partners-logo-link {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			flex: 0 0 auto;
			box-sizing: border-box;
			width: 5.5rem;
			height: 5.5rem;
			min-width: 5.5rem;
			min-height: 5.5rem;
			max-width: 5.5rem;
			max-height: 5.5rem;
			aspect-ratio: 1;
			padding: 0.65rem;
			border-radius: 50%;
			background: rgba(255, 255, 255, 0.12);
			border: 1px solid rgba(255, 255, 255, 0.22);
			box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.06);
			backdrop-filter: blur(6px);
			transition: transform 160ms ease, background 160ms ease, border-color 160ms ease, box-shadow 160ms ease;
			text-decoration: none;
		}

		.partners-logo-link:hover {
			transform: translateY(-3px);
			background: rgba(255, 255, 255, 0.18);
			border-color: rgba(255, 255, 255, 0.35);
			box-shadow: 0 0.35rem 1rem rgba(0, 0, 0, 0.15);
		}

		.partners-logo {
			width: auto;
			height: auto;
			max-width: 100%;
			max-height: 100%;
			object-fit: contain;
			filter: brightness(0) invert(1);
			opacity: 0.95;
		}

		/* Slick / theme sometimes forces slide images wide; keep logos inside the circle */
		.partners-section .partners-logo-link img.partners-logo {
			width: auto !important;
			flex: 0 1 auto;
		}

		@media (min-width: 992px) {
			.partners-logo-link {
				width: 6.25rem;
				height: 6.25rem;
				min-width: 6.25rem;
				min-height: 6.25rem;
				max-width: 6.25rem;
				max-height: 6.25rem;
				padding: 0.75rem;
			}
		}

		/* Header: logo + icons on row 1; full-width search on row 2 (< xl) to avoid mobile overlap */
		#header .header-bar-grid {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			column-gap: 0.75rem;
			row-gap: 0.65rem;
			width: 100%;
		}

		#header .header-bar-brand {
			flex: 1 1 auto;
			min-width: 0;
			margin-bottom: 0;
		}

		#header .header-bar-logo {
			max-height: 64px;
			width: auto;
			height: auto;
			display: block;
		}

		@media (min-width: 576px) {
			#header .header-bar-logo {
				max-height: 76px;
			}
		}

		@media (min-width: 1200px) {
			#header .header-bar-logo {
				max-height: clamp(88px, 7vw, 104px);
			}
		}

		#header .header-bar-icons {
			flex: 0 0 auto;
			margin-left: auto;
			display: flex;
			align-items: center;
			gap: 0.45rem;
		}

		@media (min-width: 1200px) {
			#header .header-bar-icons {
				gap: 1rem;
			}
		}

		#header .header-bar-search {
			flex: 1 1 100%;
			min-width: 0;
			margin-left: 0;
			gap: 0.65rem !important;
		}

		@media (min-width: 1200px) {
			#header .header-bar-grid {
				flex-wrap: nowrap;
			}

			#header .header-bar-brand {
				flex: 0 0 auto;
			}

			#header .header-bar-search {
				flex: 0 1 auto;
				width: auto;
				max-width: min(20rem, 28vw);
				margin-left: 0.75rem;
			}
		}

		/* Ensure desktop nav never shows as inline buttons on small screens (.btn vs .d-none) */
		@media (max-width: 1199.98px) {
			#header .header-nav-link {
				display: none !important;
			}
		}

		@media (min-width: 1200px) {
			#header a.header-nav-link.d-xl-inline-flex {
				display: inline-flex !important;
			}
		}

		/* Header search: light-on-hero for home + dark theme; inner light pages overridden above */
		html:not([data-bs-theme="dark"]) body.site-page-home #header .header-search-input,
		html[data-bs-theme="dark"] #header .header-search-input {
			max-width: min(18rem, 42vw);
			min-width: 7rem;
			background: rgba(255, 255, 255, 0.12);
			border: 0;
			color: #fff;
			box-shadow: none !important;
		}

		html:not([data-bs-theme="dark"]) body.site-page-home #header .header-search-input::placeholder,
		html[data-bs-theme="dark"] #header .header-search-input::placeholder {
			color: rgba(255, 255, 255, 0.65);
		}

		#header .header-search-input {
			max-width: min(18rem, 42vw);
			min-width: 7rem;
			box-shadow: none !important;
		}

		@media (max-width: 1199.98px) {
			html:not([data-bs-theme="dark"]) body.site-page-home #header .header-search-input,
			html[data-bs-theme="dark"] #header .header-search-input,
			#header .header-search-input {
				max-width: none !important;
				flex: 1 1 auto;
				min-width: 0;
			}
		}

		#header .header-search-input:focus {
			box-shadow: none !important;
			outline: none !important;
		}

		/* NOTE: theme.min.js adds `.sticky` to `.sticky-area-wrap` (inside header), not on <body>. */
		#header .sticky-area-wrap.sticky .header-search-input {
			background: var(--bs-body-bg);
			color: var(--bs-body-color);
			box-shadow: none !important;
		}

		#header .sticky-area-wrap.sticky .header-search-input::placeholder {
			color: var(--bs-secondary-color);
		}

		html:not([data-bs-theme="dark"]) body.site-page-home #header .header-search-btn,
		html[data-bs-theme="dark"] #header .header-search-btn {
			border: 0 !important;
			box-shadow: none !important;
			background: rgba(255, 255, 255, 0.10);
		}

		html:not([data-bs-theme="dark"]) body.site-page-home #header .header-search-btn:hover,
		html[data-bs-theme="dark"] #header .header-search-btn:hover {
			background: rgba(255, 255, 255, 0.16);
		}

		#header .header-search-btn {
			border: 0 !important;
			box-shadow: none !important;
		}

		#header .sticky-area-wrap.sticky .header-search-btn {
			background: var(--bs-secondary-bg);
		}

		/* Header nav links (no border) */
		#header .header-nav-link {
			border: 0 !important;
			box-shadow: none !important;
			background: transparent !important;
			color: #fff !important;
			padding: 0.35rem 0.25rem;
			font-size: 1.05rem;
			text-decoration: none;
			line-height: 1.2;
			opacity: 0.95;
		}

		#header .header-nav-link:hover {
			opacity: 1;
			text-decoration: underline;
			text-underline-offset: 6px;
			text-decoration-thickness: 2px;
		}

		#header .header-nav-link--primary {
			font-weight: 600;
		}

		/*
		   Inner pages (light theme): header sits on white/light content — use dark nav/search.
		   Home (.site-page-home): keep white text over video hero. Dark theme unchanged below.
		*/
		html:not([data-bs-theme="dark"]) body.site-page-inner #header .header-nav-link {
			color: #212529 !important;
			opacity: 0.92;
		}

		html:not([data-bs-theme="dark"]) body.site-page-inner #header .header-nav-link:hover {
			color: #000 !important;
			opacity: 1;
		}

		html:not([data-bs-theme="dark"]) body.site-page-inner #header .header-ctrl-outline {
			--htc-color: #212529;
			--htc-border: rgba(0, 0, 0, 0.22);
		}

		html:not([data-bs-theme="dark"]) body.site-page-inner #header .header-ctrl-outline:hover {
			color: var(--htc-color);
			border-color: var(--htc-color);
			background: rgba(0, 0, 0, 0.06);
		}

		html:not([data-bs-theme="dark"]) body.site-page-inner #header .header-search-input {
			background: rgba(0, 0, 0, 0.055);
			border: 1px solid rgba(0, 0, 0, 0.1);
			color: #212529;
		}

		html:not([data-bs-theme="dark"]) body.site-page-inner #header .header-search-input::placeholder {
			color: rgba(0, 0, 0, 0.45);
		}

		html:not([data-bs-theme="dark"]) body.site-page-inner #header .header-search-btn {
			background: rgba(0, 0, 0, 0.08);
			color: #212529;
		}

		html:not([data-bs-theme="dark"]) body.site-page-inner #header .header-search-btn:hover {
			background: rgba(0, 0, 0, 0.12);
		}

		/* Sticky header variant (when scrolled) */
		html:not([data-bs-theme="dark"]) #header .sticky-area-wrap.sticky .header-nav-link {
			color: #000 !important;
		}

		html[data-bs-theme="dark"] #header .sticky-area-wrap.sticky .header-nav-link {
			color: #fff !important;
		}

		#header .header-ctrl-outline {
			--htc-color: #fff;
			--htc-border: rgba(255, 255, 255, 0.45);
			color: var(--htc-color);
			border-color: var(--htc-border);
		}

		#header .header-ctrl-outline:hover {
			color: var(--htc-color);
			border-color: var(--htc-color);
			background: rgba(255, 255, 255, 0.08);
		}

		#header .sticky-area-wrap.sticky .header-ctrl-outline {
			--htc-color: #000;
			--htc-border: rgba(0, 0, 0, 0.15);
		}

		html[data-bs-theme="dark"] #header .sticky-area-wrap.sticky .header-ctrl-outline {
			--htc-color: #fff;
			--htc-border: rgba(255, 255, 255, 0.35);
		}

		#header .sticky-area-wrap.sticky .header-ctrl-outline:hover {
			background: var(--bs-secondary-bg);
		}

		/*
		   Inner pages: offset lives on the FIRST block inside main, not on main itself.
		   That way the block’s own background (cream, gray bar, hero image) runs under the
		   transparent absolute header—same visual idea as the home video hero.
		   Home: first block contains .hero.vh-100 → rule does not apply.
		*/
		main#content.layout-page:not(:has(.hero.vh-100)) {
			padding-top: 0;
		}

		main#content.layout-page:not(:has(.hero.vh-100)) > :first-child {
			padding-top: 109px;
		}

		@media (min-width: 1200px) {
			main#content.layout-page:not(:has(.hero.vh-100)) > :first-child {
				padding-top: clamp(5.25rem, 9vw, 6.75rem);
			}
		}

		/* Extra horizontal margin on small screens (header + all .container / .row layouts) */
		@media (max-width: 767.98px) {
			.container,
			.container-fluid,
			.container-wide,
			.container-xxl,
			.container-xl,
			.container-lg,
			.container-md,
			.container-sm {
				--bs-gutter-x: clamp(3rem, 10vw, 4.25rem);
			}

			.row {
				--bs-gutter-x: clamp(3rem, 10vw, 4.25rem);
			}
		}

		/* Home: full-bleed sections use .px-9 — match the wider phone gutter */
		@media (max-width: 767.98px) {
			.px-9 {
				padding-left: max(1.75rem, calc(env(safe-area-inset-left, 0px) + 1.25rem)) !important;
				padding-right: max(1.75rem, calc(env(safe-area-inset-right, 0px) + 1.25rem)) !important;
			}
		}

		/* Science & aesthetics (home + about) */
		.science-aesthetics-section {
			--science-surface: #f9f8f4;
			--science-step-accent: var(--bs-primary);
			--science-step-num: #0a0a0a;
			background: var(--science-surface);
		}

		html[data-bs-theme="dark"] .science-aesthetics-section {
			--science-surface: var(--bs-body-bg);
			--science-step-accent: var(--bs-primary);
			--science-step-num: var(--bs-emphasis-color);
			background: var(--science-surface);
		}

		.science-aesthetics-section--rounded-bottom {
			border-radius: 0 0 clamp(1.25rem, 2.5vw, 2rem) clamp(1.25rem, 2.5vw, 2rem);
		}

		.science-aesthetics-section .science-heading {
			color: var(--bs-primary);
			font-weight: 700;
			font-size: clamp(1.75rem, 3.2vw, 2.65rem);
			line-height: 1.2;
			letter-spacing: -0.02em;
		}

		.science-aesthetics-section .science-lead {
			font-size: 1.0625rem;
			line-height: 1.7;
			max-width: 38rem;
		}

		.science-aesthetics-section .science-cta {
			border-radius: 999px;
			padding: 0.85rem 1.35rem 0.85rem 1.5rem;
			font-weight: 600;
			gap: 0.65rem;
			display: inline-flex;
			align-items: center;
		}

		.science-aesthetics-section .science-cta__icon {
			width: 2.25rem;
			height: 2.25rem;
			border-radius: 50%;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			background: rgba(255, 255, 255, 0.22);
			font-size: 1.1rem;
		}

		.science-visual {
			position: relative;
			min-height: 280px;
		}

		.science-visual__main {
			border-radius: clamp(1.25rem, 2.5vw, 2rem);
			overflow: hidden;
			box-shadow: 0 1.25rem 3rem rgba(0, 0, 0, 0.1);
		}

		html[data-bs-theme="dark"] .science-visual__main {
			box-shadow: 0 1rem 2.5rem rgba(0, 0, 0, 0.45);
		}

		.science-visual__main img {
			width: 100%;
			height: auto;
			display: block;
			vertical-align: middle;
		}

		.science-visual__overlay {
			position: absolute;
			width: min(48%, 280px);
			right: -0.5rem;
			top: -0.75rem;
			border-radius: clamp(1rem, 2vw, 1.5rem);
			overflow: hidden;
			box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
			z-index: 2;
			border: 3px solid var(--science-surface);
		}

		@media (max-width: 991.98px) {
			.science-visual__overlay {
				width: min(42%, 220px);
				right: 0.5rem;
				top: -0.5rem;
			}
		}

		.science-visual__overlay img {
			width: 100%;
			height: auto;
			display: block;
		}

		.science-feature__icon {
			max-width: 200px;
			margin-left: auto;
			margin-right: auto;
		}

		.science-feature__icon img {
			width: 100%;
			height: auto;
			display: block;
		}

		/*
		   Numbered marker — full thin circle (#9D2563), dot centred on stroke at 3 o’clock,
		   bold black numerals (matches feature-card reference).
		*/
		.science-step-badge {
			position: relative;
			width: min(100%, 196px);
			aspect-ratio: 1;
			margin-inline: auto;
			display: grid;
			place-items: center;
		}

		.science-step-badge__ring {
			position: absolute;
			inset: 0;
			border-radius: 50%;
			pointer-events: none;
			box-sizing: border-box;
			border: 2.5px solid var(--science-step-accent);
		}

		.science-step-badge__dot {
			position: absolute;
			top: 50%;
			width: 11px;
			height: 11px;
			margin-top: -5.5px;
			right: 0;
			border-radius: 50%;
			background: var(--science-step-accent);
			box-shadow: 0 0 0 2px var(--science-surface);
			/* Half outside so the dot sits on the ring stroke */
			transform: translateX(55%);
		}

		.science-step-badge__num {
			position: relative;
			z-index: 1;
			font-size: clamp(2.2rem, 6.8vw, 2.9rem);
			font-weight: 800;
			line-height: 1;
			letter-spacing: -0.05em;
			color: var(--science-step-num);
			font-variant-numeric: tabular-nums;
		}

		.science-feature__title {
			color: var(--bs-primary);
			font-weight: 700;
			font-size: 1.125rem;
			line-height: 1.35;
		}

		.science-feature__desc {
			font-size: 0.9375rem;
			line-height: 1.65;
			max-width: 26rem;
			margin-left: auto;
			margin-right: auto;
		}

		.science-more-toggle .science-less-label {
			display: none;
		}

		.science-more-toggle[aria-expanded="true"] .science-more-label {
			display: none;
		}

		.science-more-toggle[aria-expanded="true"] .science-less-label {
			display: inline;
		}

		.science-more-toggle[aria-expanded="true"] .science-more-chevron {
			transform: rotate(180deg);
		}

		.science-more-chevron {
			transition: transform 0.25s ease;
		}

		.hero .video-cover {
			overflow: hidden;
			width: 100%;
			height: 100%;
		}

		/* Edge-to-edge hero: scale video to cover (no letterboxing / black bars). */
		#hero-video {
			position: absolute;
			inset: 0;
			width: 100%;
			height: 100%;
			object-fit: cover;
			object-position: center center;
			pointer-events: none;
		}

		/* Home (and similar) banners: two <img> tags (light/dark). If data-bs-theme is missing briefly, both
		   can show and look like the section is duplicated. Keep them mutually exclusive on these cards. */
		html:not([data-bs-theme="dark"]) .banner-05 .dark-mode-img {
			display: none !important;
		}

		html[data-bs-theme="dark"] .banner-05 .light-mode-img {
			display: none !important;
		}
	</style>


@yield('css')

