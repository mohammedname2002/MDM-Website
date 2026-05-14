@php
    /** @var \App\Models\HomePage $home */
    $sectionId = $sectionId ?? 'science-aesthetics';
    $extraClass = $extraClass ?? '';

    $scienceImgFallback = 'assets/images/banner/banner-29.jpg';
    $scienceHeading = filled($home->science_heading ?? null)
        ? $home->science_heading
        : 'Science That Defines Aesthetics';
    $scienceBody = filled($home->science_body ?? null)
        ? $home->science_body
        : \App\Support\HomePageScienceDefaults::body();
    $scienceBtnLabel = filled($home->science_button_label ?? null)
        ? $home->science_button_label
        : 'See How We Innovate';
    $scienceBtnUrl = filled($home->science_button_url ?? null)
        ? $home->science_button_url
        : route('contact');
    $scienceMainSrc = filled($home->science_image_main ?? null)
        ? $home->mediaUrl($home->science_image_main, $scienceImgFallback)
        : \App\Support\HomePageScienceDefaults::MAIN_IMAGE;
    $scienceMainAlt = filled($home->science_image_main_alt ?? null)
        ? $home->science_image_main_alt
        : 'Science and laboratory research';
    $scienceOverlaySrc = filled($home->science_image_overlay ?? null)
        ? $home->mediaUrl($home->science_image_overlay, $scienceImgFallback)
        : null;
    $scienceOverlayAlt = filled($home->science_image_overlay_alt ?? null)
        ? $home->science_image_overlay_alt
        : '';

    $scienceFeaturesRaw = $home->science_features ?? null;
    $scienceFeatures = [];
    if (is_array($scienceFeaturesRaw)) {
        foreach ($scienceFeaturesRaw as $row) {
            if (! is_array($row)) {
                continue;
            }
            $t = trim((string) ($row['title'] ?? ''));
            if ($t !== '') {
                $scienceFeatures[] = $row;
            }
        }
    }
    if (count($scienceFeatures) === 0) {
        $scienceFeatures = \App\Support\HomePageScienceDefaults::features();
    }

    $scienceFeaturesVisible = array_slice($scienceFeatures, 0, 3);
    $scienceFeaturesMore = array_slice($scienceFeatures, 3);
    $collapseId = $sectionId . '-more';
    $scienceVisibleCount = count($scienceFeaturesVisible);
@endphp

