@extends('frontend.layout.app')

@section('styles')
@endsection

@section('pageTitle', 'Somepage')
@section('breadcrumbTitle', 'Somepage someting')

@section('main-content')
    @include('student.student-info-panel')

    <div class="card mb-a8 p-10">
        @if (isset($user->basic_information))
            <div class=" card mb-5 mb-xl-10" id="kt_profile_details_view">
                <div class="card-header cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Personal Information</h3>
                    </div>
                </div>
                <div class="card-body p-9">
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Salutation</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->salutation }} </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">First name</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->first_name }} </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Last name</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->last_name }} </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Email</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->email }} </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Mobile</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->mobile }} </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Phone</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->phone }} </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Whatsapp number</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->whatsapp_number }}
                            </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Skype</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->skype }} </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Zoom</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->zoom }} </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Other</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->other }} </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Date of birth</label>
                        <div class="col-lg-8">
                            <span
                                class="fw-bolder fs-6 text-gray-800">{{ date('j F Y', strtotime($user->basic_information->birth_date)) }}
                            </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Passport number</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->passport_number }}
                            </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Nationality</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->nationality }}
                            </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Gender</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->gender }} </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Relationship status</label>
                        <div class="col-lg-8">
                            <span
                                class="fw-bolder fs-6 text-gray-800">{{ $user->basic_information->relationship_status }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h1>No information available</h1>
        @endif
        <div>
            <a href="/me/personal-information" class="btn btn-info  btn-sm mx-3">Update</a>
        </div>
    </div>

    {{-- local address --}}

    <div class="card mb-a8 p-10 my-5">
        @if (isset($user->local_address_data))
            <div class="card-header cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Local Information</h3>
                </div>
            </div>
            <div class=" card mb-5 mb-xl-10" id="kt_profile_details_view">
                <div class="card-body p-9">
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Address</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->local_address_data->local_address }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Apartment, Suite, etc</label>
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">{{ $user->local_address_data->local_apartment }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">City/Town</label>
                        <div class="col-lg-8">
                            <span class="fw-bold text-gray-800 fs-6">{{ $user->local_address_data->local_city }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Pincode
                        </label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->local_address_data->local_pincode }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">State</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->local_address_data->local_state }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Country</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->local_address_data->local_country }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Emergency contact name</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->local_address_data->local_emergency_contact_name }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Emergency contact number</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->local_address_data->local_emergency_contact_number }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Relationship to emergency contact</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->local_address_data->local_emergency_relationship }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h1>No information available</h1>
        @endif
        <div>
            <a href="/me/employee-address" class="btn btn-info  btn-sm mx-3">Update</a>
        </div>
    </div>

    {{-- Selfie --}}

    <div class="card mb-a8 p-10 my-5">
        @if (isset($user->selfie_information))
            <div class=" card mb-5 mb-xl-10" id="kt_profile_details_view">
                <div class="card-header cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Selfie User Information</h3>
                    </div>
                </div>
                <div class="card-body p-9">
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Selfie </label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $user->selfie_information->selfie }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h1>No information available</h1>
        @endif
        <div>
            <a href="#" class="btn btn-info  btn-sm mx-3">Update</a>
        </div>
    </div>

@endsection
@section('scripts')
@endsection
