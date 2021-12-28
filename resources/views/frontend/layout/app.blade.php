<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('pageTitle') - {{ env('APP_NAME') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="icon" type="image/png" href="/logos/favicon.png" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="preload" href="/dist/js/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/dist/css/style.bundle.css" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ mix('/dist/css/style.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ mix('/dist/css/custom.css') }}" rel="stylesheet" type="text/css" />
    @section('styles')
    @show
</head>

<body id="kt_body" style="background-image: url(/img/header-bg.jpg); background-repeat: no-repeat;"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">

    @section('frontend-menu')
        @include('frontend.includes.menu')
    @show

    <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <div class="page-title d-flex flex-column me-3">
                <h1 class="d-flex text-white fw-bolder my-1 fs-3">@yield('breadcrumbTitle')</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <li class="breadcrumb-item text-white opacity-75">
                        <a href="/" class="text-white text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-white opacity-75">@yield('breadcrumbTitle')</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        @section('main-content')
        @show
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                    fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
    </div>

    <script>
        var hostUrl = "/";
    </script>
    <script src="/dist/js/plugins/global/plugins.bundle.js"></script>
    <script src="/dist/js/scripts.bundle.js"></script>

    @section('scripts')
    @show
</body>

</html>
