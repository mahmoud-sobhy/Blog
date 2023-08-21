@extends('layouts.app')



@section('content')
    @if (session()->has('message'))
        <div class="alert alert-warning text-center" role="alert">
            <h1> {{ session()->get('message') }} </h1>
        </div>
    @endif




    <div class="container">
        <div class="row">
            <div class="text-center mx-auto">




                <h1>{{ $post->title }}</h1>
                <h4> <span style="color:red;"> created by:/</span> {{ $post->user->name }}
                    / <span>{{ date('d-m-y h-m-s', strtotime($post->updated_at)) }}</span>
                    <h4>

                        <div class="py-5 border border-dark-subtle">
                            <img src="/images/{{ $post->image_path }}">
                        </div>


                        <p class="mt-5">{{ $post->description }}</p>


                        <a href="/blog" type="button" class="btn btn-success"> back to blog </a>

                        @if (auth()->user() && auth()->user()->id == $post->user_id)
                            <a href="/blog/{{ $post->slug }}/edit" type="button" class="btn btn-primary"> edit this post
                            </a>

                            <form action="/blog/{{ $post->slug }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" type="button" class="btn btn-danger"> delete of post </button>
                            </form>
                        @endif

            </div>
        </div>

    </div>
@endsection
