@extends('Layouts.app')

@section('content')
<div class="container mt-4 w-80">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('front.box')
      <div class="card">
        <div class="card-header">
          <h1>Restorants</h1>
        </div>
        <div class="card-body">
          <ul class="list-group">
            @forelse($restorants as $restorant)
            <li class="list-group-item">
              <div class="row">
                <div class="col-8">
                  <label for="title">Title:</label>
                  <h3 name='title'>{{$restorant->title}}</h3>
                  <label for="city">Code:</label>
                  <h3 name='city'>{{$restorant->code}}</h3>
                  <label for="address">Address:</label>
                  <h3 name='address'>{{$restorant->address}}</h3>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-evenly">
                  <div class="d-flex flex-column">
                    <a class="btn btn-outline-primary m-2 w-100" href="{{route('restorants-menus', $restorant->id)}}">SHOW MENUS</a>
                  </div>
                </div>
              </div>
            </li>
            @empty
            <li class="list-group-item">No restorants yet</li>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
