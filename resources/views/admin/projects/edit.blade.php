@extends('layouts.app')

@section('page-title', 'Edit project')

@section('content')

<section class="section add-project py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="type_id" class="form-label">Type</label>
                        <select name="type_id" class="form-control" id="type_id">
                            @foreach($types as $type)
                                <option @selected(old('type_id', $project->type->id) == $type->id) value="{{$type->id}}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Project technologies options --}}
                    <div class="mb-3 d-flex gap-3 flex-wrap">
                        @foreach($techs as $tech)
                            <input
                                name="technologies[]"
                                class="form-check-input"
                                type="checkbox" value="{{$tech->id}}"
                                id="tech-{{$tech->id}}"
                                @checked(in_array($tech->id, old('technologies', $project->technologies->pluck('id')->all())))
                            >
                            <label class="form-check-label" for="tech-{{$tech->id}}">
                                {{$tech->name}}
                            </label>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Title of the project" value="{{old('title', $project->title)}}">
                    </div>
                    {{-- Project image file --}}
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="image">Change the img</label>
                        <input name="image" type="file" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" placeholder="Description of the project" class="form-control" id="description" rows="3">{{old('description', $project->description)}}</textarea>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <input class="btn btn-primary" type="submit" value="Confirm edits">
                        <a class="btn btn-secondary" href="{{route('admin.projects.index')}}">Undo</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection
