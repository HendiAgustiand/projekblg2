@extends('layouts.adminLayout')
@section('content')
<!-- Blog Entries Column -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
                <div class="col-lg-12">
                  <h1><span>News</span></h1>
                  <hr>
                </div>
                  <!-- Blog Post -->
                  @foreach($post as $data)
                  <div class="card mb-4">
                    <div class="card-body">
                      <h3 class="card-title">{{$data->title}}</a></h3>
                      <img src="{{ url('images/'.$data->image) }}" alt="No Gambar">
                      <p class="card-text">{{str_limit($data->desc, $limit = 500, $end = '...')}}</p>
                      <a href="{{ url('post/'.$data->id)}}" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                     {{$data->created_at}}
                     <a href="#">Admin</a>
                   </div>
                 </div>
                 @endforeach
                {{ $post->links() }}
                </div>
                @stop
    </div>
  </div>
</div>
