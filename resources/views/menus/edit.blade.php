@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Edit menu</h1>
        </div>
        <div class="card-body">
          <ul>
            <div class="row">
              <div class="col-6">
                <form action="{{route('menus-update', $menu)}}" method="post" enctype="multipart/form-data">
                  <label for="title">Title</label>
                  <input class="form-control" type="text" name="title" value="{{$menu->title}}">
                  <label for="restorant_id">Restorant</label>
                  <select class="form-select" name="restorant_id">
                    @foreach($restorants as $restorant)
                    <option value="{{$restorant->id}}" @if($restorant->id === $menu->restorant_id) selected @endif>{{$restorant->title}}</option>
                    @endforeach
                  </select>
                  <button class="btn btn-outline-primary mt-4 w-100" type="submit">Save</button>
                  @csrf
                  @method('put')
                </form>
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
