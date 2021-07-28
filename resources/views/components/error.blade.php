<div>
    @if($errors->any)
        <div>
            <ul style="list-style: none">
                @foreach($errors->all() as $error)
                    <li class="alert alert-danger col-8">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
