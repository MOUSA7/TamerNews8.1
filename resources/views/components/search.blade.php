<div>

    @if(! $id)
        <form action="{{$route}}" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="{{$name}}" type="search" placeholder="إبحث هنا" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">أبحث</button>
        </form>
        @endif
    @if($id == 'date')
            <form action="{{$route}}" method="GET" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 col-sm-5" name="{{$start}}" value="{{old($start)}}" type="date"  aria-label="Search">
                إلى
                <input class="form-control mr-sm-2 col-sm-5 " name="{{$end}}" value="{{old($end)}}" type="date" aria-label="Search">

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">أبحث</button>
            </form>
    @endif

</div>

