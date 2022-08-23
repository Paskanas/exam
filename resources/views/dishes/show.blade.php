@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>{{$dish->title}}</h1>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <label for="menu_id">Menu</label>
              <h5 name='menu_id'>{{$dish->getDishMenus->title}}</h5>
              <label for="title">Title</label>
              <h5 name='title'>{{$dish->title}}</h5>
              <label for="about">About</label>
              <h5 name='about'>{{$dish->about}}</h5>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
              @if($dish->photo)
              <div class="d-flex align-content-center justify-content-center">
                <img class="rounded w-100" src="{{$dish->photo}}" alt="Dish photo">
              </div>
              @endif
            </div>
            {{-- not need if this page only for admin --}}
            @if(Auth::user()->role>9)
            <div class="col-2 d-flex align-items-center justify-content-center">
              <div class="d-grid gap-3 w-100">
                <a class="btn btn-outline-success" href="{{route('dishes-edit', $dish)}}">EDIT</a>
                <form class="delete" action="{{route('dishes-delete', $dish)}}" method="post">
                  @csrf
                  @method('delete')
                  <div class="d-grid">
                    <button class="btn btn-outline-danger" type="submit">DELETE</button>
                  </div>
                </form>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
