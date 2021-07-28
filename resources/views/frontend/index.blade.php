@extends('frontend._layouts')

@section('header')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            @foreach($posts as $key=>$post)
            <div class="carousel-item {{$key == 2 ? 'active' : '' }}">
                <img height="500px" width="100%" src="{{$post->photo ? url(asset($post->photo->file)):url(asset('/frontend/img/1.jpg'))}}" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h3>{{$post->title}}</h3>
                    <p>{{Str::limit($post->content,20)}}</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@stop
@section('content')

    @foreach($categories as $cat)
    <section class="gray-sec">
        <div class="container">

            <!-- category Section -->
            <h3 class="my-4">{{$cat->name}} News</h3>

            <div class="row">
                @foreach($cat->posts->take(3) as $pol)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{$pol->photo ? url(asset($pol->photo->file)):url(asset('/frontend/img/1.jpg'))}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title text-center">
                                <a href="#" style="font-size: 17px">{{Str::limit($pol->title,35)}}</a>
                            </h4>
                            <p class="card-text text-center">{{Str::limit($pol->content,80)}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('home.show',$pol->id)}}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div align="center"><a class="btn btn-outline-success" href="{{route('home.category',$cat->id)}}">Display More</a></div>
        </div>
    </section>
    @endforeach


    @stop
