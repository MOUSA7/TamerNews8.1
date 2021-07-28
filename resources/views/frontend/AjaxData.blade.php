<div id="commentable">
    @foreach($data as $comment)
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">{{$comment->user ?$comment->user->name:''}}</h5>
                {{$comment->content}}
            </div>
        </div>
    @endforeach
</div>
