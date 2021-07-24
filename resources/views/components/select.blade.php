<div>
    @if(isset($items))
    <div class="form-group">
        <label for="">{{$title ??'أختيار قسم'}}</label>
        <select name="{{$name}}" class="{{$class}}">
            @foreach($items as $key=>$item)
                <option value="{{$item->id}}"{{$CategoryId != $item->id ?:'selected'}}>{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    @endif

@if(isset($elements))
    <div class="form-group">
        <label for="">{{$title ??'أختيار قسم'}}</label>
        <select name="{{$name}}" class="{{$class}}">
            @foreach($elements as $key=>$el)
{{--                <option value="{{$key++}}">Choose Option</option>--}}
                <option value="{{$el->id}}">{{$el->name}}</option>
            @endforeach
        </select>
    </div>
    @endif
</div>
