@extends('student.layout.app')
@section('main-content')
    <section>
        {{-- permananat address form --}}
        <div class="container Permanent_address mb-5">
            {{-- code for error --}}
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <div class="card mb-a8 p-10">
                <h1>Permanent address form</h1>
                <form class="row g-3" method="post" action="/address-data">
                    @csrf

                    {{-- update code --}}
                    {{-- @isset($user)
                    {{ method_field('PUT') }}
                    <input type='hidden' name='address_id' value='{{ $address->id }}'>
                    @endisset --}}
                    {{-- user id --}}

                    {{-- <div class="row mt-5 my-5">
                    <div class="col-12">
                    <label for="user_id" class="form-label">User</label>
                    <select name="user_id" class="form-control">
                    @if (isset($users))
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    @else
                        <option value='{{ $user->id }}'>{{ $user->name }}</option>
                    @endisset
                    </select>
                    </div>
                    </div> --}}

                    {{-- adddress --}}
                    <div class="row my-5">
                        <div class="col-lg-6 my-3">
                            <label for="address" class="form-label">Address<span style=color:red>*</span></label>
                            <input type="text" class="form-control @error('permanent_address') is-invalid @enderror"
                                id="permanent_address" name="permanent_address"
                                value="{{ old('permanent_address', $address->permanent_address ?? '') }}">
                            @error('permanent_address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- appartment --}}
                        <div class="col-lg-6 my-3">
                            <label for="apt" class="form-label">Apartment, Suite, etc<span
                                    style=color:red>*</span></label>
                            <input type="text" class="form-control  @error('permanent_apartment') is-invalid @enderror"
                                id="permanent_apartment" name="permanent_apartment"
                                value="{{ old('permanent_apartment', $address->permanent_apartment ?? '') }}">
                            @error('permanent_apartment')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- city --}}
                    <div class="row my-5">
                        <div class="col-lg-6 my-3">
                            <label for="city" class="form-label">City/Town<span style=color:red>*</span></label>
                            <input type="text" class="form-control  @error('permanent_city') is-invalid @enderror"
                                id="permanent_city" name="permanent_city"
                                value="{{ old('permanent_city', $address->permanent_city ?? '') }} ">
                            @error('permanent_city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- pincode --}}
                        <div class="col-lg-6 my-md-3">
                            <label for="pin" class="form-label">Pincode<span style=color:red>*</span></label>
                            <input type="text" class="form-control  @error('permanent_pincode') is-invalid @enderror"
                                id="permanent_pincode" name="permanent_pincode"
                                value="{{ old('permanent_pincode', $address->permanent_pincode ?? '') }} ">
                            @error('permanent_pincode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- state --}}
                    <div class="row my-5">
                        <div class="col-lg-6 my-3">
                            <label for="state" class="form-label">State<span style=color:red>*</span></label>
                            <input type="text" class="form-control  @error('permanent_state') is-invalid @enderror "
                                id="permanent_state" name="permanent_state"
                                value="{{ old('permanent_state', $address->permanent_state ?? '') }} ">
                            @error('permanent_state')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- country --}}
                        <div class="col-lg-6 my-3">
                            <label for="country" class="form-label">Country<span style=color:red>*</span></label>
                            <input type="text" class="form-control @error('permanent_country') is-invalid @enderror "
                                id="permanent_country" name="permanent_country"
                                value="{{ old('permanent_country', $address->permanent_country ?? '') }} ">
                            @error('permanent_country')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- emergency --}}
                    <div class="col-12 mt-3 mb-3 text-center">
                        <h2> Emergency Contact</h2>
                    </div>
                    {{-- emergency contact name --}}
                    <div class="row my-5">
                        <div class="col-lg-6 my-3">
                            <label for="emergency_contact_name" class="form-label">Full name<span
                                    style=color:red>*</span></label>
                            <input type="text"
                                class="form-control  @error('permanent_emergency_contact_name') is-invalid @enderror "
                                id="permanent_emergency_contact_name" name="permanent_emergency_contact_name"
                                value="{{ old('permanent_emergency_contact_name', $address->permanent_emergency_contact_name ?? '') }} ">
                            @error('permanent_emergency_contact_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- contact number --}}
                        <div class="col-lg-6 my-3">
                            <label for="emergency_contact_number" class="form-label">Number<span
                                    style=color:red>*</span></label>
                            <input type="text"
                                class="form-control  @error('permanent_emergency_contact_number') is-invalid @enderror "
                                id="permanent_emergency_contact_number" name="permanent_emergency_contact_number"
                                value="{{ old('permanent_emergency_contact_number', $address->permanent_emergency_contact_number ?? '') }} ">
                            @error('permanent_emergency_contact_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- relationship --}}
                    <div class="row my-5">
                        <div class="col-12">
                            <label for="relationship" class="form-label">Relationship<span
                                    style=color:red>*</span></label>
                            <select class="form-select   @error('permanent_emergency_relationship') is-invalid @enderror "
                                aria-label="Default select example"
                                value="{{ old('permanent_emergency_relationship', $address->permanent_emergency_relationship ?? '') }} "
                                name="permanent_emergency_relationship">
                                <option selected> - please select -</option>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Brother">Brother</option>
                                <option value="Sister">Sister</option>
                                <option value="Son">Son</option>
                                <option value="Doughter">Doughter</option>
                                <option value="Guardian">Guardian</option>
                                <option value="Designated Partner">Designated Partner</option>
                                <option value="Nominated Contact">Nominated Contact</option>
                                <option value="Other Relative">Other Relative</option>
                            </select>
                            @error('permanent_emergency_relationship')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" id="permanent_submit"> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- radio buttons  start --}}
    <section>
        <div class="col-12 mt-3 mb-3 text-center">
            <h2>Local address form for {{ $user->name }}</h2>
        </div>
        <div class="container my-5 local_address">
            <div class="form-check mt-3">
                <input class="form-check-input rbtn" type="radio" name="radio_button" id="same_address"
                    value="Same as above">
                <label class="form-check-label" for="flexRadioDefault2">
                    Same as above
                </label>
            </div>
            <div class="form-check mt-3">
                <input class="form-check-input rbtn" type="radio" name="radio_button" id="new_address"
                    value="Use new Address" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Use new address
                </label>
            </div>
        </div>
    </section>
    {{-- radio buttons end --}}

    {{-- local address form start --}}
    <section>
        <div class="card mb-a8 p-10">
            <h1>employee form</h1>
            <div class="container my-5 local_address">
                <form class="row g-3 mt-5" id="local_address" method="post" action="/me/employee-address">
                    @csrf
                    {{-- update code --}}
                    @isset($localAddress)
                        {{ method_field('PUT') }}
                    @endisset
                    <div class="row my-5">
                        {{-- adddress --}}
                        <div class="col-6">
                            <label for="address" class="form-label">Address<span style=color:red>*</span></label>
                            <input type="text" class="form-control @error('local_address') is-invalid @enderror"
                                id="local_address" name="local_address"
                                value="{{ old('local_address', $localAddress->local_address ?? '') }}">
                            @error('local_address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- appartment --}}
                        <div class="col-6">
                            <label for="apt" class="form-label">Apartment, Suite, etc<span
                                    style=color:red>*</span></label>
                            <input type="text" class="form-control  @error('local_apartment') is-invalid @enderror"
                                id="local_apartment" name="local_apartment"
                                value="{{ old('local_apartment', $localAddress->local_apartment ?? '') }}">
                            @error('local_apartment')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row my-5">
                        {{-- city --}}
                        <div class="col-6">
                            <label for="city" class="form-label">City/Town<span style=color:red>*</span></label>
                            <input type="text" class="form-control  @error('local_city') is-invalid @enderror"
                                id="local_city" name="local_city"
                                value="{{ old('local_city', $localAddress->local_city ?? '') }} ">
                            @error('local_city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- pincode --}}
                        <div class="col-6">
                            <label for="pin" class="form-label">Pincode<span style=color:red>*</span></label>
                            <input type="text" class="form-control  @error('local_pincode') is-invalid @enderror"
                                id="local_pincode" name="local_pincode"
                                value="{{ old('local_pincode', $localAddress->local_pincode ?? '') }} ">
                            @error('local_pincode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row my-5">
                        {{-- state --}}
                        <div class="col-6">
                            <label for="state" class="form-label">State<span style=color:red>*</span></label>
                            <input type="text" class="form-control  @error('local_state') is-invalid @enderror "
                                id="local_state" name="local_state"
                                value="{{ old('local_state', $localAddress->local_state ?? '') }} ">
                            @error('local_state')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- country --}}
                        <div class="col-6">
                            <label for="country" class="form-label">Country<span style=color:red>*</span></label>
                            <input type="text" class="form-control @error('local_country') is-invalid @enderror "
                                id="local_country" name="local_country"
                                value="{{ old('local_country', $localAddress->local_country ?? '') }} ">
                            @error('local_country')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- emergency --}}
                    <div class="col-12 mt-3 mb-3 text-center">
                        <h2> Emergency Contact</h2>
                    </div>
                    {{-- emergency contact name --}}
                    <div class="row my-5">
                        <div class="col-6">
                            <label for="emergency_contact_name" class="form-label">Full name<span
                                    style=color:red>*</span></label>
                            <input type="text"
                                class="form-control  @error('local_emergency_contact_name') is-invalid @enderror "
                                id="local_emergency_contact_name" name="local_emergency_contact_name"
                                value="{{ old('local_emergency_contact_name', $localAddress->local_emergency_contact_name ?? '') }} ">
                            @error('local_emergency_contact_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- contact number --}}
                        <div class="col-6">
                            <label for="emergency_contact_number" class="form-label">Number<span
                                    style=color:red>*</span></label>
                            <input type="text"
                                class="form-control  @error('local_emergency_contact_number') is-invalid @enderror "
                                id="local_emergency_contact_number" name="local_emergency_contact_number"
                                value="{{ old('local_emergency_contact_number', $localAddress->local_emergency_contact_number ?? '') }} ">
                            @error('local_emergency_contact_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- relationship --}}
                    <div class="row my-5">
                        <div class="col-12">
                            <label for="Relationship" class="form-label">Relationship<span
                                    style=color:red>*</span></label>
                            <select class="form-select @error('local_emergency_relationship') is-invalid @enderror "
                                aria-label="Default select example" id="local_emergency_relationship"
                                name="local_emergency_relationship"
                                value="{{ old('local_emergency_relationship', $localAddress->local_emergency_relationship ?? '') }} ">
                                <option selected disabled> - Please select -</option>
                                @if (isset($localAddress))
                                    <option value="Father" @if ($localAddress->local_emergency_relationship == 'Father') selected @endif>Father</option>
                                    <option value="Mother" @if ($localAddress->local_emergency_relationship == 'Mother') selected @endif>Mother</option>
                                    <option value="Brother" @if ($localAddress->local_emergency_relationship == 'Brother') selected @endif>Brother</option>
                                    <option value="Sister" @if ($localAddress->local_emergency_relationship == 'Sister') selected @endif>Sister</option>
                                    <option value="Son" @if ($localAddress->local_emergency_relationship == 'Son') selected @endif>Son</option>
                                    <option value="Doughter" @if ($localAddress->local_emergency_relationship == 'Doughter') selected @endif>Doughter</option>
                                    <option value="Guardian" @if ($localAddress->local_emergency_relationship == 'Guardian') selected @endif>Guardian</option>
                                    <option value="Designated Partner" @if ($localAddress->local_emergency_relationship == 'Designated Partner') selected @endif>Designated Partner</option>
                                    <option value="Nominated Contact" @if ($localAddress->local_emergency_relationship == 'Nominated Contact') selected @endif>Nominated Contact</option>
                                    <option value="Other Relative" @if ($localAddress->local_emergency_relationship == 'Other Relative') selected @endif>Other Relative</option>
                                @else
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Son">Son</option>
                                    <option value="Doughter">Doughter</option>
                                    <option value="Guardian">Guardian</option>
                                    <option value="Designated Partner">Designated Partner</option>
                                    <option value="Nominated Contact">Nominated Contact</option>
                                    <option value="Other Relative">Other Relative</option>
                                @endif
                            </select>
                            @error('local_emergency_relationship')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" id="local_submit"> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- script --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("[name='radio_button']").click(function(event) {
            if ($('#new_address').is(":checked")) {
                $('#local_address').show();
            } else {
                $('#local_address').hide();
            }
        });
    </script>
@endsection
