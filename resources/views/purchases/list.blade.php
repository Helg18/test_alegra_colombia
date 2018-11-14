@extends('layouts.main')
@section('body')
    <div class="container">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <h3>Showing purchases list</h3>
            <table class="table table-bordered table-hover">
                <thead>
                <td>ID</td>
                <td>Ingredient</td>
                <td>Quantity</td>
                <td>Date</td>
                </thead>
                <tbody>
                @foreach($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        <td>{{ $purchase->getIngredientName() }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>{{ $purchase->created_at }}</td>
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