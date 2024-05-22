@extends('layouts.master')

@section('title', 'Add a Project')

@section('content')
<div class="container mt-4">
    <div class="text-right mb-5 pt-5" id="menu-div">
        <a href="{{ route('projects.create') }}" class="text-dark" id="edit-btn-top-2">Додај</a>

        <a href="{{ route('home') }}" class="text-primary text-decoration-none">Измени</a>
    </div>
    <h2>Додај нов производ:</h2>
    <form action="{{ route('projects.store') }}" method="POST" class="col-8 offset-2">
        @csrf

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-group py-3">
            <label for="name">Име</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>


        <div class="form-group py-3">
            <label for="subtitle">Поднаслов</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle">
        </div>


        <div class="form-group py-3">
            <label for="image_url">Слика</label>
            <input type="text" class="form-control" id="image_url" name="image_url" placeholder="http://">
        </div>


        <div class="form-group py-3">
            <label for="project_url">URL</label>
            <input type="text" class="form-control" id="project_url" name="project_url" placeholder="http://">
        </div>


        <div class="form-group py-3">
            <label for="description">Опис</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>


        <button type="submit" class="btn btn-warning form-control">Додај</button>
    </form>
</div>
@endsection