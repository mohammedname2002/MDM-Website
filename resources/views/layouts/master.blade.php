
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
    <head>
        <script>
            (function () {
                try {
                    var t = localStorage.getItem('mdm-theme');
                    document.documentElement.setAttribute('data-bs-theme',
                        t === 'dark' || t === 'light' ? t : 'light');
                } catch (e) {
                    document.documentElement.setAttribute('data-bs-theme', 'light');
                }
            })();
        </script>

        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="referrer" content="strict-origin-when-cross-origin">
        @if (file_exists(public_path('assets/images/mdm.png')))
            <link rel="icon" type="image/png" href="{{ asset('assets/images/mdm.png') }}" sizes="any">
            <link rel="apple-touch-icon" href="{{ asset('assets/images/mdm.png') }}">
        @elseif (file_exists(public_path('favicon.ico')))
            <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
        @endif

  @include('layouts.head')
</head>

<body @class([
	'site-page-home' => request()->is('/'),
	'site-page-inner' => ! request()->is('/'),
])>

@include('layouts.main-headerbar')



    @yield('content')


@include('layouts.footer')



@include('layouts.footer-scripts')

</body>
</html>

