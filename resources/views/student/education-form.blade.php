@extends('student.layout.app')
@section('pageTitle', 'Ssc form')
@section('breadcrumbTitle', 'Ssc form')
@section('main-content')
    <div class="accordion container my-3" id="accordion_container">
        <form class="row g-3" method="post" action="/me/ssc">
            @csrf
            @if (isset($sscInformation))
                {{ method_field('PUT') }}
                <x-ssc-form :sscInformation="$sscInformation" />
            @else
                <x-ssc-form />
            @endif
        </form>
    </div>

@endsection
