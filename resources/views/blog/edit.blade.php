@extends('layouts.app')


@section('content')

<div class="container text-center">

<h1>Edite this post</h1>

<div class="row">

  <div style="background-color: rgb(231, 219, 227)" class="col-8 mx-auto border">

<form action="/blog/{{$post->slug}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input type="text" name="title" value="{{$post->title}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
      <div class="mb-3 form-floating">
        <textarea class="form-control" value="{{$post->description}}" name="description" id="floatingTextarea2" style="height: 150px"> {{$post->description}} </textarea>
        <label for="floatingTextarea2">Enter The Description</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" name="image" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
      </div> 
    <button type="submit" name="submit" class="btn btn-primary">Update Now</button>
  </form>

  </div>
</div>


</div>
  


@endsection