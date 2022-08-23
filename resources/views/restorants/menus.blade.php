@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 name='title' class="nice">{{$restorant->title}}</h4>
        </div>
        <div class="card-body">
          <ul class="list-group">
            @forelse($menus as $menu)
            <li class="list-group-item">
              <div class="row">
                <div class="col-8">
                  <label for="title">Title</label>
                  <h5 name='title'>{{$menu->title}}</h5>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                  <div class="d-flex flex-column">
                    <a class="btn btn-outline-primary m-2" href="{{route('menus-dishes', $menu->id)}}">SHOW MENU DISHES</a>
                  </div>
                </div>
              </div>
            </li>
            @empty
            <li class="list-group-item">Restorant dont have menu yet</li>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
  @endsection
