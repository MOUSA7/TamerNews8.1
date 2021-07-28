<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ghada News</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('frontend/css/modern-business.css')}}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">Ghada</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.index')}}">Home</a>
                </li>
                @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.category',$category->id)}}">{{$category->name}} News</a>
                </li>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.contact')}}">Contact</a>
                </li>

            </ul>
        </div>
        @guest()
            <a class="navbar-brand ml-auto" href="{{route('login')}}">Sign In</a>
        @else
            <a class="navbar-brand ml-auto" href="{{route('dashboard')}}">Dashboard</a>
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
        <p class="m-0 text-center text-white">Copyright &copy; {{$settings->address}}</p>
        <p class="m-0 text-center text-white">Phone : {{$settings->phone}}</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
