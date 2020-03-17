@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-2">
                    <div class="h2 pt-2">{{ $user->username }}</div>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                    <a href="/post/create">Add New Post</a>
                @endcan

            </div>

            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex mt-2">
                <div class="pr-4"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-4"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-4"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-2 font-weight-bold">
                {{ $user->profile->title }}
            </div>
            <div class="pt-1">
                {{ $user->profile->profile_description ?? 'They like to walk on concrete. Would you question can I swim if you saw me walking on water.'}}
            </div>
            <div class="pt-1 font-weight-bold">
                <a href="http://www.google.co.za/" target="_bank">{{ $user->profile->website_url }}</a>
            </div>
        </div>
    </div>
    <div class="row pt-3 align-items-center">
        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/post/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100" style="border-radius: 10px;">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
r
