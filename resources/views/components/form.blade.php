<div>
    <form action="{{$action}}" method="post" enctype="multipart/form-data">
        @csrf
        {{$slot}}
    </form>
</div>
