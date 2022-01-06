@extends ('student.layout.app')
@section('pageTitle', 'Diploma form')
@section('breadcrumbTitle', 'Diploma form')
@section('main-content')
@include('student.student-info-panel')
    <div class="accordion container my-3" id="accordion_container">
        <form class="row g-3" method="post" action="/me/diploma">
            @csrf
            @if (isset($diplomaInformation))
                {{ method_field('PUT') }}
            <x-diploma-form :diplomaInformation="$diplomaInformation" />
            @else
                <x-diploma-form />
            @endif
        </form>
    </div>
@endsection
