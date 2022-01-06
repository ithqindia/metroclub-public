@extends ('student.layout.app')
@section('pageTitle', 'Hsc form')
@section('breadcrumbTitle', 'Hsc form')
@section('main-content')
    @include('student.student-info-panel')
    <div class="accordion container my-3" id="accordion_container">
        <form class="row g-3" method="post" action="/me/hsc">
            @csrf
            @if (isset($hscInformation))
                {{ method_field('PUT') }}
                <input type='hidden' name='hsc_information_id' value='{{ $hscInformation->id }}'>
            <x-hsc-form :hscInformation="$hscInformation" />
            @else
                <x-hsc-form />
            @endif
        </form>
    </div>
@endsection
