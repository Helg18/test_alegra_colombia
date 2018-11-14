@extends('layouts.main')
@section('body')
    <table class="table table-bordered table-hover">
        <thead>
            <td>ID</td>
            <td>Plate</td>
            <td>Status</td>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                @if($order->getPlateName())
                    <td>{{ $order->getPlateName() }}</td>
                @else
                    <td>Unknown</td>
                @endif
                <td>{{ $order->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{route('home')}}" class="btn btn-warning">Back</a>
    </div>
@endsection