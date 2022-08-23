@extends('layouts.app')

@section('content')
<div class="container mt-4 w-80">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Menus</h1>
        </div>
        <div class="card-body">
          <ul class="list-group">
            @forelse($menus as $menu)
            <li class="list-group-item">
              <div class="row">
                <div class="col-6">
                  <label for="title">Title</label>
                  <h5 name='title'>{{$menu->title}}</h5>
                  <label for="restorant">Restorant</label>
                  <h5 name='restorant'>{{$menu->getMenuRestorants->title}}</h5>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-center">
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                  <div class="d-flex flex-column">
                    <a class="btn btn-outline-primary m-2" href="{{route('menus-show', $menu->id)}}">SHOW</a>
                    @if(Auth::user()->role >9)
                    <a class="btn btn-outline-success m-2" href="{{route('menus-edit', $menu)}}">EDIT</a>
                    <form class="delete m-2" action="{{route('menus-delete', $menu)}}" method="post">
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
