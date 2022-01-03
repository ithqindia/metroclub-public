@extends('student.layout.app')

@section('styles')
@endsection

@section('pageTitle', 'Dashboard')
@section('breadcrumbTitle', 'Dashboard')


@section('main-content')
    @include('student.student-info-panel')

    <div class="card mb-a8 p-10">
        <h1>Dashboard page</h1>
    </div>
@endsection

@section('scripts')
@endsection
