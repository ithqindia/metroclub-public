@extends('student.layout.app')

@section('main-content')
    <section>
        <div class="card mb-a8 p-10">
            <h1>employee form</h1>
            <section class="my-5">
                <div class="container employe mb-5  mb-5">
                    <form class="row g-3" method="post" action="/me/employee">
                        @csrf
                        {{-- update code --}}
                        @isset($employee)
                            {{ method_field('PUT') }}
                        @endisset
                        {{-- name --}}
                        <div class="row mt-5  mb-5">
                            <div class="col-12">
                                <label for="employer_name" class="form-label">Employer name <span
                                        style=color:red>*</span></label>
                                <input type="text" class="form-control @error('employer_name') is-invalid @enderror"
                                    id="employer_name" name="employer_name"
                                    value="{{ old('employer_name', $employee->employer_name ?? '') }}">
                                @error('employer_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- address --}}
                        <div class="row mt-5  mb-5">
                            <div class="col-12">
                                <label for="employer_address" class="form-label">Employer address<span
                                        style=color:red>*</span></label>
                                <input type="text" class="form-control @error('employer_address') is-invalid @enderror"
                                    id="employer_address" name="employer_address"
                                    value="{{ old('employer_address', $employee->employer_address ?? '') }}">
                                @error('employer_address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- job title --}}
                        <div class="row mt-5  mb-5">
                            <div class="col-6">
                                <label for="job_title" class="form-label">Job title<span
                                        style=color:red>*</span></label>
                                <input type="text" class="form-control @error('job_title') is-invalid @enderror"
                                    id="job_title" name="job_title"
                                    value="{{ old('job_title', $employee->job_title ?? '') }}">
                                @error('job_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- status --}}
                            <div class="col-6">
                                <label for="employment_status" class="form-label">Employment status<span
                                        style=color:red>*</span></label>
                                <select aria-label="Default select example"
                                    class="form-select form-control @error('employment_status') is-invalid @enderror"
                                    name="employment_status" id="employment_status"
                                    value="{{ old('employment_status', $employee->employment_status ?? '') }}">
                                    <option selected disabled>- Please select -</option>
                                    @if (isset($employee))
                                        <option value="Working" @if ($employee->employment_status == 'Working') selected @endif>Working</option>
                                        <option value="Left" @if ($employee->employment_status == 'Left') selected @endif>Left</option>
                                    @else
                                        <option value="Working">Working</option>
                                        <option value="Left">Left</option>
                                    @endif
                                </select>
                                @error('employment_status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5  mb-5">
                            {{-- starting date --}}
                            <div class="col-6">
                                <label for="employment_start" class="form-label">Employment start date<span
                                        style=color:red>*</span></label>
                                <input type="text" class="form-control @error('employment_start') is-invalid @enderror"
                                    id="employment_start" name="employment_start"
                                    value="{{ old('employment_start', $employee->employment_start ?? '') }}">

                                @error('employment_start')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- end date --}}
                            <div class="col-6">
                                <label for="employment_end" class="form-label">Employment end date<span
                                        style=color:red>*</span></label>
                                <input type="text" class="form-control @error('employment_end') is-invalid @enderror"
                                    id="employment_end" name="employment_end"
                                    value="{{ old('employment_end', $employee->employment_end ?? '') }}">

                                @error('employment_end')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- submit --}}
                        <div class="col-12 mt-5 mb-5">
                            <button type="submit" class="btn btn-primary" id="permanent_submit"> Submit</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $("#employment_start").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
        $("#employment_end").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    </script>
@endsection
