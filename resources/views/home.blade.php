@extends('layouts.master')
@section('title')

MDM
@endsection
@section('css')
    <style>
        .clinical-innovation-section {
            --clinical-radius: clamp(1.5rem, 2vw, 2.5rem);
            background-color: #f4efe6;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cpath fill='%23666' fill-opacity='0.07' d='M40 4c8 12-16 20-4 32s28-8 32 4-24 20-12 32 28-4 28 4-12 16-20 24S48 76 40 68 12 84 4 76s8-28 20-36 4-28-8-32S4 40 4 28 12 4 40 4z'/%3E%3C/svg%3E");
            background-size: 80px 80px;
        }

        html[data-bs-theme="dark"] .clinical-innovation-section {
            background-color: var(--bs-body-bg);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cpath fill='%235b8cff' fill-opacity='0.05' d='M40 4c8 12-16 20-4 32s28-8 32 4-24 20-12 32 28-4 28 4-12 16-20 24S48 76 40 68 12 84 4 76s8-28 20-36 4-28-8-32S4 40 4 28 12 4 40 4z'/%3E%3C/svg%3E");
        }

        .clinical-innovation-section .clinical-heading {
            color: var(--bs-primary);
            font-weight: 700;
            line-height: 1.15;
            max-width: 20ch;
            font-size: clamp(2rem, 4.2vw, 3.35rem);
        }

        .clinical-card {
            border-radius: var(--clinical-radius);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            box-shadow: 0 1rem 2.5rem rgba(var(--bs-body-color-rgb), 0.08);
        }

        html[data-bs-theme="dark"] .clinical-card {
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.35);
        }

        .clinical-card__text {
            padding: clamp(1.75rem, 4vw, 2.75rem);
        }

        .clinical-card__text--inverse {
            background-color: var(--bs-primary);
            color: var(--bs-white);
        }

        .clinical-card__text--surface {
            background-color: var(--bs-white);
            color: var(--bs-gray-800);
        }

        html[data-bs-theme="dark"] .clinical-card__text--surface {
            background-color: var(--bs-secondary-bg);
            color: var(--bs-body-color);
        }

        .clinical-card__text--surface .clinical-card__title {
            color: var(--bs-primary);
        }

        .clinical-badge {
            display: inline-block;
            font-size: 0.8125rem;
            font-weight: 600;
            line-height: 1;
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            margin-bottom: 1.25rem;
        }

        .clinical-badge--on-dark {
            background: var(--bs-white);
            color: var(--bs-gray-800);
        }

        html[data-bs-theme="dark"] .clinical-badge--on-dark {
            color: var(--bs-dark);
        }

        .clinical-badge--on-light {
            background: rgba(var(--bs-primary-rgb), 0.12);
            color: var(--bs-primary);
        }

        .clinical-card__title {
            font-size: clamp(1.5rem, 2.4vw, 2rem);
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .clinical-card__body {
            font-size: 1rem;
            line-height: 1.65;
            margin-bottom: 0;
        }

        .clinical-card__text--inverse .clinical-card__body {
            opacity: 0.95;
        }

        .clinical-card__media {
            margin-top: auto;
        }

        .clinical-card__media img {
            width: 100%;
            height: auto;
            display: block;
            aspect-ratio: 3 / 2;
            object-fit: cover;
        }

    </style>
@endsection
@section('title_page')


@endsection
@section('title_page2')



@endsection
@section('content')

@php
    $section2Fallbacks = [
        1 => ['assets/images/banner/banner-29.jpg', 'assets/images/banner/banner-white-29.jpg'],
        2 => ['assets/images/banner/banner-30.jpg', 'assets/images/banner/banner-white-30.jpg'],
        3 => ['assets/images/banner/banner-31.jpg', 'assets/images/banner/banner-white-31.jpg'],
    ];
@endphp

<main id="content" class="wrapper layout-page">
    <section class="overflow-hidden">

        <div class="hero vh-100 position-relative d-flex align-items-end">
            <div class="video-cover">
                <video id="hero-video" title="Hero video" playsinline muted autoplay loop preload="metadata"
                    class="border-0">
                    <source src="{{ asset('assets/video/11.mp4') }} " type="video/mp4">
                </video>
                <div class="card-img-overlay"></div>
            </div>
            <div data-animate="fadeInDown" class="container container-wide pb-15 p-xl-15 position-relative">

                <div class="hero-content">
                    <div data-animate="fadeInDown">
                        <p class="text-white mb-8 fw-semibold fs-4">Find Inspration</p>
                        <h1 class="text-white fw-semibold mb-8 hero-title-2">Natural Mineral <br> Water Spray</h1>
                    </div>
             
                </div>
            </div>
        </div>
    </section>

    <section class="pt-10">

        <div class="container-fluid px-9">
            <div class="row gy-30px gx-30px px-2">
                @for ($i = 1; $i <= 3; $i++)
                    @php
                        $imgLight = $home->mediaUrl(
                            $home->{"section2_card_{$i}_image_light"},
                            $section2Fallbacks[$i][0],
                        );
                        $imgDark = $home->mediaUrl(
                            $home->{"section2_card_{$i}_image_dark"},
                            $section2Fallbacks[$i][1],
                        );
                        $cardTitle = $home->{"section2_card_{$i}_title"};
                        $cardLinkLabel = $home->{"section2_card_{$i}_link_label"};
                        $cardLinkUrl = filled($home->{"section2_card_{$i}_link_url"})
                            ? $home->{"section2_card_{$i}_link_url"}
                            : '#';
                        $cardAlt = \Illuminate\Support\Str::limit(strip_tags((string) $cardTitle), 120) ?: 'Banner';
                    @endphp
                    <div class="col-12 col-md-4" data-animate="fadeInUp">
                        <div class="card border-0 rounded-0 banner-05 hover-zoom-in hover-shine">
                            <img class="lazy-image card-img object-fit-cover light-mode-img" src="#"
                                data-src="{{ $imgLight }}" width="468" height="400" alt="{{ $cardAlt }}">
                            <img class="lazy-image dark-mode-img card-img object-fit-cover" src="#"
                                data-src="{{ $imgDark }}" width="468" height="400" alt="{{ $cardAlt }}">
                            <div
                                class="card-img-overlay d-inline-flex flex-column justify-content-end px-11 pt-11 pb-9 mb-2">
                                @if (filled($cardTitle))
                                    <h3 class="card-title fw-semibold pe-xxl-25">{!! $cardTitle !!}</h3>
                                @endif
                                @if (filled($cardLinkLabel))
                                    <div>
                                        <a href="{{ $cardLinkUrl }}"
                                            class="btn btn-link text-decoration-none p-0 fw-semibold">{{ $cardLinkLabel }}<svg
                                                class="icon">
                                                <use xlink:href="#icon-arrow-right"></use>
                                            </svg></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    @include('partials.science-aesthetics', ['home' => $home, 'sectionId' => 'science-aesthetics', 'extraClass' => ''])

    @php
        $clinicalImgFallback = 'assets/images/banner/banner-29.jpg';
        $clinicalCard1Remote =
            'https://dermalife.ae/wp-content/uploads/2025/09/view-from-rejuvenation-beautiful-woman-enjoying-cosmetology-procedures-beauty-salon-dermatology-hands-blue-glows-healthcare-therapy-botox-scaled.webp';
        $clinicalCard2Remote =
            'https://dermalife.ae/wp-content/uploads/2025/09/cosmetologist-doctor-patient-girl-look-mirror-face-skin-cosmetology-clinic-scaled.webp';

        $clinicalHeading = filled($home->clinical_heading ?? null)
            ? $home->clinical_heading
            : 'Clinical Innovation<br>for Professionals';

        $c1Badge = filled($home->clinical_card_1_badge ?? null) ? $home->clinical_card_1_badge : 'For Dermatologists';
        $c1Title = filled($home->clinical_card_1_title ?? null)
            ? $home->clinical_card_1_title
            : 'Advanced<br>Mesotherapy';
        $c1Body =
            filled($home->clinical_card_1_body ?? null) ? $home->clinical_card_1_body
            : 'Derma Life delivers advanced mesotherapy solutions addressing anti-aging, skin rejuvenation, pigmentation, and hair restoration. Each formula is sourced from leading international partners and developed through biotechnology and dermatological research, ensuring safe, predictable outcomes and consistent results for clinical practice in the UAE.';
        $c1Alt = filled($home->clinical_card_1_image_alt ?? null)
            ? $home->clinical_card_1_image_alt
            : 'Dermatology professional performing a facial treatment';
        $c1Src = filled($home->clinical_card_1_image ?? null)
            ? $home->mediaUrl($home->clinical_card_1_image, $clinicalImgFallback)
            : $clinicalCard1Remote;

        $c2Badge = filled($home->clinical_card_2_badge ?? null) ? $home->clinical_card_2_badge : 'For Clinics';
        $c2Title = filled($home->clinical_card_2_title ?? null)
            ? $home->clinical_card_2_title
            : 'Professional<br>Skincare Kits';
        $c2Body =
            filled($home->clinical_card_2_body ?? null) ? $home->clinical_card_2_body
            : 'Derma Life provides professional skincare kits that fully support doctors before and after treatment. Combining peptides, active ingredients, and hydration boosters, each kit enhances recovery, improves treatment outcomes, and ensures dermatologists and clinics achieve safe, predictable results with full confidence in daily practice.';
        $c2Alt = filled($home->clinical_card_2_image_alt ?? null)
            ? $home->clinical_card_2_image_alt
            : 'Cosmetologist with patient reviewing results in a mirror';
        $c2Src = filled($home->clinical_card_2_image ?? null)
            ? $home->mediaUrl($home->clinical_card_2_image, $clinicalImgFallback)
            : $clinicalCard2Remote;
    @endphp

    <section id="clinical-innovation" class="clinical-innovation-section py-14 py-lg-18 overflow-hidden"
        aria-labelledby="clinical-innovation-heading">
        <div class="container-fluid px-9">
            <div class="row align-items-start g-4 gx-lg-5">
                <div class="col-12 col-lg-4 col-xl-3" data-animate="fadeInUp">
                    <h2 id="clinical-innovation-heading" class="clinical-heading mb-0 pe-lg-4">{!! $clinicalHeading !!}</h2>
                </div>
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="row g-4 gx-lg-5 gy-5">
                        <div class="col-12 col-md-6" data-animate="fadeInUp">
                            <article class="clinical-card">
                                <div class="clinical-card__text clinical-card__text--inverse">
                                    <span class="clinical-badge clinical-badge--on-dark">{{ $c1Badge }}</span>
                                    <h3 class="clinical-card__title text-white">{!! $c1Title !!}</h3>
                                    <p class="clinical-card__body">{{ $c1Body }}</p>
                                </div>
                                <div class="clinical-card__media">
                                    <img src="{{ $c1Src }}" width="2560" height="1707" alt="{{ $c1Alt }}"
                                        loading="lazy" decoding="async"
                                        sizes="(max-width:767px) 100vw, (max-width:1200px) 50vw, 800px">
                                </div>
                            </article>
                        </div>
                        <div class="col-12 col-md-6" data-animate="fadeInUp">
                            <article class="clinical-card">
                                <div class="clinical-card__text clinical-card__text--surface">
                                    <span class="clinical-badge clinical-badge--on-light">{{ $c2Badge }}</span>
                                    <h3 class="clinical-card__title">{!! $c2Title !!}</h3>
                                    <p class="clinical-card__body text-body">{{ $c2Body }}</p>
                                </div>
                                <div class="clinical-card__media">
                                    <img src="{{ $c2Src }}" width="2560" height="1707" alt="{{ $c2Alt }}"
                                        loading="lazy" decoding="async"
                                        sizes="(max-width:767px) 100vw, (max-width:1200px) 50vw, 800px">
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="because_you_need_time_for_yourself_2">

        <div class="container pt-13 pt-lg-15 my-4 pb-15 pb-lg-20">
            <div class="mb-13 text-center pb-3" data-animate="fadeInUp">
                <img data-src="{{ asset('assets/images/shop/single-image-01.png') }}" width="140" height="138"
                    class="mb-5 img-fluid lazy-image d-inline-block" alt="..." src="#">
                <h2 class="h3 mb-0">Because You Need Time for Yourself.<br />Blend Beauty in You</h2>
            </div>
            <div class="row gy-50px justify-content-center">
                @forelse ($featuredProducts as $product)
                    @include('partials.product-grid-card', ['product' => $product])
                @empty
                    <div class="col-12 text-center py-10">
                        <p class="text-body-secondary mb-0">No featured products yet. In the admin panel, open a product
                            and enable Featured on home, then set order and images.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-12" data-animate="fadeInUp">
                <a href="{{ route('products') }}" class="btn btn-outline-dark">
                    Shop All Product
                </a>
            </div>
        </div>

    </section>

    @php
        $chooseHeading = (string) ($home->choose_us_heading ?? '');
        $chooseIntro = (string) ($home->choose_us_intro ?? '');
        $chooseItems = is_array($home->choose_us_items ?? null) ? $home->choose_us_items : [];
    @endphp

    @if (filled($chooseHeading) || filled($chooseIntro) || count($chooseItems))
        <section id="why-choose-us" class="pt-14 pb-16 py-lg-18">
            <div class="container">
                <div class="text-center mb-12" data-animate="fadeInUp">
                    @if (filled($chooseHeading))
                        <h2 class="mb-5">{{ $chooseHeading }}</h2>
                    @endif
                    @if (filled($chooseIntro))
                        <p class="mb-0 mw-xl-60 mw-lg-75 ms-auto me-auto text-body">{{ $chooseIntro }}</p>
                    @endif
                </div>

                <div class="row g-0 choose-us-grid rounded-4 overflow-hidden bg-body shadow-sm" data-animate="fadeInUp">
                    @foreach (array_slice($chooseItems, 0, 4) as $item)
                        @php
                            $icon = trim((string) ($item['icon'] ?? 'bi bi-star'));
                            $title = trim((string) ($item['title'] ?? ''));
                            $body = trim((string) ($item['body'] ?? ''));
                        @endphp
                        <div class="col-12 col-md-6 col-lg-3 choose-us-item p-8 p-lg-9">
                            <div class="choose-us-icon text-primary mb-6">
                                <span class="choose-us-icon-ring d-inline-flex align-items-center justify-content-center">
                                    <i class="{{ $icon }}" aria-hidden="true"></i>
                                </span>
                            </div>
                            @if ($title !== '')
                                <h3 class="fs-5 mb-4">{{ $title }}</h3>
                            @endif
                            @if ($body !== '')
                                <p class="mb-0 text-body">{{ $body }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-10" data-animate="fadeInUp">
                    <p class="mb-0 text-body-secondary">
                        With fast nationwide delivery and expert support, we ensure a seamless experience from order to application.
                    </p>
                </div>
            </div>
        </section>
    @endif

    @php
        $partnersHeading = (string) ($home->partners_heading ?? '');
        $partnersIntro = (string) ($home->partners_intro ?? '');
        $partnersLogos = is_array($home->partners_logos ?? null) ? $home->partners_logos : [];
        $partnersBg = $home->mediaUrl($home->partners_bg_image ?? null, 'assets/images/others/news-letter-background.jpg');
    @endphp

    @if (filled($partnersHeading) || filled($partnersIntro) || count($partnersLogos))
        <section id="partners" class="partners-section position-relative overflow-hidden mb-12 mb-lg-14">
            <div class="container position-relative z-index-2 py-14 py-lg-18">
                <div class="text-center mx-auto partners-copy" data-animate="fadeInUp">
                    @if (filled($partnersHeading))
                        <h2 class="text-white mb-5">{{ $partnersHeading }}</h2>
                    @endif
                    @if (filled($partnersIntro))
                        <p class="text-white-50 mb-0">{{ $partnersIntro }}</p>
                    @endif
                </div>

                @if (count($partnersLogos))
                    <div class="partners-logos mt-10 mt-lg-12" data-animate="fadeInUp">
                        <div class="slick-slider partners-slider"
                            data-slick-options='{&#34;arrows&#34;:false,&#34;dots&#34;:false,&#34;infinite&#34;:true,&#34;autoplay&#34;:true,&#34;autoplaySpeed&#34;:1800,&#34;speed&#34;:650,&#34;pauseOnHover&#34;:false,&#34;slidesToShow&#34;:3,&#34;slidesToScroll&#34;:1,&#34;responsive&#34;:[{&#34;breakpoint&#34;:1400,&#34;settings&#34;:{&#34;slidesToShow&#34;:3}},{&#34;breakpoint&#34;:1200,&#34;settings&#34;:{&#34;slidesToShow&#34;:3}},{&#34;breakpoint&#34;:992,&#34;settings&#34;:{&#34;slidesToShow&#34;:2}},{&#34;breakpoint&#34;:768,&#34;settings&#34;:{&#34;slidesToShow&#34;:2,&#34;dots&#34;:true}},{&#34;breakpoint&#34;:480,&#34;settings&#34;:{&#34;slidesToShow&#34;:1,&#34;dots&#34;:true}}]}'>
                            @foreach ($partnersLogos as $logo)
                                @php
                                    $logoUrl = $home->mediaUrl($logo['image'] ?? null, 'assets/images/logo.png');
                                    $alt = trim((string) ($logo['alt'] ?? 'Partner'));
                                    $url = trim((string) ($logo['url'] ?? ''));
                                @endphp
                                <div class="px-3 d-flex justify-content-center">
                                    @if ($url !== '')
                                        <a class="partners-logo-link" href="{{ $url }}"
                                            @if (str_starts_with($url, 'http')) target="_blank" rel="noopener noreferrer" @endif>
                                            <img class="partners-logo" src="{{ $logoUrl }}" alt="{{ $alt }}"
                                                loading="lazy" decoding="async">
                                        </a>
                                    @else
                                        <span class="partners-logo-link" aria-label="{{ $alt }}">
                                            <img class="partners-logo" src="{{ $logoUrl }}" alt="{{ $alt }}"
                                                loading="lazy" decoding="async">
                                        </span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div class="partners-bg position-absolute top-0 start-0 w-100 h-100 z-index-1"
                style="background-image: url('{{ $partnersBg }}');"></div>
            <div class="partners-overlay position-absolute top-0 start-0 w-100 h-100 z-index-1"></div>
        </section>
    @endif

    <section id="special_offer_save_on_sets_2" class="bg-section-2 ">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 px-0 bg-image bg-col-lg-half-screen-left lazy-bg"
                    data-bg-src="{{ $home->mediaUrl($home->section4_image, 'assets/images/Countdown/countdown-06.jpg') }}"
                    data-animate="fadeInUp">
                    <div class="py-25 my-xl-21 my-lg-8"></div>
                </div>
                <div class="col-lg-6 py-lg-10 py-16 ps-lg-10 ps-xl-18 order-2" data-animate="fadeInUp">
                    <div class="text-left">
                        <p class="fs-15px mb-6 ls-1 text-body-emphasis fw-semibold">
                            {{ $home->section4_kicker }}
                            @if (filled($home->section4_badge))
                                <span class="badge bg-primary fs-15px py-3 px-4 ms-4">{{ $home->section4_badge }}</span>
                            @endif
                        </p>
                        @if (filled($home->section4_title))
                            <h2 class="mb-6">{{ $home->section4_title }}</h2>
                        @endif
                        @if (filled($home->section4_description))
                            <p class="fs-18px w-md-70 w-lg-100 w-xl-75 mb-7 text-body">{{ $home->section4_description }}</p>
                        @endif
                    </div>

                    @if ($home->section4_countdown_ends_at)
                        <div class="d-flex countdown ms-n4 ms-md-n7" data-countdown="true"
                            data-countdown-end="{{ $home->section4_countdown_ends_at->format('M d, Y H:i:s') }}">
                            <div class="countdown-item text-center px-md-7 px-4 fs-1">
                                <span class="day fw-semibold text-primary font-primary"></span>
                            </div>

                            <div class="separate fw-semibold fs-1 text-primary">:</div>

                            <div class="countdown-item text-center px-md-7 px-4 fs-1">
                                <span class="hour fw-semibold text-primary font-primary"></span>
                            </div>

                            <div class="separate fw-semibold fs-1 text-primary">:</div>

                            <div class="countdown-item text-center px-md-7 px-4 fs-1">
                                <span class="minute fw-semibold text-primary font-primary"></span>
                            </div>

                            <div class="separate fw-semibold fs-1 text-primary">:</div>

                            <div class="countdown-item text-center px-md-7 px-4 fs-1">
                                <span class="second fw-semibold text-primary font-primary"></span>
                            </div>
                        </div>
                    @endif

                    @if (filled($home->section4_button_label))
                        <a href="{{ filled($home->section4_button_url) ? $home->section4_button_url : '#' }}"
                            class="mt-11 btn btn-dark btn-hover-text-light btn-hover-bg-primary btn-hover-border-primary shadow-sm">{{ $home->section4_button_label }}</a>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <section class="bg-section-5 overflow-hidden" id="specia_offer_beauty_inspired_by_real_life_2">

        <div class="container">
            <div class="row call-to-action-2">
                <div class="col-lg-6 bg-image py-25 py-lg-0 order-lg-1 bg-col-lg-half-screen-right lazy-bg"
                    data-bg-src="{{ $home->mediaUrl($home->section5_image, 'assets/images/banner/banner-02.jpg') }}"
                    data-animate="fadeInUp">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center w-lg-half-screen">
                        @if (filled($home->section5_video_url))
                            <a href="{{ $home->section5_video_url }}"
                                class="square view-video rounded-circle z-index-1 bg-body text-body-emphasis fs-2 bg-dark-hover text-light-hover"
                                style="--square-size:115px;"><svg class="icon">
                                    <use xlink:href="#icon-play-fill"></use>
                                </svg></a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 ps-6" data-animate="fadeInUp">
                    <div class="py-lg-23 py-16 mt-lg-3 mb-lg-5 ms-lg-auto text-white content-wrap">
                        <div class="text-left">
                            @if (filled($home->section5_kicker))
                                <p class="fs-15px mb-7 ls-1  fw-semibold text-uppercase">{{ $home->section5_kicker }}</p>
                            @endif
                            @if (filled($home->section5_title))
                                <h2 class="mb-6 mw-lg-60 pt-1 text-reset">{{ $home->section5_title }}</h2>
                            @endif
                            @if (filled($home->section5_description))
                                <p class="fs-18px mb-0 mw-lg-75">{{ $home->section5_description }}</p>
                            @endif
                        </div>

                        @if (filled($home->section5_button_label))
                            <a href="{{ filled($home->section5_button_url) ? $home->section5_button_url : '#' }}"
                                class="btn btn-white mt-10 mb-2">{{ $home->section5_button_label }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="from_our_blog_2" class="pt-14 pb-16 py-lg-18 mt-1">

        <div class="container">
            <div class="text-center" data-animate="fadeInUp">
                @if (filled($home->blog_section_heading))
                    <h2 class="mb-6">{{ $home->blog_section_heading }}</h2>
                @endif
                @if (filled($home->blog_section_intro))
                    <p class="fs-18px mb-0 mw-xl-50 mw-lg-75 ms-auto me-auto">{{ $home->blog_section_intro }}</p>
                @endif
            </div>

        </div>
        <div class="container mt-12 pt-3">
            @if ($blogs->isEmpty())
                <p class="text-center text-body-secondary mb-0">No blog posts yet. Add posts under Admin → Content →
                    Blog.</p>
            @else
                <div class="slick-slider"
                    data-slick-options='{&#34;arrows&#34;:false,&#34;dots&#34;:false,&#34;responsive&#34;:[{&#34;breakpoint&#34;:1200,&#34;settings&#34;:{&#34;slidesToShow&#34;:3}},{&#34;breakpoint&#34;:992,&#34;settings&#34;:{&#34;dots&#34;:true,&#34;slidesToShow&#34;:2}},{&#34;breakpoint&#34;:768,&#34;settings&#34;:{&#34;dots&#34;:true,&#34;slidesToShow&#34;:1}}],&#34;slidesToShow&#34;:3}'>
                    @foreach ($blogs as $post)
                        @php
                            $thumb =
                                $post->mainImageUrl() ??
                                asset('assets/images/blog/post-04-370x450.jpg');
                        @endphp
                        <div>
                            <article class="card card-post-grid-1 bg-transparent border-0" data-animate="fadeInUp">
                                <figure class="card-img-top position-relative mb-10">
                                    <a href="{{ route('blogs.show', $post) }}" class="hover-shine hover-zoom-in d-block"
                                        title="{{ $post->title }}">
                                        <img data-src="{{ $thumb }}" class="img-fluid lazy-image w-100"
                                            alt="{{ $post->title }}" width="370" height="450" src="#">
                                    </a>
                                    @if (filled($post->name))
                                        <span
                                            class="post-item-cate btn btn-light btn-text-light-body-emphasis btn-hover-bg-dark btn-hover-text-light fw-500 post-cat position-absolute top-100 start-50 translate-middle py-2 px-7 border-0">{{ $post->name }}</span>
                                    @endif
                                </figure>
                                <div class="card-body text-center px-md-9 py-0">
                                    <h4 class="card-title lh-base mb-9">
                                        <a class="text-decoration-none" href="{{ route('blogs.show', $post) }}"
                                            title="{{ $post->title }}">{{ $post->title }}</a>
                                    </h4>
                                    <ul class="post-meta list-inline lh-1 d-flex flex-wrap justify-content-center m-0">
                                        <li class="list-inline-item">{{ $post->created_at?->format('M j, Y') }}</li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section id="get-in-touch" class="pt-14 pb-16 py-lg-18 bg-section-2">
        <div class="container">
            <div class="row align-items-stretch gy-10">
                <div class="col-lg-5" data-animate="fadeInUp">
                    <div class="pe-lg-10">
                        <p class="text-primary fw-semibold mb-3 text-uppercase ls-1">Get In Touch</p>
                        <h2 class="mb-6">We’d love to hear from you</h2>
                        <p class="text-body mb-8">Send us a message and our team will reply as soon as possible.</p>

                        <div class="d-flex align-items-start mb-7">
                            <div class="me-5 text-primary">
                                <i class="bi bi-geo-alt fs-2" aria-hidden="true"></i>
                            </div>
                            <div>
                                <div class="fw-semibold text-body-emphasis mb-2">{{ $contact->address_heading ?? 'Address' }}</div>
                                @if (filled($contact->address_body ?? ''))
                                    <div class="text-body">{!! nl2br(e($contact->address_body)) !!}</div>
                                @else
                                    <div class="text-body">—</div>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-7">
                            <div class="me-5 text-primary">
                                <i class="bi bi-telephone fs-2" aria-hidden="true"></i>
                            </div>
                            <div>
                                <div class="fw-semibold text-body-emphasis mb-2">{{ $contact->contact_heading ?? 'Contact' }}</div>
                                @if (filled($contact->mobile ?? ''))
                                    <div class="text-body">{{ $contact->mobile_label ?? 'Mobile:' }} <span class="text-body-emphasis">{{ $contact->mobile }}</span></div>
                                @endif
                                @if (filled($contact->hotline ?? ''))
                                    <div class="text-body">{{ $contact->hotline_label ?? 'Hotline:' }} <span class="text-body-emphasis">{{ $contact->hotline }}</span></div>
                                @endif
                                @if (filled($contact->email ?? ''))
                                    <div class="text-body">{{ $contact->email_label ?? 'Email:' }}
                                        <a class="text-body-emphasis text-decoration-none" href="mailto:{{ e($contact->email) }}">{{ $contact->email }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if (filled($contact->directions_url ?? ''))
                            <a href="{{ $contact->directions_url }}"
                                class="btn btn-outline-primary rounded-pill px-6"
                                @if (str_starts_with((string) $contact->directions_url, 'http')) target="_blank" rel="noopener noreferrer" @endif>
                                {{ $contact->directions_label ?? 'Get Directions' }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-7" data-animate="fadeInUp">
                    <div class="bg-body rounded-4 shadow-sm p-8 p-lg-10 h-100">
                        <h3 class="mb-7">{{ $contact->form_heading ?? 'Send a message' }}</h3>

                        @if (session('contact_sent'))
                            <div class="alert alert-success mb-8" role="alert">
                                Thank you — your message was received.
                            </div>
                        @endif

                        <form class="contact-form" method="post" action="{{ route('contact.submit') }}">
                            @csrf
                            <input type="hidden" name="redirect_to" value="{{ url()->current() }}#get-in-touch">

                            <div class="row mb-7">
                                <div class="col-md-6 mb-6 mb-md-0">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control input-focus @error('name') is-invalid @enderror"
                                        placeholder="{{ $contact->placeholder_name ?? 'Your name' }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control input-focus @error('email') is-invalid @enderror"
                                        placeholder="{{ $contact->placeholder_email ?? 'Your email' }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <textarea name="message"
                                class="form-control mb-6 input-focus @error('message') is-invalid @enderror"
                                placeholder="{{ $contact->placeholder_message ?? 'Your message' }}" rows="7"
                                required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback d-block mb-6">{{ $message }}</div>
                            @enderror

                            @if (filled($contact->checkbox_label ?? ''))
                                <div class="form-check mb-8">
                                    <input class="form-check-input rounded" type="checkbox" value="1" name="remember"
                                        id="homeContactRemember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="homeContactRemember">
                                        {{ $contact->checkbox_label }}
                                    </label>
                                </div>
                            @endif

                            <div class="d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary btn-hover-bg-primary btn-hover-border-primary rounded-pill px-10">
                                    {{ $contact->submit_label ?? 'Send Message' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative  lazy-bg bg-image pt-lg-17 pb-lg-17 pt-15 pb-15">

        <div class="container text-center position-relative z-index-2">
            <div class="mx-auto mb-11 text-center" style="max-width:509px" data-animate="fadeInUp">
                <h3 class="mb-6">Stay Up to Date with All News and Exclusive Offers</h3>
            </div>

            <form class="mx-auto up-to-date-form" style="max-width: 546px" data-animate="fadeInUp">
                <div class="text-center">
                    <div class=" input-group position-relative mb-11 form-border-transparent">
                        <input type="email" class="form-control bg-body rounded-left"
                            placeholder="Enter your email address">
                        <button type="submit"
                            class=" btn btn-dark btn-hover-bg-primary btn-hover-border-primary rounded ms-0">Subscribe</button>
                    </div>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input me-4 rounded" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-body fs-14px" for="flexCheckDefault">
                            I accept the <a href="#" class="text-decoration-none border-bottom">terms &
                                conditions</a> and <a href="#" class="text-decoration-none border-bottom">the data
                                protection</a>
                        </label>
                    </div>
                </div>

            </form>
        </div>

        <div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100   light-mode-img"
            data-bg-src="{{ asset('assets/images/others/news-letter-background.jpg') }} ">
        </div>
        <div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100"
            data-bg-src="{{ asset('assets/images/others/news-letter-background-white-02.jpg') }}">
        </div>
    </section>

</main>

@endsection
@section('scripts')



@endsection

