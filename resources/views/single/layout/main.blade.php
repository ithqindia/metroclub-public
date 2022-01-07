<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
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

<body id="kt_body" class="bg-body">

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(/img/login-bg.png)">
            <div class="d-flex flex-center flex-column flex-column-fluid p-5 pb-lg-5">
                <a href="/" class="mb-5">
                    <img alt="Logo" src="/logos/logo.png" class="h-100px" />
                </a>

                @section('main-content')
                @show

                <div class="d-flex flex-center flex-column-auto p-10">
                    <div class="d-flex align-items-center fw-bold fs-6">
                        <a href="/" class="text-muted text-hover-primary px-2">Home</a>
                        <a href="/about" class="text-muted text-hover-primary px-2">About</a>
                        <a href="/contact-us" class="text-muted text-hover-primary px-2">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var hostUrl = "/";
    </script>
    <script src="/dist/js/plugins/global/plugins.bundle.js"></script>
    <script src="/dist/js/scripts.bundle.js"></script>
</body>

</html>
