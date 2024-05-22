@extends('layouts.master')

@section('title', 'Homepage')

@section('content')

<div class="banner p-5 text-white d-flex justify-content-center align-items-center">
    <div>
        <h1 class="text-center">Brainster.xyz Labs</h1>
        <p class="text-center"> Проекти од академиите на Brainster</p>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col">
            @guest
            <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
            @endguest

            @auth
            <div class="text-right mb-5 pt-5" id="menu-div">
                <a href="{{ route('projects.create') }}" class="text-primary text-decoration-none mx-2">Додај</a>

                <a href="{{ route('home') }}" class="text-dark mx-2" aria-pressed="true" id="edit-btn-top">Измени</a>
            </div>


            @endauth

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>





@auth
<!-- Logout Button -->
<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endauth


<div class="container">
    <div class="row">
        @auth
        <h3 class="pb-4 pt-2">Измени постоечки производи:</h3>
        @endauth
        @foreach ($projects as $project)
        <div class="col-12 col-md-6 col-lg-4 mb-3 px-4">
            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                <div class="flipper">
                    <div class="front">
                        <a href="{{ $project->project_url }}" class="card-link text-decoration-none">
                            <div class="card h-100 text-center">
                                <!-- Project Image -->
                                @if($project->image_url)
                                <img src="{{ $project->image_url }}" class="pt-2 align-self-center" style="width:200px" alt="{{ $project->name }}">
                                @endif

                                <!-- Project Details -->
                                <div class="card-body">
                                    <h5 class="card-title text-secondary">{{ $project->name }}</h5>
                                    <h6 class="card-title text-secondary">{{ $project->subtitle }}</h6>
                                    <p class="card-text text-dark scrollable-description">{{ $project->description }}</p>
                                </div>
                        </a>
                        <!-- Card Footer for Admin -->
                        @auth
                        <div class="card-footer admin-controls" style="display: none;">
                            <button class="btn flip-button btn-outline-secondary px-2 py-2"><i class="fa-solid fa-pen-to-square p-1"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2" data-toggle="modal" data-target="#deleteModal-{{ $project->id }}"><i class="fa-solid fa-xmark fa-2x"></i></button>
                        </div>
                        @endauth
                    </div>

                </div>
                <div class="back">
                    <!-- Back of the card (Form) -->
                    <div>
                        <div>
                            <form action="{{ route('projects.update', $project->id) }}" method="POST" class="card h-100">
                                @csrf
                                @method('PUT')

                                <div class="card-body text-center">
                                    
                                    <div class="form-group">
                                        <label for="project_url-{{ $project->id }}">URL</label>
                                        <input type="text" class="form-control" id="project_url-{{ $project->id }}" name="project_url" value="{{ $project->project_url }}" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="image_url-{{ $project->id }}">Слика</label>
                                        <input type="text" class="form-control" id="image_url-{{ $project->id }}" name="image_url" value="{{ $project->image_url }}" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="name-{{ $project->id }}">Име</label>
                                        <input type="text" class="form-control" id="name-{{ $project->id }}" name="name" value="{{ $project->name }}" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="subtitle-{{ $project->id }}">Поднаслов</label>
                                        <input type="text" class="form-control" id="subtitle-{{ $project->id }}" name="subtitle" value="{{ $project->subtitle }}" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="description-{{ $project->id }}">Опис</label>
                                        <textarea class="form-control" id="description-{{ $project->id }}" name="description" rows="3" required>{{ $project->description }}</textarea>
                                    </div>

                                    
                                    <div class="text-right pt-3">
                                        <button type="submit" class="btn btn-outline-secondary">Зачувај</button>
                                        <button type="button" class="btn btn-outline-secondary flip-button">Откажи</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal-{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $project->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel-{{ $project->id }}">Избриши</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Дали сте сигурни дека сакате да го избришете производот?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Откажи</button>
                    <button type="button" class="btn btn-warning" onclick="document.getElementById('delete-project-form-{{ $project->id }}').submit();">Избриши</button>
                </div>
            </div>
        </div>
    </div>

    
    <form id="delete-project-form-{{ $project->id }}" action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    @endforeach
</div>
</div>

@endsection