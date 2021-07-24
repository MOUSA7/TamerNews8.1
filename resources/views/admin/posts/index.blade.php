@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">عرض المنشورات</h1>
            <hr>
            <div class="float-left">
                <a href="{{route('admin.posts.create')}}"  class="btn btn-success float-right">
                    <i class="fa fa-plus"></i>
                    أضافة خبر
                </a>

                <a href="{{route('admin.posts.create')}}"  class="btn btn-danger float-right">
                    <i class="fa fa-plus"></i>
                    التحكم في المشورات
                </a>

            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">عرض المنشورات</li>

            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">العنوان</th>
            <th scope="col">المحتوى</th>
            <th scope="col">أسم المستخدم</th>
            <th scope="col">العمليات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key=>$post)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{Str::limit($post->title,30)}}</td>
            <td>{{Str::limit($post->content,30)}}</td>
            <td>{{$post->user ? $post->user->name : 'No User'}}</td>
            <td>
                <a href="{{route('admin.posts.edit',['id'=>$post->id])}}" class="btn btn-sm btn-primary btn-xs">تعديل</a>
                <a href="{{route('admin.posts.show',['id'=>$post->id])}}" class="btn btn-sm btn-dark btn-xs">عرض</a>
                <a href="{{route('admin.posts.delete',['id'=>$post->id])}}" class="btn btn-sm btn-danger btn-xs">حذف</a>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        <div class="mx-auto">
            {{$posts->links()}}
        </div>
    </div>
@endsection
