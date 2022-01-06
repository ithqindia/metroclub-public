@extends ('student.layout.app')
@section('pageTitle', 'Post graduation form')
@section('breadcrumbTitle', 'Post graduation form')
@section('main-content')
    @include('student.student-info-panel')
    <div class="accordion container my-3" id="accordion_container">
        <form class="row g-3" method="post" action="/me/postGraduation">
            @csrf
            @if (isset($postGraduationInformation))
                {{ method_field('PUT') }}
                <x-post-graduation-form :postGraduationInformation="$postGraduationInformation" />
            @else
                <x-post-graduation-form />
            @endif
        </form>
    </div>
@endsection
