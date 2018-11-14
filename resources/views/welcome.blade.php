@extends('layouts.main')

@section('body')
<div class="flex-center position-ref full-height">
    <div class="content">
        <form action="{{route('order.store')}}" method="POST">
            {{csrf_field()}}
            <div class="title m-b-md">
                <button class="btn btn-lg btn-success" name="new_order" value="1" type="submit" title="Create a new order">New Order</button>
            </div>
        </form>

        <div class="links">
            <a href="{{route('order.index')}}">View Orders</a>
            <a href="{{route('ingredient.index')}}">View Ingredients</a>
            <a href="{{route('recipe.index')}}">View Recipes</a>
            <a href="{{route('purchase.index')}}">View Purchases</a>
            <a href="{{route('store.index')}}">View Stores</a>
        </div>
    </div>
</div>
@endsection