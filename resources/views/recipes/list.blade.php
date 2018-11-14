@extends('layouts.main')
@section('body')
    <div class="container">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <table class="table table-bordered">
                <thead>
                <td>ID</td>
                <td>Recipe</td>
                </thead>
                <tbody>
                @foreach($recipes as $recipe)
                    <tr>
                        <td class="table-success">{{ $recipe->id }}</td>
                        <td class="table-success">{{ $recipe->name }}</td>
                    </tr>
                    @if($recipe->ingredients)
                        <tr>
                            <td>Quantities</td>
                            <td>Ingredient Name</td>
                        </tr>
                        @foreach($recipe->ingredients as $ingredient)
                            <tr class="table-striped table-warning table-borderless">
                                <td>{{$ingredient->pivot->quantity}} units</td>
                                <td>{{$ingredient->name}}</td>
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="2"></td>
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