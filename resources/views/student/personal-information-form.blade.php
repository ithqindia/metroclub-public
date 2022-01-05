@extends('student.layout.app')
@section('main-content')

    <div class="container">
        {{-- <h2 class="my-5">Personal Information form for {{ $user->name }}</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <div class="card mb-a8 p-10">
            <h1>Personal form</h1>
            <form method="post" action="/me/personal-info">

                @csrf
                @isset($personalInformation)
                    {{ method_field('PUT') }}
                @endisset

                <div class="row mb-4">
                    <div class="col-2">
                        <label for="salutation" class="form-label">Salutation<span style="color: red">*</span></label>
                        <select arial-lable="Default select example"
                            class="custom-select form-control @error('salutation') is-invalid @enderror" name="salutation"
                            id="salutation" value="{{ old('salutation', $personalInformation->salutation ?? '') }}">>
                            <option selected disabled>- Please select -</option>
                            @if (isset($personalInformation))
                                <option value="Mr" @if ($personalInformation->salutation == 'Mr') selected @endif>Mr</option>
                                <option value="Mrs" @if ($personalInformation->salutation == 'Mrs') selected @endif>Mrs</option>
                                <option value="Miss" @if ($personalInformation->salutation == 'Miss') selected @endif>Miss</option>
                                <option value="Master" @if ($personalInformation->salutation == 'Master') selected @endif>Master</option>
                            @else
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Master">Master</option>
                            @endif
                        </select>
                        @error('salutation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-5 inputGroupContainer">
                        <label for="first_name" class="form-label">First name<span style="color: red">*</span></label>
                        <input type="text" class="form-control  @error('first_name') is-invalid @enderror " name="first_name"
                            id="first_name" value="{{ old('first_name', $personalInformation->first_name ?? '') }}">
                        @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-5">
                        <label for="last_name" class="form-label">Last name<span style="color: red">*</span></label>
                        <input type="text" class="form-control  @error('last_name') is-invalid @enderror " name="last_name"
                            id="last_name" value="{{ old('last_name', $personalInformation->last_name ?? '') }}">
                        @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <label for="email" class="form-label">Email<span style="color: red">*</span> </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ old('email', $personalInformation->email ?? '') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-4">
                        <label for="mobile" class="form-label">Mobile<span style="color: red">*</span> </label>
                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                            id="mobile" value="{{ old('mobile', $personalInformation->mobile ?? '') }}">
                        @error('mobile')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone"
                            id="phone" value="{{ old('phone', $personalInformation->phone ?? '') }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="whatsapp_id" class="form-label">Whatsapp number<span style="color: red">*</span>
                        </label>
                        <input type="text" class="form-control  @error('whatsapp_number') is-invalid @enderror"
                            name="whatsapp_number" id="whatsapp_number"
                            value="{{ old('whatsapp_number', $personalInformation->whatsapp_number ?? '') }}">
                        @error('whatsapp_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-4">
                        <label for="skype" class="form-label">Skype</label>
                        <input type="text" class="form-control  @error('skype') is-invalid @enderror" name="skype"
                            id="skype" value="{{ old('skype', $personalInformation->skype ?? '') }}">
                        @error('skype')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="zoom" class="form-label">Zoom</label>
                        <input type="text" class="form-control  @error('zoom') is-invalid @enderror" name="zoom" id="zoom"
                            value="{{ old('zoom', $personalInformation->zoom ?? '') }}">
                        @error('zoom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="other" class="form-label">Other</label>
                        <input type="text" class="form-control  @error('other') is-invalid @enderror" name="other"
                            id="other" value="{{ old('other', $personalInformation->other ?? '') }}">
                        @error('other')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <label for="birth" class="form-label">Date of birth<span style="color: red">*</span> </label>
                        <input type="text" class="form-control form-control-solid @error('birth_date') is-invalid @enderror"
                            name="birth_date" id="birth_date"
                            value="{{ old('birth_date', $personalInformation->birth_date ?? '') }}">
                        @error('birth_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <small id="emailHelp" class="form-text text-muted">We'll never share your date of birth with anyone
                            else.
                        </small>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-6">
                        <label for="passport_number" class="form-label">Passport number<span style="color: red">*</span>
                        </label>
                        <input type="text" class="form-control @error('passport_number') is-invalid @enderror"
                            name="passport_number" id="passport_number"
                            value="{{ old('passport_number', $personalInformation->passport_number ?? '') }}">
                        @error('passport_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <small id="emailHelp" class="form-text text-muted">We'll never share your passport Number with
                            anyone
                            else.
                        </small>
                    </div>

                    <div class="col-6">
                        <label for="Nationality" class="form-label">Nationality<span style="color: red">*</span>
                        </label>
                        <input type="text" class="form-control @error('nationality') is-invalid @enderror"
                            name="nationality" id="nationality"
                            value="{{ old('nationality', $personalInformation->nationality ?? '') }}">
                        @error('nationality')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <label for="gender" name="gender" class="form-label @error('gender') is-invalid @enderror"
                            id="gender" value="{{ old('gender', $personalInformation->gender ?? '') }}">Gender : <span
                                style="color: red">*</span> </label>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                        </div>
                        <div class="form-check md-2">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Other
                            </label>
                        </div>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <label for="other" class="form-label">Relationship status<span style="color: red">*</span>
                        </label>
                        <select class="custom-select form-control @error('relationship_status') is-invalid @enderror"
                            name="relationship_status" id="relationship_status"
                            value="{{ old('relationship_status', $personalInformation->relationship_status ?? '') }}">
                            <option selected disabled>- Please select -</option>
                            @if (isset($personalInformation))
                                <option value="Married" @if ($personalInformation->relationship_status == 'Married') selected @endif>Married</option>
                                <option value="single" @if ($personalInformation->relationship_status == 'single') selected @endif>single</option>
                                <option value="Divorce" @if ($personalInformation->relationship_status == 'Divorce') selected @endif>Divorce</option>
                                <option value="Seprated" @if ($personalInformation->relationship_status == 'Seprated') selected @endif>Seprated</option>
                                <option value="Widow" @if ($personalInformation->relationship_status == 'Widow') selected @endif>Widow</option>
                            @else
                                <option value="Married">Married</option>
                                <option value="single">Single</option>
                                <option value="Divorce">Divorce</option>
                                <option value="Seprated">Seprated</option>
                                <option value="Widow">Widow</option>
                            @endif
                        </select>
                        @error('relationship_status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $("#birth_date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    </script>
@endsection
