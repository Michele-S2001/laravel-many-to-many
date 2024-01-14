@extends('layouts.app')

@section('page-title', 'All my projects')

@section('content')

<section class="section projects py-5">
    <div class="container">
        <h1 class="main-title text-center mb-3">Discover the projects that I made</h1>
        <div class="us-none btn btn-sm btn-warning mb-3 text-light fw-bold" id="show-tools">Toggle actions</div>
        <div class="row row-gap-3">
            @foreach ($projects as $project)

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="project-card p-3">
                        <div class="project-card__header text-center pb-3">
                            <span class="badge text-dark">Web development</span>
                            <h3 class="title"> {{$project->title}} </h3>
                            <span class="badge text-dark">
                                {{$project->type->name}}
                            </span>
                        </div>
                        <div class="project-card__body text-center">
                            @if($project->image)
                                <img class="mx-auto mb-3" src="{{ asset('storage/' . $project->image)}}" alt="project image">
                            @endif
                            <a class="btn btn-sm btn-primary" href="{{route('admin.projects.show', $project->id)}}">more</a>
                        </div>
                        <div class="tools d-flex justify-content-between">
                            <a class="btn btn-sm btn-success tool hide" href="{{route('admin.projects.edit', $project->id)}}">edit</a>
                            <form class="tool hide" id="{{'form-'.$project->id}}" action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-sm btn-danger" type="submit" value="Delete" data-delete data-target={{'#form-'.$project->id}}>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>

<div class="c-modal text-center">
    <div class="c-modal__inner p-4">
        <h5 class="mb-4">are you sure you want to delete this item?</h5>
        <button id="destroy" class="btn btn-danger">Yes, delete this </button>
        <button id="undo" class="btn btn-secondary">No, I changed my mind</button>
    </div>
</div>

@endsection
