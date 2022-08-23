@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Edit dish</h1>
        </div>
        <div class="card-body">
          <ul>
            <div class="row">
              <div class="col-6">
                <form action="{{route('dishes-update', $dish)}}" method="post" enctype="multipart/form-data">
                  <label for="menu_id">Menu</label>
                  <select class="form-select" name="menu_id">
                    @foreach($menus as $menu)
                    <option value="{{$menu->id}}" @if($menu->id === $dish->menu_id) selected @endif>{{$menu->title}}</option>
                    @endforeach
                  </select>
                  <label for="title">Title</label>
                  <input class="form-control" type="text" name="title" value="{{$dish->title}}">
                  <div class="d-flex flex-column">
                    <label for="price">About</label>
                    <textarea style='resize: vertical; min-height:50px; max-height: 300px' name="about" cols="20" rows="4">{{$dish->about}}</textarea>
                  </div>
                  <label for="dish_photo">Photo</label>
                  <input class="form-control" type="file" name="dish_photo">
                  <button class="btn btn-outline-primary mt-4 w-100" type="submit">Save</button>
                  @csrf
                  @method('put')
                </form>
              </div>
              <div class="col-6">
                @if($dish->photo)
                <div class="d-flex justify-content-center">
                  <img class="rounded mt-2" src="{{$dish->photo}}" alt="Dish photo">
                </div>
                <div class="d-flex justify-content-center">
                  <form action="{{route('dishes-delete-picture',$dish)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger m-2" type="submit">Delete photo</button>
                  </form>
                </div>
                @endif
              </div>
            </div>
        </div>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
