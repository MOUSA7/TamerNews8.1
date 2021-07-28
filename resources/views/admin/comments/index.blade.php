@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">عرض التعليقات</h1>
            <hr>
            <div class="float-left">

                <a href="{{route('admin.posts.create')}}"  class="btn btn-success float-right">
                    <i class="fa fa-plus"></i>
                    أضافة تعليق
                </a>

                <a href="{{route('admin.posts.control')}}" style="margin-left: 10px" class="btn btn-danger">
                    <i class="fas fa-tools"></i>
                    التحكم في التعليقات
                </a>

            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">عرض التعليقات</li>

            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">المحتوى</th>
            <th scope="col">المستخدم</th>
            <th scope="col">المنشور</th>
            <th scope="col">الحالة</th>
            <th scope="col">العمليات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $key=>$comment)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{Str::limit($comment->content,30)}}</td>
                <td>{{$comment->user ? $comment->user->name : 'No User'}}</td>
                <td>{{Str::limit($comment->commentable->title,10)}}</td>
                <td>{{$comment->status =1?'Active':'Not Active'}}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary btn-xs">تعديل</a>
                    <a href="#" class="btn btn-sm btn-dark btn-xs">عرض</a>
                    <a href="#" class="btn btn-sm btn-danger btn-xs">حذف</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        <div class="mx-auto">
            {{$comments->links()}}
        </div>
    </div>
@endsection
