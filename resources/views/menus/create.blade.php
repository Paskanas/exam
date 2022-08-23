@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>New menu</h1>
        </div>
        <div class="card-body">
          <ul>
            <form action="{{route('menus-store')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="{{old('title')}}">
                <label for="restorant_id">Restorant</label>
                <select class="form-select" name="restorant_id">
                  @foreach($restorants as $restorant)
                  <option value="{{$restorant->id}}" @if(old('restorant_id')==$restorant->id) selected @endif>{{$restorant->title}}</option>
                  @endforeach
                </select>
              </div>
              @csrf
              <button class="btn btn-outline-primary mt-4" type="submit">New menu</button>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
