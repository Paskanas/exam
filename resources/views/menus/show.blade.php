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
          <div class="row">
            <div class="col-6">
              <label for="title">Title</label>
              <h5 name='title'>{{$menu->title}}</h5>
              <label for="restorant">Restorant</label>
              <h5 name='restorant'>{{$menu->getMenuRestorants->title}}</h5>
            </div>
            {{-- not need if this page only for admin --}}
            @if(Auth::user()->role>9)
            <div class="col-2 d-flex align-items-center justify-center">
              <div class="d-grid gap-3 w-100">
                <a class="btn btn-outline-success" href="{{route('menus-edit', $menu)}}">EDIT</a>
                <form class="delete" action="{{route('menus-delete', $menu)}}" method="post">
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
