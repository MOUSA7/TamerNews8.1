@extends('frontend._layouts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('dist/js/jquery.min.js')}}"></script>
@section('content')


    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">
            {{Str::limit($post->title,40)}}
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">{{$post->category->name}}</li>
        </ol>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{$post->photo ? asset($post->photo->file):asset('/frontend/img/1.jpg')}}" alt="">

                <hr>

                <!-- Date/Time -->
                <p>Posted on {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Post Content -->
                <p class="lead">
                    {{$post->content}}
                </p>
                <hr>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        @if(auth()->check())
                        <form id="CommentForm" >
                        <div class="form-group">
                                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                            </div>
                            <input type="hidden" id="user" name="name" value="{{auth()->user()->name}}">
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @else
                            <a href="{{route('login')}}">Sign In</a> to Write Comment
                        @endif
                    </div>
                </div>

                <!-- Single Comment -->
                <div id="commentable">
                    @foreach($post->comments as $comment)
                        <div class="media mb-4">
                            @if(auth()->user()->photo ?? '')
                            <img class="d-flex  rounded-circle" height="50px" width="50px" src="{{auth()->user()->photo->path()}}" alt="">
                            @endif
                                <div class="media-body">
                                <h5 class="mt-0">{{$comment->user ?$comment->user->name:''}}</h5>
                                {{$comment->content}}


                                <div class="comment-reply-container">
                                    <a href="#" class="toggle-reply" type="submit" >replay</a>
                                    <div class="comment-reply">
                                        @if(auth()->check())
                                            <form id="ReplayForm">

                                                <input type="hidden" name="comment_id" id="commentId" value="{{$comment->id}}">

                                                    <input type="hidden" name="user_id" id="user2" value="{{auth()->user()->name}}">

                                                <div class="form-group">
                                                    <textarea class="form-control"  id="body" name="body" rows="1" style="height: 40px;"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" id="submit2"  class="btn btn-primary btn-replay">Publish</button>
                                                </div>
                                            </form>
                                        @else
                                            <a href="{{route('login')}}">Sign In</a> to Write Replay
                                            @endif
                                    </div>
                                </div>
                                @if($comment->replays)
                                    @foreach($comment->replays as $replay)
                                        <div id="replay">
                                            <div class="media mt-4">
                                                @if(auth()->user()->photo ?? '')
                                                    <img class="d-flex  rounded-circle" height="50px" width="50px" src="{{auth()->user()->photo->file}}" alt="">
                                                @endif
                                                <div class="media-body">
                                                    @if(auth()->check())
                                                        <h5 class="mt-0">{{auth()->user()->name}}</h5>
                                                    @endif
                                                    {{$replay->body}}
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endif
                            </div>
                        </div>

                    @endforeach
                </div>


            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>

@stop

<script>
    $(document).ready(function (){

        $('.comment-reply').css('display','none');

        $("#CommentForm").submit(function (){
            var content = $('#content').val();
            var user = $('#user').val();
            var id = document.getElementById("content").value;
            console.log(id)
            $.ajax({
                url:'{{route('admin.comments.store',['post'=>$post->id])}}',
                method:'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "content":content,
                    "user": user,
                    "id":id,
                },
                success:function (data){
                    console.log(data)
                    $('#replay').append('<div class="media mb-4"> <img class="d-flex rounded-circle"  height="50px" width="50px" src="{{auth()->user()->photo->file}}" alt=""> <div class="media-body"> <h5 class="mt-0">'+user+' </h5>'+content+'</div> </div>');
                    $('#content').val('');
                    // window.location.refresh()
                },
            });
            return false;
        });

        {{--$('.btn-replay').click(function (e) {--}}
        {{--    e.preventDefault();--}}
        {{--    var form = $(this).closest('form');--}}
        {{--    var data = form.serialize();--}}
        {{--    $.ajax({--}}
        {{--        url:'{{route('admin.replies.store')}}',--}}
        {{--        method:'POST',--}}
        {{--        data: {--}}
        {{--            "_token": "{{ csrf_token() }}",--}}
        {{--            data--}}
        {{--        },--}}
        {{--        success:function (data){--}}
        {{--            console.log(data)--}}
        {{--            $('#commentable').append('<div class="media mt-4"><img class="d-flex rounded-circle" height="50px" width="50px" src="{{auth()->user()->photo->path()}}" alt=""><div class="media-body"><h5 class="mt-0">'+user+'</h5>'+body+'</div></div>');--}}
        {{--            // window.location.refresh()--}}
        {{--        },--}}
        {{--    });--}}
        {{--})--}}

        $("form").submit(function (){
            // alert('Submit')
            var body = $('#body').val();
            var user = $('#user2').val();
            var CommentId = $('#commentId').val();
            console.log(body,CommentId)
            $.ajax({
                url:'{{url('admin/replies/store/')}}'+'/'+CommentId,
                method:'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "body":body,
                    "user": user,
                    "comment_id":CommentId,
                },
                success:function (data){
                    console.log(data)
                    $('#commentable').append('<div class="media mt-4"><img class="d-flex rounded-circle" height="50px" width="50px" src="{{auth()->user()->photo->file}}" alt=""><div class="media-body"><h5 class="mt-0">'+user+'</h5>'+body+'</div></div>');
                    $('#body').val('');
                },
            });
            return false;
        });

    })
    $(document).ready(function (){
        $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle('slow');
            return false;
            $('.comment-reply').css('display','block');
        });

    });

</script>
