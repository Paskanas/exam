@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Edit restorant</h1>
        </div>
        <div class="card-body">
          <ul>
            <form action="{{route('restorants-update', $restorant)}}" method="post">
              <div class="form-group">
                <label for="restorant_title">Title</label>
                <input class="form-control" type="text" required name="restorant_title" value="{{old('restorant_title',$restorant->title)}}">
                <label for="restorant_code">Code</label>
                <input class="form-control" type="number" required name="restorant_code" value={{old('restorant_code',$restorant->code)}}>
                <label for="restorant_address">Address</label>
                <input class="form-control" type="text" required name="restorant_address" value="{{old('restorant_address',$restorant->address)}}">
              </div>
              @csrf
              @method('put')
              <button class="btn btn-outline-primary mt-4" type="submit">Save</button>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
