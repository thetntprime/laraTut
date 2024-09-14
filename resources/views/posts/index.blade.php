@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="row">
            <div class="col-6 offset-3">
                <a href="/profile/{{ $post->user->id }}">
                    <img src="/storage/{{$post->image}}" alt="image" class="w-100">
                </a>
            </div>
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
                <p>
                    <span style="font-weight:bold;">
                        <a style="color: black" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                    </span>
                    {{ $post->caption }}
                </p>
            </div>
        </div>
        </div>
    @endforeach

    <div class="row">
        <div class="d-flex justify-content-center">
            {{$posts->links() }}
        </div>
    </div>
</div>
@endsection
