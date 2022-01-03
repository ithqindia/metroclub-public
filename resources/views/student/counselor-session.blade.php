@extends('frontend.layout.app')

@section('styles')
@endsection

@section('pageTitle', 'Somepage')
@section('breadcrumbTitle', 'Somepage someting')

@section('main-content')
    @include('student.student-info-panel')

    <div class="card mb-a8 p-10">
        <h1>cs</h1>
    </div>
@endsection

@section('scripts')
@endsection
