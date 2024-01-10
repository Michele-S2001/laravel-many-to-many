@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mb-3">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Resources
        </div>
        <div class="card-body">
            <a href="{{route('admin.projects.index')}}">All projects</a>
            <a href="{{route('admin.technologies.index')}}">All technologies</a>
        </div>
    </div>
</div>
@endsection
