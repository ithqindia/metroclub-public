@extends('layouts.main')
@section('main-content')
    <div class="container">
        {{-- <h2>Selfie for {{ $user->name }}</h2> --}}
        <div class="my-2">
            <p> A "Selfie" picture that shows the front of your face in full frame. we'll use this to make sure you match
                the ID sent. In your photo please choose one of the following poses:</p>
        </div>
        <div class="row">
            <div class="col-4">
                <p> Hold your right or left hand next to your shoulder</p>
            </div>
            <div class="col-4">
                <p> Put your right and left hand behind your head</p>
            </div>
            <div class="col-4">
                <p>Put your right or left hand on your chest.</p>
            </div>
        </div>
        {{-- image --}}
        <div class="row">
            <div class="col-4">
                <img src="/assets/lefthandonsholder.jpeg" width="200" height="400" class="rounded float-right" alt="image1">
            </div>
            <div class="col-4">
                <img src="/assets/sholder.jpeg" width="200" height="400" class="rounded float-right" alt="image2">
            </div>
            <div class="col-4">
                <img src="/assets/lefthandonchest.jpeg" width="200" height="400" class="rounded float-right" alt="image3">
            </div>
        </div>
        <div class="card mb-a8 p-10">
            <h1>Personal form</h1>
        <form method="post" action="/me/selfie">
            @isset($selfieInformation)
                {{ method_field('PUT') }}
            @endisset
            @csrf
            <div class="form-group">
                <div class="col my-5">
                    <label for="selfie">Selfie</label>
                </div>
                <input type="file" aria-describedby="SelfieHelp" class="form-control @error('selfie') is-invalid @enderror"
                    name="selfie" value="{{ old('selfie', $selfieInformation->selfie ?? '') }}">
                @error('selfie')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small id="selfieHelp" class="form-text text-muted">PDF,JPG or PNG format and please do not exceed
                    5MB</small>
            </div>
            <button type="submit" class="btn btn-primary">Upload image</button>
        </form>
        </div>
    </div>
@endsection
