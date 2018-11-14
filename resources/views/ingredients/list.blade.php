@extends('layouts.main')
@section('body')
    <div class="container">
        <div class="col-lg-8 col-md-8 col-sm-8">
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