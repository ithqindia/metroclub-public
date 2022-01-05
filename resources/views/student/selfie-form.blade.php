@extends('student.layout.app')
@section('main-content')
    <div class="container">
        <div class="card mb-a8 p-10">
            <h1>Personal form</h1>
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
                <img src="\assets\lefthandonsholder.jpeg" width="200" height="400" class="rounded float-right" alt="image1">
            </div>
            <div class="col-4">
                <img src="\assets\sholder.jpeg" width="200" height="400" class="rounded float-right" alt="image2">
            </div>
            <div class="col-4">
                <img src="\assets\lefthandonchest.jpeg" width="200" height="400" class="rounded float-right" alt="image3">
            </div>
        </div>
        <form method="post" action="/me/selfie">
            @isset($selfieInformation)
                {{ method_field('PUT') }}
            @endisset
            @csrf
                <div class="row">
                    <div class="col-mb-12 mt-4">
                        <div class="image-input image-input-empty" data-kt-image-input="true"
                            style="background-image: url(https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png)">
                            <div class="image-input-wrapper w-125px h-125px"></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <input type="file" name="selfie" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="selfie_remove" />
                            </label>

                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>

                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Remove selfie">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Upload image</button>
        </form>
        </div>
    </div>
@endsection
