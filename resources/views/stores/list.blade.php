@extends('layouts.main')
@section('body')
    <div class="container">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <table class="table table-bordered table-hover">
                <thead>
                <td>ID</td>
                <td>Ingredient</td>
                <td>Quantity</td>
                </thead>
                <tbody>
                @foreach($storage as $ingredient)
                    <tr>
                        <td>{{ $ingredient->id }}</td>
                        <td>{{ $ingredient->getIngredientName() }}</td>
                        <td>{{ $ingredient->quantity }}</td>
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