@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>New dish</h1>
        </div>
        <div class="card-body">
          <ul>
            <form action="{{route('dishes-store')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="menu_id">Menu</label>
                <select class="form-select" name="menu_id">
                  @foreach($menus as $menu)
                  <option value="{{$menu->id}}" @if(old('menu_id')==$menu->id) selected @endif>{{$menu->title}}-{{$menu->getMenuRestorants->title}}</option>
                  @endforeach
                </select>
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="{{old('title')}}">
                <div class="d-flex flex-column">
                  <label for="price">About</label>
                  <textarea style='resize: vertical; min-height:50px; max-height: 300px' name="about" cols="20" rows="4"></textarea>
                </div>
                <label for="dish_photo">Photo</label>
                <input class="form-control" type="file" name="dish_photo">
              </div>
              @csrf
              <button class="btn btn-outline-primary mt-4" type="submit">New Dish</button>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
