<div class="card mb-a8 p-10">
    <h1>Post graduation form</h1>
    <div class="row my-5">
        <div class="col-md-6">
            <label for="inputCollege" class="form-label">College<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('post_graduation_college') is-invalid @enderror"
                id="input_college_post_graduation" name="post_graduation_college"
                value="{{ old('post_graduation_college', $postGraduationInformation->post_graduation_college ?? '') }}">
            @error('post_graduation_college')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputUniversity" class="form-label">University<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('post_graduation_university') is-invalid @enderror"
                id="input_university_post_graduation" name="post_graduation_university"
                value="{{ old('post_graduation_university', $postGraduationInformation->post_graduation_university ?? '') }}">
            @error('post_graduation_university')
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
            <input type="text" class="form-control @error('post_graduation_aggregates') is-invalid @enderror"
                id="input_aggregates_post_graduation" name="post_graduation_aggregates"
                value="{{ old('post_graduation_aggregates', $postGraduationInformation->post_graduation_aggregates ?? '') }}">
            @error('post_graduation_aggregates')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-3">
            <label for="inputAggregates" class="form-label">Out of<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('out_of') is-invalid @enderror" id="input_out_of"
                name="out_of" value="{{ old('post_graduation_out_of', $postGraduationInformation->out_of ?? '') }}">
            @error('out_of')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="inputMajor" class="form-label">Major<span style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('post_graduation_major') is-invalid @enderror"
                id="input_major_post_graduation" name="post_graduation_major"
                value="{{ old('post_graduation_major', $postGraduationInformation->post_graduation_major ?? '') }}">
            @error('post_graduation_major')
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
            <input type="text" class="form-control @error('major_title') is-invalid @enderror" id="input_major_title"
                name="major_title" value="{{ old('major_title', $postGraduationInformation->major_title ?? '') }}">
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
            <input type="text" class="form-control @error('post_graduation_langauge') is-invalid @enderror"
                id="input_langauge_post_graduation" name="post_graduation_langauge"
                value="{{ old('post_graduation_langauge', $postGraduationInformation->post_graduation_langauge ?? '') }}">
            @error('post_graduation_langauge')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row my-5">
        <div class="col-4">
            <label for="inputYearfrom" class="form-label">Year from<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('post_graduation_year_from') is-invalid @enderror"
                id="input_year_from_post_graduation" name="post_graduation_year_from"
                value="{{ old('post_graduation_year_from', $postGraduationInformation->post_graduation_year_from ?? '') }}">
            @error('post_graduation_year_from')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-4">
            <label for="inputYearto" class="form-label">Year to<span
                    style="color:red; font-size:20px">*</span></label>
            <input type="text" class="form-control @error('post_graduation_year_to') is-invalid @enderror"
                id="input_year_to_post_graduation" name="post_graduation_year_to"
                value="{{ old('post_graduation_year_to', $postGraduationInformation->post_graduation_year_to ?? '') }}">
            @error('post_graduation_year_to')
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
</div>
