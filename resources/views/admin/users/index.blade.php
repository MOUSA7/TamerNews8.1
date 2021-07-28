@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">عرض المستخدمين</h1>
            <hr>
            <div class="float-left">
                <a href="{{route('admin.users.create')}}"  class="btn btn-success float-right">
                    <i class="fa fa-plus"></i>
                    أضافة مستخدم
                </a>

            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">عرض المستخدمين</li>

            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">البريد الالكتروني</th>
            <th scope="col">الصورة</th>
            <th scope="col">الصلاحية</th>
            <th scope="col">العمليات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key=>$user)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <img src="{{$user->photo?url($user->photo->file) :url(asset('images/Placeholder.png'))}}" alt=""
                         height="45px" width="50px">
                </td>
                <td>{{$user->role->name}}</td>
                <td>
                    <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-sm btn-primary btn-xs">تعديل</a>
                    <a href="{{route('admin.users.show',$user->id)}}" class="btn btn-sm btn-info btn-xs">عرض</a>
                    <a href="{{route('admin.users.delete',$user->id)}}" class="btn btn-sm btn-danger btn-xs">حذف</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
