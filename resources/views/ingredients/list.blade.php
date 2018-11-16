@extends('layouts.main')
@section('body')
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Showing ingredient list</h3>
            <table class="table table-bordered table-hover">
                <thead>
                <td>ID</td>
                <td>Ingredient</td>
                </thead>
                <tbody>
                @foreach($ingredients as $ingredient)
                    <tr>
                        <td>{{ $ingredient->id }}</td>
                        <td>{{ $ingredient->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <a href="{{route('home')}}" class="btn btn-warning">Back</a>
            </div>
        </div>
    </div>
@endsection