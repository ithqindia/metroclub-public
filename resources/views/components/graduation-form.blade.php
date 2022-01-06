<div class="card mb-a8 p-10">
    <h1>Graduation form</h1>
    <div class="row my-5">
        <div class="col-md-6">
            <label for="inputCollege" class="form-label">College<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('graduation_college') is-invalid @enderror"
                id="input_college_graduation" name="graduation_college"
                value="{{ old('graduation_college', $graduationInformation->graduation_college ?? '') }}">
            @error('graduation_college')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputUniversity" class="form-label">University<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('graduation_university') is-invalid @enderror"
                id="input_university_graduation" name="graduation_university"
                value="{{ old('graduation_university', $graduationInformation->graduation_university ?? '') }}">
            @error('graduation_university')
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
            <input type="text" class="form-control @error('graduation_aggregates') is-invalid @enderror"
                id="input_aggregates_graduation" name="graduation_aggregates"
                value="{{ old('graduation_aggregates', $graduationInformation->graduation_aggregates ?? '') }}">
            @error('graduation_aggregates')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-3">
            <label for="inputOutof" class="form-label">Out of<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('out_of') is-invalid @enderror" id="input_out_of"
                name="out_of" value="{{ old('out_of', $graduationInformation->out_of ?? '') }}">
            @error('out_of')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="inputMajor" class="form-label">Major<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('graduation_major') is-invalid @enderror"
                id="input_major_graduation" name="graduation_major"
                value="{{ old('graduation_major', $graduationInformation->graduation_major ?? '') }}">
            @error('graduation_major')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row my-5">
        <div class="col-12">
            <label for="inputMajor" class="form-label">Major<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('major_title') is-invalid @enderror"
                id="input_major_title" name="major_title"
                value="{{ old('major_title', $graduationInformation->major_title ?? '') }}">
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
            <input type="text" class="form-control @error('graduation_langauge') is-invalid @enderror"
                id="input_langauge_graduation" name="graduation_langauge"
                value="{{ old('graduation_langauge', $graduationInformation->graduation_langauge ?? '') }}">
            @error('graduation_langauge')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row my-5 d-flex">
        <div class="col-4">
            <label for="inputYearfrom" class="form-label">Year from<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('graduation_year_from') is-invalid @enderror"
                id="input_year_from_graduation" name="graduation_year_from"
                value="{{ old('graduation_year_from', $graduationInformation->graduation_year_from ?? '') }}">
            @error('graduation_year_from')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-4">
            <label for="inputYearto" class="form-label">Year to<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('graduation_year_to') is-invalid @enderror"
                id="input_year_to_graduation" name="graduation_year_to"
                value="{{ old('graduation_year_to', $graduationInformation->graduation_year_to ?? '') }}">
            @error('graduation_year_to')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputYearto" class="form-label">Status<span
                    style="color:red; font-size:20px">*</span></label>
            <select class="form-select" aria-label="Default select example" id="completion_status"
                name="completion_status">
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
</div>
