<div class="row my-5">
    <div class="col-lg-6">
        <label for="inputCollege" class="form-label">School<span style="color:red; font-size:20px">*</span></label>
        <input type="text" class="form-control @error('ssc_school') is-invalid @enderror" id="input_college_ssc"
            name="ssc_school" value="{{ old('ssc_school', $sscInformation->ssc_school ?? '') }}">
        @error('ssc_school')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-lg-6">
        <label for="inputUniversity" class="form-label">State Board<span
                style="color:red; font-size:20px">*</span></label>
        <input type="text" class="form-control @error('ssc_board') is-invalid @enderror" id="input_university_ssc"
            name="ssc_board" value="{{ old('ssc_board', $sscInformation->ssc_board ?? '') }}">
        @error('ssc_board')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="row my-5">
    <div class="col-lg-6">
        <label for="inputAggregates" class="form-label">Percentage<span
                style="color:red; font-size:20px">*</span></label>
        <input type="text" class="form-control @error('ssc_percentage') is-invalid @enderror" id="input_aggregates_ssc"
            name="ssc_percentage" value="{{ old('ssc_percentage', $sscInformation->ssc_percentage ?? '') }}">
        @error('ssc_percentage')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-lg-6">
        <label for="inputMajor" class="form-label">Major<span style="color:red; font-size:20px">*</span></label>
        <input type="text" class="form-control @error('ssc_major') is-invalid @enderror" id="input_major_ssc"
            name="ssc_major" value="{{ old('ssc_major', $sscInformation->ssc_major ?? '') }}">
        @error('ssc_major')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="row my-5">
    <div class="col-lg-12">
        <label for="inputLangauge" class="form-label"> Language of instruction<span
                style="color:red; font-size:20px">*</span></label>
        <input type="text" class="form-control @error('ssc_langauge') is-invalid @enderror" id="input_langauge_ssc"
            name="ssc_langauge" value="{{ old('ssc_langauge', $sscInformation->ssc_langauge ?? '') }}">
        @error('ssc_langauge')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="row my-5">
    <div class="col-lg-6">
        <label for="inputYearfrom" class="form-label">Year from<span
                style="color:red; font-size:20px">*</span></label>
        <input type="text" class="form-control @error('school_year_form') is-invalid @enderror" id="input_year_from_ssc"
            name="school_year_form" value="{{ old('school_year_form', $sscInformation->school_year_form ?? '') }}">
        @error('school_year_form')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-lg-6">
        <label for="inputYearto" class="form-label">Year to<span style="color:red; font-size:20px">*</span></label>
        <input type="text" class="form-control @error('school_year_to') is-invalid @enderror" id="input_year_to_ssc"
            name="school_year_to" value="{{ old('school_year_to', $sscInformation->school_year_to ?? '') }}">
        @error('school_year_to')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
