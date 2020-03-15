@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h3>Edit Profile</h3>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>
                    <input
                        id="title"
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        name="title"
                        value="{{ old('title') ?? $user->profile->title}}"
                        autocomplete="title"
                        autofocus
                    >

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="profile_description" class="col-md-4 col-form-label">Profile Description</label>
                    <input
                        id="profile_description"
                        type="text"
                        class="form-control @error('profile_description') is-invalid @enderror"
                        name="profile_description"
                        value="{{ old('profile_description') ?? $user->profile->profile_description }}"
                        autocomplete="profile_description"
                        autofocus
                    >

                    @error('profile_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="website_url" class="col-md-4 col-form-label">Website</label>
                    <input
                        id="website_url"
                        type="text"
                        class="form-control @error('website_url') is-invalid @enderror"
                        name="website_url"
                        value="{{ old('website_url') ?? $user->profile->website_url }}"
                        autocomplete="website_url"
                        autofocus
                    >

                    @error('website_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Photo</label>
                    <input type="file" class="form-control-file" name="image" id="image" >
                    @error('image')
                            <strong class="pt-2">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="row pt-3 justify-content-end">
                    <button class="btn pl-3 pr-3 btn-primary">
                        Save Profile
                    </button>
                </div>
        </div>
    </form>
</div>
@endsection
