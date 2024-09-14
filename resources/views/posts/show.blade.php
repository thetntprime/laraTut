@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" alt="image" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pe-3">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="" class="rounded-circle" style="max-width:40px; margin-left:0;">
                    </div>
                    <div>
                        <div class="d-flex align-items-center" style="font-weight:bold;">
                            <a style="color: black" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                            @cannot('update', $post->user->profile)
                                <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
                            @endcannot
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                    <span style="font-weight:bold;">
                        <a style="color: black" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                    </span>
                    {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
