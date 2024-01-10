@extends('layouts.app')

@section('page-title', 'Show')

@section('content')

<section class="section project-showcase py-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img class="mx-auto" src="{{$project->image}}" alt="project image">
            </div>
            <div class="col-6">
                <h3>{{$project->title}}</h3>
                <span class="badge text-bg-info">{{$project->type->name}}</span>
                <div class="my-3">
                    @foreach ($project->technologies as $tech)
                        <span class="badge rounded-pill text-bg-success">
                            {{$tech->name}}
                        </span>
                    @endforeach
                </div>
                <p>{{$project->description}}</p>
            </div>
        </div>
    </div>
</section>

@endsection
