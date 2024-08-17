@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/images/tired face no bg.png" alt="profile pic" class="rounded-circle" style="height: 120px">
        </div>
        <div class="col-9 pt-5">
            <div><h1>{{ $user->username }}</h1></div>
            <div class="d-flex">
                <div style="padding-right: 3%;"><strong>5</strong> posts</div>
                <div style="padding-right: 3%;"><strong>2</strong> followers</div>
                <div style="padding-right: 3%;"><strong>50</strong> following</div>
            </div>
            <div class="pt-2" style="font-weight: bold;">tutorial.org</div>
            <div>I do stuff sometimes</div>
            <div><a href="#">www.google.com</a></div>
        </div>
    </div>

    <div class="row pt-5">
        <div class="col-4">
            <img src="/images/spork.jpg" alt="img1" class="w-100 h-50">
        </div>
        <div class="col-4">
            <img src="/images/heavy and sandvich.jpg" alt="img1" class="w-100 h-50">
        </div>
        <div class="col-4">
            <img src="/images/dat boi.jpg" alt="img1" class="w-100 h-50">
        </div>
    </div>
</div>
@endsection
