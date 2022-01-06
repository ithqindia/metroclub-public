@extends ('student.layout.app')
@section('pageTitle', 'Graduation form')
@section('breadcrumbTitle', 'Graduation form')
@section('main-content')
    @include('student.student-info-panel')
    <div class="accordion container my-3" id="accordion_container">
        <form class="row g-3" method="post" action="/me/graduation">
            @csrf
            @if (isset($graduationInformation))
                {{ method_field('PUT') }}
            <x-graduation-form :graduationInformation="$graduationInformation" />
            @else
                <x-graduation-form />
            @endif
        </form>
    </div>
@endsection
