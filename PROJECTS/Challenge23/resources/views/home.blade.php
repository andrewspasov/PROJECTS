@extends('layouts.master')

@section('title', 'Home Page')

@section('content')

<div class="banner" id="banner-home">
    <div class="container text-center text-white p-5">
        <div class="row">
            <div class="col" id="home-text">
                <h1>Clean Blog</h1>
                <p>A Blog Theme By Start Bootstrap</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col">
            <h3>Lorem Ipsum</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis porro aliquam saepe repellendus dolore voluptas, temporibus perferendis veritatis voluptate impedit dicta fuga, enim ipsa itaque nam! Officiis voluptatibus culpa nam.</p>
            <p>posted by John Doe</p>
        </div>
    </div>
    <hr>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col">
            <h3>Lorem Ipsum 2</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis porro aliquam saepe repellendus dolore voluptas, temporibus perferendis veritatis voluptate impedit dicta fuga, enim ipsa itaque nam! Officiis voluptatibus culpa nam.</p>
            <p>posted by John Doe</p>
        </div>
    </div>
    <hr>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col">
            <h3>Lorem Ipsum 3</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis porro aliquam saepe repellendus dolore voluptas, temporibus perferendis veritatis voluptate impedit dicta fuga, enim ipsa itaque nam! Officiis voluptatibus culpa nam.</p>
            <p>posted by John Doe</p>
        </div>
    </div>
    <hr>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col">
            <h3>Lorem Ipsum 4</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis porro aliquam saepe repellendus dolore voluptas, temporibus perferendis veritatis voluptate impedit dicta fuga, enim ipsa itaque nam! Officiis voluptatibus culpa nam.</p>
            <p>posted by John Doe</p>
        </div>
    </div>
    <hr>
    <button class="btn btn-info offset-10 p-2">Older Posts -></button>
</div>

@endsection