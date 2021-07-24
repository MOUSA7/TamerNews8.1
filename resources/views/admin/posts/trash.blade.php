@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-8">
            <h1 class="m-0 text-dark">المنشورات المؤرشفة</h1>
            <hr>
            @search(['route'=>route('admin.posts.search'),'start'=>'start','end'=>'end','id'=>'date'])
        </div><!-- /.col -->

        <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">المنشورات المؤرشفة</li>

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
            <th scope="col">التاريخ </th>
            <th scope="col">العمليات</th>
        </tr>
        </thead>
        <tbody>
        @if(session('status'))
            <div class="alert alert-danger">{{session('status')}}</div>

        @else

            @forelse($posts as $key=>$post)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{Str::limit($post->title,30)}}</td>
                    <td>{{Str::limit($post->content,30)}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('admin.posts.edit',['id'=>$post->id])}}" class="btn btn-sm btn-primary btn-xs">Restore</a>


                    </td>
                </tr>
            @empty
                <h3 class="text-center">Not Found Data</h3>
            @endforelse

        @endif


        </tbody>
    </table>

@endsection
