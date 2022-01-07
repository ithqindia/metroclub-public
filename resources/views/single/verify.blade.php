@extends('single.layout.main')

@section('main-content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(/img/login-bg.png)">
            <div class="d-flex flex-center flex-column flex-column-fluid p-5 pb-lg-5">
                <a href="/" class="mb-5">
                    <img alt="Logo" src="/logos/logo.png" class="h-100px" />
                </a>
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                        id="kt_password_reset_form" action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Forgot Password ?</h1>
                            <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
                        </div>
                        <div class="fv-row mb-10 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
                            <input class="form-control form-control-solid" type="email" placeholder="" name="email"
                                autocomplete="off">
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">
                                <span class="indicator-label">{{ __('Reset Password') }}</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
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
@endsection
