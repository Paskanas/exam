@extends('layouts.app')

@section('content')
<div class="container mt-4 w-80">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Dishes</h1>
        </div>
        <div class="card-body">
          <ul class="list-group">
            @forelse($dishes as $dish)
            <li class="list-group-item">
              <div class="row">
                <div class="col-6">
                  <label for="menu_id">Menu</label>
                  <h5 name='menu_id'>{{$dish->getDishMenus->title}}</h5>
                  <label for="title">Title</label>
                  <h5 name='title'>{{$dish->title}}</h5>
                  {{-- <label for="about">About</label>
                  <textarea disabled class="wrap" name='about'>{{$dish->about}}</textarea> --}}
                  <div class="d-flex flex-column">
                    <label for="price">About</label>
                    <textarea disabled class="wrap" name="about" cols="20">{{$dish->about}}</textarea>
                  </div>
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
                    <a class="btn btn-outline-primary m-2" href="{{route('dishes-show', $dish->id)}}">SHOW</a>
                    @if(Auth::user()->role >9)
                    <a class="btn btn-outline-success m-2" href="{{route('dishes-edit', $dish)}}">EDIT</a>
                    <form class="delete m-2" action="{{route('dishes-delete', $dish)}}" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-outline-primary" type="submit">DELETE</button>
                    </form>
                    @endif
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
