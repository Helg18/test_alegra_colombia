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
            <a href="{{route('order.index')}}">Orders</a>
            <a href="{{route('ingredient.index')}}">Ingredients</a>
            <a href="{{route('recipe.index')}}">Recipes</a>
            <a href="{{route('purchase.index')}}">Purchases</a>
            <a href="{{route('store.index')}}">Store</a>
            <a href="{{route('requisition.index')}}">Requisitions</a>
        </div>
    </div>
</div>
@endsection