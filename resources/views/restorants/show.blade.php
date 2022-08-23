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
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <label for="title">Title</label>
                  <h4 name='title' class="nice">{{$restorant->title}}</h4>
                  <label for="code">Code</label>
                  <h4 name='code' class="nice">{{$restorant->code}}</h4>
                  <label for="address">Address</label>
                  <h4 name='address' class="nice">{{$restorant->address}}</h4>
                </div>
                <div class="col-4 d-flex align-items-center justify-center">
                  {{-- not need because this page only for admins --}}
                  @if(Auth::user()->role>9)
                  <div class="d-grid gap-3 w-100">
                    <a class="btn btn-outline-success" href="{{route('restorants-edit', $restorant)}}">EDIT</a>
                    <form class="delete" action="{{route('restorants-delete', $restorant)}}" method="post">
                      @csrf
                      @method('delete')
                      <div class="d-grid w-100">
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
  </div>
  @endsection
