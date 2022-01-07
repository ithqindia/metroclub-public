@section('title', 'Confirm password')
@extends('single.layout.main')

@section('main-content')
    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
            id="kt_password_reset_form" action="{{ route('password.confirm') }}" method="post">
            @csrf
            <div class="text-center mb-10">
                <h1 class="text-dark mb-3">Please confirm your password before continuing.</h1>
            </div>
            <div class="fv-row mb-10 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                <label class="form-label fw-bolder text-gray-900 fs-6">Password</label>
                <input class="form-control form-control-solid" type="password" placeholder="" name="password"
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
                    <span class="indicator-label">{{ __('Confirm Password') }}</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </form>
    </div>
@endsection