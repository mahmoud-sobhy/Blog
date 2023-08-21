@extends('layouts.app')


@section('content')

<div class="container text-center">

<h1>create new post</h1>

<div class="row">

  <div style="background-color: rgb(231, 219, 227)" class="col-8 mx-auto border">

<form action="/blog" method="post" enctype="multipart/form-data">
  @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter The Title">
    </div>
      <div class="mb-3 form-floating">
        <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 150px"></textarea>
        <label for="floatingTextarea2">Enter The Description</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" name="image" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
      </div> 
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>

  </div>
</div>


</div>
  


@endsection