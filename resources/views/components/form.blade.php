<div>
    <x-error :errors="$errors"/>
    <form action="{{$action}}" method="post"  enctype="multipart/form-data">
        @csrf
        {{$slot}}
    </form>

</div>
