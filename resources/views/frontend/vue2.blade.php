@extends('frontend.layout.app')

@section('styles')
@endsection

@section('pageTitle', 'vue2')
@section('breadcrumbTitle', 'vue2')

@section('main-content')
    <div class="card mb-a8 p-10">
        <h1>Vue 2 template page</h1>
        <div id="app"></div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('dist/js/vue2.js') }}"></script>
@endsection
