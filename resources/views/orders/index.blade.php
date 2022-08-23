@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @forelse($orders as $order)
      <div class="card mt-3">
        <div class="card-header">Order from: {{$order->client->name}}</div>
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item">
              <div class="controls mt-2">
                <form class="delete form" action="{{route('orders-status', $order)}}" method="post">
                  @csrf
                  @method('put')
                  <div class="container">
                    <div class="row">
                      <div class="col-6">
                        <div class="d-flex flex-row">
                          <label for="restorant">Dish:</label>
                          <h5 class="ms-2" name='restorant'>{{$order->orderDishes->title}}</h5>
                        </div>
                        <div class="d-flex flex-row">
                          <label for="restorant">Count:</label>
                          <h5 class="ms-2" name='restorant'>{{$order->count}}</h5>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label>What status?</label>
                          <select class="form-select" name="status">
                            @foreach($statuses as $key => $status)
                            <option value="{{$key}}" @if($key==$order->status) selected @endif>{{$status}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-3">
                        <button type="submit" class="btn btn-outline-info mt-4 ms-4">Set status</button>
                      </div>
                    </div>
                  </div>
                </form>
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
