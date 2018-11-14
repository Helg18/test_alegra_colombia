@extends('layouts.main')
@section('body')
    <div class="container">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Plate</td>
                    <td>Status</td>
                </tr>
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
        </div>
    </div>
@endsection