<!DOCTYPE html>
@if(App::getLocale() == 'ar')
    <html lang="zxx" dir="rtl">
    @else
        <html lang="zxx" dir="ltr">
        @endif

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ghada News</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    @if(App::getLocale() == 'ar')
            <link href="{{asset('frontend/css/modern-business-rtl.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('frontend/css/modern-business.css')}}" rel="stylesheet">

    @endif
    <!-- Custom styles for this template -->

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">Ghada</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.index')}}">@lang('system.Home')</a>
                </li>
{{--                @foreach($categories as $category)--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{route('home.category',$category->id)}}">{{$category->name}})</a>--}}
{{--                </li>--}}
{{--                @endforeach--}}

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/show/1')}}">@lang('system.International')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/show/2')}}">@lang('system.Sports')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/show/3')}}">@lang('system.Political')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/contact ')}}">@lang('system.Contact')</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{App::getLocale() == 'ar'?'عربي':'English'}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @if (App::getLocale() == 'ar')
                            <a href="{{ url(App::getLocale() == 'ar')}}" class="dropdown-item">English</a>
                        @else
                            <a href="{{url(App::getLocale() == 'en')}}" class="dropdown-item">Arabic</a>
                        @endif

                    </div>
                </li>
            </ul>
        </div>

        @guest()
            <a class="navbar-brand ml-auto" href="{{route('login')}}">@lang('system.Sign In')</a>
        @else
            <a class="navbar-brand ml-auto" href="{{route('dashboard')}}">@lang('system.Dashboard')</a>
        @endguest
    </div>
</nav>

<header>
    @yield('header')
</header>

<!-- Page Content -->


@yield('content')

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; {{$settings->address ?? ''}}</p>
        <p class="m-0 text-center text-white">Phone : {{$settings->phone ?? ''}}</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
