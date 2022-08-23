<div class="card mb-4">
  <div class="card-header">Search</div>
  <div class="card-body">
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
