<tbody id="categories">

@foreach($categories as $key=>$cat)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$cat->name}}</td>
        <td>
            <a  class="btn btn-sm btn-primary  edit" data-id="{{$cat->id}}">تعديل</a>
            <a  class="btn btn-sm btn-danger confirm" data-id="{{$cat->id}}">حذف</a>

        </td>
    </tr>
@endforeach

</tbody>

