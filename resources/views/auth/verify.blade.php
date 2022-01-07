@section('title', 'Verify Your Email Address')
@extends('single.layout.main')

@section('main-content')
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
                <h1 class="text-dark mb-3">Verify Your Email Address</h1>
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},

            </div>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline"></button>.
                    <button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">
                        <span class="indicator-label">{{ __('click here to request another') }}</span>
                    </button>
                </form>
            </div>
        </form>
    </div>
@endsection
