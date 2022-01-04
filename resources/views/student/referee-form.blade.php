
j2

@extends('student.layout.app')

@section('main-content')
    {{-- referee information start --}}
    <section>
        <div class="col-12 mt-5 mb-5 text-center">
            <h2>Referee Information for {{ $user->name }}</h2>
        </div>
        <div class="container">
            <form class="row g-3 needs-validation" method="post" action="{{ $actionUrl }}">
                @csrf
                {{-- update code --}}
                @isset($referee)
                    {{ method_field('PUT') }}
                @endisset
                <div class="row mt-5  mb-5">
                    {{-- first name --}}
                    <div class="col-6">
                        <label for="first_name" class="form-label"> First name <span style=color:red>*</span>
                        </label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                            name="first_name" value="{{ old('first_name', $referee->first_name ?? '') }}">
                        @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- last name --}}
                    <div class="col-6">
                        <label for="last_name" class="form-label"> Last name <span style=color:red>*</span></label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                            name="last_name" value="{{ old('last_name', $referee->last_name ?? '') }}">

                        @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- email --}}
                <div class="row mt-5  mb-5">
                    <div class="col-6">
                        <label for="email" class="form-label">Email address<span style=color:red>*</span> </label>
                        <input type="email" class="form-control  @error('email_address') is-invalid @enderror" id="email"
                            name="email_address" value="{{ old('email_address', $referee->email_address ?? '') }}">
                        @error('email_address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- position --}}
                    <div class="col-6">
                        <label for="position" class="form-label">Position<span style=color:red>*</span> </label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror" name="position"
                            id="position" value="{{ old('position', $referee->position ?? '') }}">
                        @error('position')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- organisation --}}
                <div class="row mt-5  mb-5">
                    <div class="col-12">
                        <label for="organisation" class="form-label">Organisation <span style=color:red>*</span></label>
                        <input type="text" class="form-control @error('organisation') is-invalid @enderror"
                            id="organisation" name="organisation"
                            value="{{ old('organisation', $referee->organisation ?? '') }}">
                        @error('organisation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                {{-- submit --}}
                <div class="col-12 mt-5  mb-5">
                    <button type="submit" class="btn btn-primary" id="permanent_submit"> Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