<section id="{{ $sectionId }}" class="science-aesthetics-section py-14 py-lg-18 overflow-hidden {{ $extraClass }}"
    aria-labelledby="{{ $sectionId }}-heading">
    <div class="container-fluid px-9">
        <div class="row align-items-center gy-10 gy-lg-12">
            <div class="col-lg-5 pe-lg-8" data-animate="fadeInUp">
                <h3 id="{{ $sectionId }}-heading" class="science-heading mb-6">{!! $scienceHeading !!}</h3>
                <p class="science-lead text-body mb-0">{{ $scienceBody }}</p>
                @if (filled($scienceBtnLabel))
                    <div class="mt-8">
                        <a href="{{ $scienceBtnUrl }}"
                            class="btn btn-primary science-cta text-white text-decoration-none shadow-sm">
                            <span>{{ $scienceBtnLabel }}</span>
                            <span class="science-cta__icon" aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                        </a>
                    </div>
                @endif
            </div>
            <div class="col-lg-7" data-animate="fadeInUp">
                <div class="science-visual ps-lg-6">
                    <div class="science-visual__main">
                        <img src="{{ $scienceMainSrc }}" alt="{{ e($scienceMainAlt) }}" width="2560" height="1975"
                            loading="lazy" decoding="async" sizes="(max-width:991px) 100vw, min(900px, 58vw)">
                    </div>
                    @if (filled($scienceOverlaySrc))
                        <div class="science-visual__overlay d-none d-md-block">
                            <img src="{{ $scienceOverlaySrc }}" alt="{{ e($scienceOverlayAlt) }}" width="1200"
                                height="1200" loading="lazy" decoding="async">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row g-5 g-lg-6 mt-10 mt-lg-12 pt-lg-2">
            @foreach ($scienceFeaturesVisible as $idx => $item)
                @php
                    $iconPath = trim((string) ($item['icon_image'] ?? ''));
                    $iconSrc = $iconPath !== '' ? $home->mediaUrl($iconPath, $scienceImgFallback) : '';
                    $stepLabel = str_pad((string) ((int) $idx + 1), 2, '0', STR_PAD_LEFT);
                    $fTitle = trim((string) ($item['title'] ?? ''));
                    $fBody = trim((string) ($item['body'] ?? ''));
                @endphp
                <div class="col-12 col-md-4" data-animate="fadeInUp">
                    <div class="science-feature text-center h-100">
                        <div class="science-feature__icon mb-5 mb-md-6">
                            @if ($iconSrc !== '')
                                <img src="{{ $iconSrc }}" alt="" width="400" height="375" loading="lazy"
                                    decoding="async">
                            @else
                                <div class="science-step-badge" aria-hidden="true">
                                    <span class="science-step-badge__ring"></span>
                                    <span class="science-step-badge__dot"></span>
                                    <span class="science-step-badge__num">{{ $stepLabel }}</span>
                                </div>
                            @endif
                        </div>
                        @if ($fTitle !== '')
                            <h4 class="science-feature__title mb-3">{{ $fTitle }}</h4>
                        @endif
                        @if ($fBody !== '')
                            <p class="science-feature__desc text-body mb-0">{{ $fBody }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        @if (count($scienceFeaturesMore) > 0)
            <div class="collapse" id="{{ $collapseId }}">
                <div class="row g-5 g-lg-6 mt-2 mt-lg-3">
                    @foreach ($scienceFeaturesMore as $idx => $item)
                        @php
                            $iconPath = trim((string) ($item['icon_image'] ?? ''));
                            $iconSrc = $iconPath !== '' ? $home->mediaUrl($iconPath, $scienceImgFallback) : '';
                            $stepLabel = str_pad((string) ($scienceVisibleCount + (int) $idx + 1), 2, '0',
                                STR_PAD_LEFT);
                            $fTitle = trim((string) ($item['title'] ?? ''));
                            $fBody = trim((string) ($item['body'] ?? ''));
                        @endphp
                        <div class="col-12 col-md-4">
                            <div class="science-feature text-center h-100">
                                <div class="science-feature__icon mb-5 mb-md-6">
                                    @if ($iconSrc !== '')
                                        <img src="{{ $iconSrc }}" alt="" width="400" height="375" loading="lazy"
                                            decoding="async">
                                    @else
                                        <div class="science-step-badge" aria-hidden="true">
                                            <span class="science-step-badge__ring"></span>
                                            <span class="science-step-badge__dot"></span>
                                            <span class="science-step-badge__num">{{ $stepLabel }}</span>
                                        </div>
                                    @endif
                                </div>
                                @if ($fTitle !== '')
                                    <h4 class="science-feature__title mb-3">{{ $fTitle }}</h4>
                                @endif
                                @if ($fBody !== '')
                                    <p class="science-feature__desc text-body mb-0">{{ $fBody }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center mt-10 mt-lg-11" data-animate="fadeInUp">
                <button type="button"
                    class="btn btn-link science-more-toggle text-primary text-decoration-none fw-semibold p-0 d-inline-flex align-items-center gap-2"
                    data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}" aria-expanded="false"
                    aria-controls="{{ $collapseId }}">
                    <span class="science-more-label text-uppercase ls-1 fs-14px">Show more</span>
                    <span class="science-less-label text-uppercase ls-1 fs-14px">Show less</span>
                    <i class="bi bi-arrow-down-circle fs-4 science-more-chevron" aria-hidden="true"></i>
                </button>
            </div>
        @endif
    </div>
</section>
