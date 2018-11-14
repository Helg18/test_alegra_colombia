@extends('layouts.main')
@section('body')
    <table class="table table-bordered table-hover">
        <thead>
        <td>ID</td>
        <td>Recipe</td>
        </thead>
        <tbody>
        @foreach($recipes as $recipe)
            <tr>
                <td>{{ $recipe->id }}</td>
                <td>{{ $recipe->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{route('home')}}" class="btn btn-warning">Back</a>
    </div>
@endsection