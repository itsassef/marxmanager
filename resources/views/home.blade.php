@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('inc.messages')
                    <button 
                    class="btn btn-primary btn-lg" 
                    data-toggle="modal" 
                    data-target="#addModal"
                    type="button"
                    name="button">Add Bookmark</button>
                    <br><br>
                    <h3>My Bookmarks</h3>
                    <hr>
                    <br>
                   @if(!empty($bookmarks))
                   @foreach($bookmarks as $bookmark)
                    <div class="card">
                        <ul class="list-group">
                        <li class="list-group-item clearfix">{{$bookmark->name}} <small class="disabled"><a href="{{$bookmark->url}}" target="_blank">{{$bookmark->url}}</a></small>
                        
                        <button type="button" class="btn btn-danger delete-bookmark float-right" data-id="{{$bookmark->id}}" name="button"><span class="glyphicon glyphicon-remove"><b>x</b></span> Delete</button>
                        
                        </li>

                        </ul>
                    </div>
                    @endforeach
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Bookmark</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('bookmarks.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Bookmark Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="url">Bookmark URL</label>
            <input type="text" name="url" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Add" class="btn btn-primary">
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
@endsection
