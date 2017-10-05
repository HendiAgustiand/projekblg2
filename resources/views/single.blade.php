@extends('layouts.adminlayout')
@section('style-css')

    @endsection
@section('content')
<!-- Post Content Column -->
<div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">

            <!-- Title -->
            <h1 class="mt-4">{{$data->title}}</h1>

            <!-- Author -->
            <p class="lead">
              by
              <a href="#">Admin</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$data->created_at}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{URL::asset('images/'.$data->image)}}" alt="No Gambar">

            <hr>

            <!-- Post Content -->
            <p class="lead">{{$data->desc}}</p>

            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
              <h5 class="card-header">Leave a Comment:</h5>
              <div class="card-body">
                <form method="POST" action="{{ route('comment.add') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input type="hidden" name="nama" class="form-control" placeholder="Enter Name" value="{{ ucfirst($user->name) }}">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="comment" rows="3" placeholder="Enter Your Comments"></textarea>
                  </div>        
                  <div class="form-group">
                    <input type="hidden" name="post_id" class="form-control" placeholder="Enter PostId" value="{{ucfirst($data->id) }}">
                  </div>
                  <button type="button" class="btn btn-danger" onclick="self.history.back();">Back</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
           @foreach($post as $posts)
            <div class="media mb-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <small><a href="#">{{ $posts->nama }}</a></small><small>     {{ $posts->comment }}</small>
              <small><a href="{{ url('/post/delete',$posts->id) }}">Hapus</a></small>
              <div class="media-body">
                <h5 class="mt-0">
              </div>
            </div>
            @endforeach
          </div>

          </div>
          </div>

          </div>
          </div>
</div>

</div>
@stop