@extends('layouts.app')

@section('page-title', 'Add project')

@section('content')

    <section class="section py-5">
        <div class="container">

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Technology</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($technologies as $tech)
                        <tr>
                            <td>{{$tech->name}}</td>
                            <td>lorem ipsum</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>

@endsection
