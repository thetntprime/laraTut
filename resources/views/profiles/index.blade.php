@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" alt="profile pic" class="rounded-circle" style="height: 120px">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">

                <div class="d-flex align-items-center">
                    <h1>{{ $user->username }}</h1>
                    
                    @cannot('update', $user->profile)
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endcannot
                </div>

                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div style="padding-right: 3%;"><strong>{{ $postCount }}</strong> 
                    @if($user->posts->count()==1)
                        post
                    @else
                        posts
                    @endif
                </div>
                <div style="padding-right: 3%;"><strong>{{ $followerCount }}</strong> 
                    @if($user->profile->followers->count()==1)
                        follower
                    @else
                        followers
                    @endif
                </div>
                <div style="padding-right: 3%;"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-2" style="font-weight: bold;">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="image" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
