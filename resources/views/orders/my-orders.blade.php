@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @forelse($orders as $order)
      <div class="card mt-3">
        <div class="card-header">Order num: {{$order->id}}</div>
        <div class="card-body">
          <div class="right m-2 d-flex">
            <label for="">Order status:</label>
            <h6 class="ms-2">{{$statuses[$order->status]}}</h6>
          </div>
          <ul class="list-group">
            <li class="list-group-item">
              <div class="d-flex flex-row">
                <label for="restorant">Dish:</label>
                <h5 class="ms-2" name='restorant'>{{$order->orderDishes->title}}</h5>
              </div>
              <div class="d-flex flex-row">
                <label for="restorant">Count:</label>
                <h5 class="ms-2" name='restorant'>{{$order->count}}</h5>
              </div>
            </li>
          </ul>
        </div>
      </div>
      @empty
      <div>No orders, go to order something!</div>
      @endforelse
    </div>
  </div>
</div>
@endsection
