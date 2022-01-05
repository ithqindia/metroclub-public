@extends ('student.layout.app')
@section('main-content')
    <div class="accordion container my-3" id="accordion_container">
        <form class="row g-3" method="post" action="/me/diploma">
            @csrf
            @isset($diplomaInformation)
                {{ method_field('PUT') }}
            @endisset
            <div class="row my-5">
                <div class="col-md-6">
                    <label for="inputCollege" class="form-label">College<span
                            style="color:red; font-size:20px">*</span></label>
                    <input type="text" class="form-control @error('diploma_college') is-invalid @enderror"
                        id="input_college_diploma" name="diploma_college"
                        value="{{ old('diploma_college', $diplomaInformation->diploma_college ?? '') }}">
                    @error('diploma_college')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputUniversity" class="form-label">University<span
                            style="color:red; font-size:20px">*</span></label>
                    <input type="text" class="form-control @error('diploma_university') is-invalid @enderror"
                        id="input_university_diploma" name="diploma_university"
                        value="{{ old('diploma_university', $diplomaInformation->diploma_university ?? '') }}">
                    @error('diploma_university')
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
                    <input type="text" class="form-control @error('diploma_aggregates') is-invalid @enderror"
                        id="input_aggregates_diploma" name="diploma_aggregates"
                        value="{{ old('diploma_aggregates', $diplomaInformation->diploma_aggregates ?? '') }}">
                    @error('diploma_aggregates')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="inputOutof" class="form-label">Out of<span
                            style="color:red; font-size:20px">*</span></label>
                    <input type="text" class="form-control @error('out_of') is-invalid @enderror" id="input_out_of"
                        name="out_of" value="{{ old('out_of', $diplomaInformation->out_of ?? '') }}">
                    @error('out_of')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="inputMajor" class="form-label">Major<span
                            style="color:red; font-size:20px">*</span></label>
                    <input type="text" class="form-control @error('diploma_major') is-invalid @enderror"
                        id="input_major_diploma" name="diploma_major"
                        value="{{ old('diploma_major', $diplomaInformation->diploma_major ?? '') }}">
                    @error('diploma_major')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row my-5">
                <div class="col-12">
                    <label for="inputMajor" class="form-label">Major title<span
                            style="color:red; font-size:20px">*</span></label>
                    <input type="text" class="form-control @error('major_title') is-invalid @enderror"
                        id="input_major_title" name="major_title"
                        value="{{ old('major_title', $diplomaInformation->major_title ?? '') }}">
                    @error('major_title')
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
                    <input type="text" class="form-control @error('diploma_langauge') is-invalid @enderror"
                        id="input_langauge_diploma" name="diploma_langauge"
                        value="{{ old('diploma_langauge', $diplomaInformation->diploma_langauge ?? '') }}">
                    @error('diploma_langauge')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row my-5">
                <div class="col-4">
                    <label for="inputYearfrom" class="form-label">Year form<span
                            style="color:red; font-size:20px">*</span></label>
                    <input type="text" class="form-control @error('diploma_year_form') is-invalid @enderror"
                        id="input_year_from_diploma" name="diploma_year_form"
                        value="{{ old('diploma_year_form', $diplomaInformation->diploma_year_form ?? '') }}">
                    @error('diploma_year_form')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="inputYearto" class="form-label">Year to<span
                            style="color:red; font-size:20px">*</span></label>
                    <input type="text" class="form-control @error('diploma_year_to') is-invalid @enderror"
                        id="input_year_to_diploma" name="diploma_year_to" value="{{ old('diploma_year_to') }}"
                        value="{{ old('diploma_year_to', $diplomaInformation->diploma_year_to ?? '') }}">
                    @error('diploma_year_to')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputYearto" class="form-label">Status<span
                            style="color:red; font-size:20px">*</span></label>
                    <select class="form-select" aria-label="Default select example" name="completion_status">
                        <option selected disabled>- Please select -</option>
                        <option value="Completed">Completed</option>
                        <option value="Studying">Studying</option>
                        <option value="Incomplete">Incomplete</option>
                        <option value="Dropped">Dropped</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
