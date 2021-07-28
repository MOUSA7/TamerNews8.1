@extends('frontend._layouts')

@section('content')

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$category->name}}
            <small>News</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.blade.php">Home</a>
            </li>
            <li class="breadcrumb-item active">{{$category->name}}</li>
        </ol>

        <!-- news title One -->
        @foreach($category->posts as $post)
        <div class="row">
            <div class="col-md-7">
                <a href="newsdetailes.html">
                    <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0" src="{{$post->photo ? asset($post->photo->file):asset('/frontend/img/1.jpg')}}" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>{{Str::limit($post->title,50)}}</h3>
                <p>{{Str::limit($post->content,100)}}</p>
                <a class="btn btn-primary" href="{{route('home.show',$post->id)}}">View news title
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
            <hr>
    @endforeach
        <!-- /.row -->

        <hr>



        <!-- Pagination -->
    </div>

@endsection
