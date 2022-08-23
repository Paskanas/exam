@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>{{$menu->title}}</h1>
        </div>
        <div class="card-body">


          <ul class="list-group">
            @forelse($dishes as $dish)
            <li class="list-group-item">
              <div class="row">
                <div class="col-6">
                  <label for="title">Title</label>
                  <h5 name='title'>{{$dish->title}}</h5>
                  <label for="about">About</label>
                  <h5 name='about'>{{$dish->about}}</h5>
                  {{-- <label for="rating">Rating</label>
                  <h5 name='rating'>{{$dish->rating}}</h5> --}}
                </div>
                <div class="col-4 d-flex align-items-center justify-content-center">
                  @if($dish->photo)
                  <div class="w-75 h-75 d-flex justify-content-end">
                    <img class="rounded" src="{{$dish->photo}}" alt="Dish photo">
                  </div>
                  @endif
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                  <div class="d-flex flex-column">
                    <form class="m-2" action="{{route('order-add')}}" method="post">
                      @csrf
                      <input class="form-control mb-2" type="number" name="count">
                      <button class="btn btn-outline-primary w-100" type="submit">Order</button>
                      <input name="dish_id" type="hidden" value="{{$dish->id}}">
                    </form>
                  </div>
                </div>
              </div>
            </li>
            @empty
            <li class="list-group-item">No dishes yet</li>
            @endforelse
          </ul>



        </div>
      </div>
    </div>
  </div>
</div>
@endsection
