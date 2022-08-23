<div class="card mb-4">
  <div class="card-header">Search</div>
  <div class="card-body">
    {{-- <form class="delete" action="{{route('home-index')}}" method="get">
    <div class="container">
      <div class="row">
        <div class="col-3">
          <div class="form-group">
            <label>Sort</label>
            <select class="form-control" name="sort">
              <option value="default" @if($sort=='default' ) selected @endif>Default sort</option>
              <option value="price-asc" @if($sort=='price-asc' ) selected @endif>Price A-Z</option>
              <option value="price-desc" @if($sort=='price-desc' ) selected @endif>Price Z-A</option>
            </select>
          </div>


        </div>
        <div class="col-4">
          <div class="form-group">
            <label>Filter country</label>
            <select class="form-control" name="country_id">
              <option value="0" @if($filter==0) selected @endif>No Filter, please</option>
              @foreach($countries as $country)
              <option value="{{$country->id}}" @if($filter==$country->id) selected @endif>{{$country->title}}</option>
              @endforeach
            </select>
          </div>

        </div>
        <div class="col-5">
          <button type="submit" class="btn btn-outline-warning m-2 mt-4">Sort!</button>
          <a class="btn btn-outline-success m-2 mt-4" href="{{route('home-index')}}">Clear!</a>
        </div>

      </div>
    </div>
    </form> --}}
    <form class="delete" action="{{route('home-index')}}" method="get">
      <div class="container">
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <label for="find">Search by restorant title</label>
              <input class="form-control" type="text" name="find" value="{{$find}}" />
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-outline-warning mt-4">Search!</button>
            <a class="btn btn-outline-success ms-2 mt-4" href="{{route('home-index')}}">Clear!</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
