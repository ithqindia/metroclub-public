@extends('frontend.layout.app')

@section('pageTitle', 'Search')
@section('breadcrumbTitle', 'Search university')

@section('main-content')
    <div class="card mb-a8 p-10">
        <h1>Search for your dream universities</h1>
        <div id='app'></div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('/dist/js/search-app.js') }}" type="text/javascript"></script>
@endsection
