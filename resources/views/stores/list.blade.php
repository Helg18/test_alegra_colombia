@extends('layouts.main')
@section('body')
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Showing ingredient available on stores</h3>
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