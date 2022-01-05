@extends ('student.layout.app')
@section('main-content')
    <div class="accordion container my-3" id="accordion_container">
        <form class="row g-3" method="post" action="/me/hsc">
            @csrf
            @isset($hscInformation)
                {{ method_field('PUT') }}
                <input type='hidden' name='hsc_information_id' value='{{ $hscInformation->id }}'>
            @endisset
            <div class="card mb-a8 p-10">
                <h1>Hsc form</h1>
                <div class="row my-5">
                    <div class="col-md-6">
                        <label for="inputCollege" class="form-label">College<span
                                style="color:red; font-size:20px">*</span></label>
                        <input type="text" class="form-control @error('hsc_college') is-invalid @enderror"
                            id="input_college_hsc" name="hsc_college"
                            value="{{ old('hsc_college', $hscInformation->hsc_college ?? '') }}">
                        @error('hsc_college')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputUniversity" class="form-label">HSC Board<span
                                style="color:red; font-size:20px">*</span></label>
                        <input type="text" class="form-control @error('hsc_board') is-invalid @enderror"
                            id="input_university_hsc" name="hsc_board"
                            value="{{ old('hsc_board', $hscInformation->hsc_board ?? '') }}">
                        @error('hsc_board')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-3">
                        <label for="inputAggregates" class="form-label">Aggregates<span
                                style="color:red; font-size:20px">*</span></label>
                        <input type="text" class="form-control @error('hsc_percentage') is-invalid @enderror"
                            id="input_aggregates_hsc" name="hsc_percentage"
                            value="{{ old('hsc_percentage', $hscInformation->hsc_percentage ?? '') }}">
                        @error('hsc_percentage')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="inputOutof" class="form-label">Out of<span
                                style="color:red; font-size:20px">*</span></label>
                        <input type="text" class="form-control @error('out_of') is-invalid @enderror" id="input_out_of"
                            name="out_of" value="{{ old('out_of', $hscInformation->out_of ?? '') }}">
                        @error('out_of')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="inputMajor" class="form-label">Major<span
                                style="color:red; font-size:20px">*</span></label>
                        <input type="text" class="form-control @error('hsc_major') is-invalid @enderror"
                            id="input_major_hsc" name="hsc_major"
                            value="{{ old('hsc_major', $hscInformation->hsc_major ?? '') }}">
                        @error('hsc_major')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-12">
                        <label for="inputLangauge" class="form-label"> Language of instruction<span
                                style="color:red; font-size:20px">*</span></label>
                        <input type="text" class="form-control @error('hsc_langauge') is-invalid @enderror"
                            id="input_langauge_hsc" name="hsc_langauge"
                            value="{{ old('hsc_langauge', $hscInformation->hsc_langauge ?? '') }}">
                        @error('hsc_langauge')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-6">
                        <label for="inputYearfrom" class="form-label">Year from<span
                                style="color:red; font-size:20px">*</span></label>
                        <input type="text" class="form-control @error('hsc_year_form') is-invalid @enderror"
                            id="input_year_from_hsc" name="hsc_year_form"
                            value="{{ old('hsc_year_form', $hscInformation->hsc_year_form ?? '') }}">
                        @error('hsc_year_form')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="inputYearto" class="form-label">Year to<span
                                style="color:red; font-size:20px">*</span></label>
                        <input type="text" class="form-control @error('hsc_year_to') is-invalid @enderror"
                            id="input_year_to_hsc" name="hsc_year_to"
                            value="{{ old('hsc_year_to', $hscInformation->hsc_year_to ?? '') }}">
                        @error('hsc_year_to')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
@endsection
