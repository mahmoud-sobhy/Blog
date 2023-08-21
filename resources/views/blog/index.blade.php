@extends('layouts.app')


@section('content')
    @if (session()->has('message'))
        <div class="alert alert-danger text-center" role="alert">
            <h1> {{ session()->get('message') }} </h1>
        </div>
    @endif
    <div class="row mx-3 text-center py-3 ">
        <h1>All Posts</h1>
        @foreach ($posts as $post)
            <div class="py-5 border border-dark-subtle">
                <img src="/images/{{ $post->image_path }}">
            </div>


            <div class="mb-5">
                <h1 class="text-primary">{{ $post->title }}</h1>
                <h3> <span style="color:red;"> created by:/</span> {{ $post->user->name }}
                    / <span>{{ date('d-m-y h-m-s', strtotime($post->updated_at)) }}</span>
                    <h3>
                        <p style="background:tomato" class="mx-5 text-white">
                            {{ $post->description }}

                            <a href="blog/{{ $post->slug }}" type="button" class="btn btn-success"> read more .. </a>
                        </p>
                        <div>
        @endforeach
    </div>
@endsection
