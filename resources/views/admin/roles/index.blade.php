@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">عرض الصلاحيات</h1>
            <hr>
            <div class="float-left">
                <a href="{{route('admin.roles.create')}}"  class="btn btn-success float-right">
                    <i class="fa fa-plus"></i>
                    أضافة صلاحية
                </a>

            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">عرض الصلاحيات</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">الصلاحية</th>
            <th scope="col">الأذونات</th>
            <th scope="col">العمليات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $key=>$role)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$role->name}}</td>
                <td class="badge badge-info">
                   [ {{implode(' | ',$role->permissions)}} ]
                </td>
                <td>
                    <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-sm btn-primary btn-xs">تعديل</a>
                    <a href="{{route('admin.roles.show',$role->id)}}" class="btn btn-sm btn-dark btn-xs">عرض</a>
                    <a href="{{route('admin.roles.delete',$role->id)}}" class="btn btn-sm btn-danger btn-xs">حذف</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
