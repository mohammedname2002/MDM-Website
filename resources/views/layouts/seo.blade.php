@php
    use Illuminate\Support\Str;

    $siteName = config('app.name', 'MDM');

    // Default, brand-level description used when a page does not set its own.
    $defaultDescription = 'MDM Derma supplies advanced dermatology and medical aesthetic products, devices, and skincare solutions for clinics and professionals. Explore our brands and catalog.';

    // Pull page-level overrides from Blade sections (registered by the child view).
    $metaTitleRaw = trim($__env->yieldContent('title', $siteName));
    $metaTitle = $metaTitleRaw !== '' ? $metaTitleRaw : $siteName;

    $metaDescriptionRaw = trim($__env->yieldContent('meta_description'));
    $metaDescription = $metaDescriptionRaw !== ''
        ? Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags($metaDescriptionRaw))), 160)
        : $defaultDescription;

    $metaKeywords = trim($__env->yieldContent('meta_keywords'));

    $ogTypeRaw = trim($__env->yieldContent('og_type'));
    $ogType = $ogTypeRaw !== '' ? $ogTypeRaw : 'website';

    $ogImageRaw = trim($__env->yieldContent('og_image'));
    $ogImage = $ogImageRaw !== '' ? $ogImageRaw : asset('assets/images/mdm.png');

    $robotsRaw = trim($__env->yieldContent('meta_robots'));
    $metaRobots = $robotsRaw !== '' ? $robotsRaw : 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';

    $canonical = url()->current();
    $appUrl = rtrim((string) config('app.url'), '/');
@endphp

<meta name="description" content="{{ $metaDescription }}">
@if ($metaKeywords !== '')
    <meta name="keywords" content="{{ $metaKeywords }}">
@endif
<meta name="robots" content="{{ $metaRobots }}">
<meta name="theme-color" content="#3277d8">
<meta name="author" content="{{ $siteName }}">
<link rel="canonical" href="{{ $canonical }}">

{{-- Open Graph --}}
<meta property="og:type" content="{{ $ogType }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $metaTitle }}">
<meta property="og:description" content="{{ $metaDescription }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:locale" content="en_US">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $metaTitle }}">
<meta name="twitter:description" content="{{ $metaDescription }}">
<meta name="twitter:image" content="{{ $ogImage }}">

{{-- Site-wide structured data: Organization + WebSite --}}
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Organization',
            '@id' => $appUrl . '/#organization',
            'name' => $siteName,
            'url' => $appUrl . '/',
            'logo' => asset('assets/images/mdm.png'),
            'description' => $defaultDescription,
        ],
        [
            '@type' => 'WebSite',
            '@id' => $appUrl . '/#website',
            'name' => $siteName,
            'url' => $appUrl . '/',
            'publisher' => ['@id' => $appUrl . '/#organization'],
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => [
                    '@type' => 'EntryPoint',
                    'urlTemplate' => route('products') . '?q={search_term_string}',
                ],
                'query-input' => 'required name=search_term_string',
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>

@yield('structured_data')
