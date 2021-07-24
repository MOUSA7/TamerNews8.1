@extends('admin.layouts.master')
<script src="{{asset('dist/js/jquery.min.js')}}"></script>

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">عرض الأقسام</h1>
            <hr>

            <div class="pull-right form-inline">
                <a  class="btn btn-success" data-toggle="modal" data-target="#create">
                    <i class="fa fa-plus"></i>
                    أضافة تصنيف
                </a>
            </div>

            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item active">عرض الأقسام</li>

                </ol>
                <br><br><br>
                <div class="float-right">
                   @search(['route'=>route('admin.categories.search'),'name'=>'q','id'=>''])
                        @if(session('status'))
                            <div class="alert alert-info">
                                <p>{{session('status')}}</p>
                            </div>
                        @endif
                </div>

            </div><!-- /.col -->

        </div><!-- /.row -->


    @endsection

    @section('content')


        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">القسم</th>
                <th scope="col">العمليات</th>
            </tr>
            </thead>

            <tbody id="categories">

            @foreach($categories as $key=>$cat)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$cat->name}}</td>
                    <td>
                        <a  class="btn btn-sm btn-primary btn-xs edit" data-id="{{$cat->id}}">تعديل</a>
                        <a  class="btn btn-sm btn-danger btn-xs confirm" data-id="{{$cat->id}}">حذف</a>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>


        <!-- Create Model !-->

        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="form">
                        @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name"> أسم التصنيف :</label>
                                <input type="text" name="name" class="form-control" placeholder="اسم التصنيف">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">أغلاق</button>
                            <button name="submit" type="button" id="save" class="btn btn-success">حفظ التغيرات</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- End Create!-->

        <!-- Edit!-->
        <div id="EditModal"></div>
        <!-- End Edit!-->
    @endsection
    <script>
        $(document).ready(function (){
            $("#save").click(function (){
                var data = $("#form").serialize();
                $.post("{{route('admin.categories.store')}}",data).done(function (data){
                   $("#create").modal('hide');
                   $("#categories").replaceWith(data)
                });
            });
        });

        $(document).on('click','.edit',function (){
            var id = $(this).data('id');
            $.get("categories/edit/"+id).done(function (data){
                $("#EditModal").replaceWith(data);
                $("#EditModal").modal('show')
            })
        })

        $(document).on('click','#save_edit',function (){
            var data = $("#edit-form").serialize();
            var id   = $("#edit-form").data('id');
            console.log(id);
            $.post("categories/edit/"+id,data).done(function (data){
                $("#categories").replaceWith(data);
                $("#EditModal").modal('hide');
            });

        });

        $(document).on('click','.confirm',function (){
            var id = $(this).data('id');
            $.post("categories/delete/"+id,{"_token": "{{csrf_token()}}"}).done(function (data){
                $("#categories").replaceWith(data);
            });
        });
    </script>
