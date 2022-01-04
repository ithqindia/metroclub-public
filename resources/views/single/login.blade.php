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
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(/img/login-bg.png)">
            <div class="d-flex flex-center flex-column flex-column-fluid p-5 pb-lg-5">
                <a href="/" class="mb-5">
                    <img alt="Logo" src="/logos/logo.png" class="h-100px" />
                </a>
            </div>
            <div class="row g-10">
                <div class="col-md-1 d-sm-block"></div>
                <div class="col-md-5 col-sm-12">
                    <div class="bg-body rounded shadow-sm mx-10 p-10 p-lg-15">
                        <form class="form " novalidate="novalidate" id="kt_sign_up_form">
                            <div class="mb-10 text-center">
                                <h1 class="text-dark mb-3">Create an account</h1>
                            </div>
                            <div class="row fv-row mb-7">
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">First Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                        placeholder="" name="first-name" autocomplete="off" />
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">Last Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                        placeholder="" name="last-name" autocomplete="off" />
                                </div>
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                <input class="form-control form-control-lg form-control-solid" type="email"
                                    placeholder="" name="email" autocomplete="off" />
                            </div>
                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                <div class="mb-1">
                                    <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            placeholder="" name="password" autocomplete="off" />
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3"
                                        data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                </div>
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers
                                    &amp;
                                    symbols.</div>
                            </div>
                            <div class="fv-row mb-5">
                                <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    placeholder="" name="confirm-password" autocomplete="off" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-check form-check-custom form-check-solid form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                    <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
                                        <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Register</span> </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="mx-10">
                        <div class="bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                                id="kt_sign_in_form" action="#">
                                <div class="text-center mb-10">
                                    <h1 class="text-dark mb-3">Login to your account</h1>
                                </div>
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                        name="email" autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <div class="d-flex flex-stack mb-2">
                                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                        <a href="../../demo2/dist/authentication/flows/basic/password-reset.html"
                                            class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                                    </div>
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                        name="password" autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="kt_sign_in_submit"
                                        class="btn btn-lg btn-primary w-100 mb-5"> <span
                                            class="indicator-label">Login</span> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-center flex-column-auto p-10">
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="/" class="text-muted text-hover-primary px-2">Home</a>
                    <a href="/about" class="text-muted text-hover-primary px-2">About</a>
                    <a href="/contact-us" class="text-muted text-hover-primary px-2">Contact Us</a>
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
