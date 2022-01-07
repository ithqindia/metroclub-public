<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Register - {{ env('APP_NAME') }}</title>
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

    @section('main-content')
    @show

    <script>
        var hostUrl = "/";
    </script>
    <script src="/dist/js/plugins/global/plugins.bundle.js"></script>
    <script src="/dist/js/scripts.bundle.js"></script>
</body>

</html>
