@extends('frontend.layout.app')

@section('styles')
    <link rel="stylesheet" href="asdf.css">
@endsection

@section('toolbar')
    @include('frontend.includes.toolbar')
@endsection

@section('main-content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Title</h3>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-light">
                    Action
                </button>
            </div>
        </div>
        <div class="card-body">
            Lorem Ipsum is simply dummy text...
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>

@endsection

@section('scripts')
    <script></script>
@endsection
