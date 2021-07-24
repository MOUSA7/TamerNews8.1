@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">أضافة المعلومات</h1>
            <hr>
            <div class="float-left">

            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">المعلومات العامة</li>

            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')

    <x-form :action="route('admin.setting.store')" >
        <div class="row" >
            <div class="col-sm-6">
                <div class="card-body">
{{--                    @input(['type'=>'text','title'=>'القسم :','name'=>'sidebar[]','class'=>'form-control'])--}}
                    @input(['type'=>'text','title'=>'عنوان الشركة :','name'=>'address','class'=>'form-control'])
                    @input(['type'=>'email','title'=>'البريد الألكتروني :','name'=>'email','class'=>'form-control'])
{{--                    @select(['name'=>'category_id','class'=>'form-control','elements'=>$categories ])--}}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card-body">
                @input(['type'=>'text','title'=>'الهاتف :','name'=>'phone','class'=>'form-control'])
                @input(['type'=>'text','title'=>'صفحة الفيسبوك:','name'=>'social_media','class'=>'form-control'])
                </div>
            </div>

        </div>
        <div class="text-center">
            @input(['type'=>'submit','value'=>'Save','class'=>'btn btn-primary col-sm-6 '])
        </div>

    </x-form>
@endsection
