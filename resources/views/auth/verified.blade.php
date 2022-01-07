@section('title', 'Verfied email Address')
@extends('single.layout.main')

@section('main-content')
    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Welcome to {{ env('APP_NAME') }}</h1>
            <h2 class='pt-10'>Thanks for verifing your email.</h2>
        </div>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <a href="/me/dashboard" class="btn btn-lg btn-primary fw-bolder me-4">
                <span class="indicator-label">Goto your dashboard</span>
            </a>
        </div>
    </div>
@endsection
