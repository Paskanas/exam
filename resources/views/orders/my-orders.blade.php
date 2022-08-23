@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @forelse($orders as $order)
      <div class="card mt-3">
        <div class="card-header">My orders</div>
        <div class="card-body">
          <div class="right m-2 d-flex">
            <label for="">Order status:</label>
            <h6 class="ms-2">{{$statuses[$order->status]}}</h6>
          </div>
          <ul class="list-group">
            <li class="list-group-item">
              <div class="color-box2">
                <div class="d-flex flex-row">
                  <label for="restorant">Dish:</label>
                  <h5 class="ms-2" name='restorant'>{{$order->orderDishes->title}}</h5>
                </div>
                <div class="d-flex flex-row">
                  <label for="restorant">Count:</label>
                  <h5 class="ms-2" name='restorant'>{{$order->count}}</h5>
                </div>

                {{-- <label for="title">Title</label>
                <h5 name='title'>{{$order->orderHotels->title}}</h5> --}}
                {{-- <label for="price">Price</label>
                <h5 name='price'>{{$order->orderHotels->price}} &euro;</h5> --}}
                {{-- <label for="travel_duration">Travel duration</label>
                <h5 name='travel_duration'>{{$order->orderHotels->travel_duration}} min</h5> --}}
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
