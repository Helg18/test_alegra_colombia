@extends('layouts.main')
@section('body')
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
@endsection