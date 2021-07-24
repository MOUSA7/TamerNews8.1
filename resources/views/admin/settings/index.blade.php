@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">عرض المنشورات</h1>
            <hr>
            <div class="float-left">
                <a href="{{route('admin.setting.create')}}"  class="btn btn-success float-right">
                    <i class="fa fa-plus"></i>
                    أضافة معلومات
                </a>

            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">عرض الأعدادات</li>

            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Social Media</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
        </tr>
        </thead>
        <tbody>
        @foreach($settings as $key=>$value)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->social_media}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->address}}</td>
                <td>{{$value->phone}}</td>
                <td>
                    <a href="{{route('admin.setting.edit',$value->id)}}" class="btn btn-sm btn-primary btn-xs">تعديل</a>
                    <a href="#" class="btn btn-sm btn-dark btn-xs">عرض</a>
                    <a href="#" class="btn btn-sm btn-danger btn-xs">حذف</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
