@extends('layouts.app')

@section('page-title', 'Add project')

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
                <form action="{{route('admin.projects.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="type_id" class="form-label">Type</label>
                        <select name="type_id" class="form-control" id="type_id">
                            @foreach($types as $type)
                                <option @selected(old('type_id') == $type->id) value="{{$type->id}}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Title of the project" value="{{old('title')}}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">URL image</label>
                        <input name="image" type="text" class="form-control" id="image" placeholder="URL of the project image" value="{{old('image')}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" placeholder="Description of the project" class="form-control" id="description" rows="3">{{old('description')}}</textarea>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <input class="btn btn-primary" type="submit" value="Add">
                        <a class="btn btn-secondary" href="{{route('admin.projects.index')}}">Undo</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection
