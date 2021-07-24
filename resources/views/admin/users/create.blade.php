@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">أضافة مستخدم</h1>
            <hr>
            <div class="float-left">

            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">أضافة مستخدم</li>

            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')

    <x-form :action="route('users.store')" >
        <div class="row">
            <div class="col-sm-8">
                <div class="card-body">
                    @input(['type'=>'text','title'=>'أسم المستخدم :','name'=>'name','class'=>'form-control'])
                    @input(['type'=>'email','title'=>'البريد الالكتروني :','name'=>'email','class'=>'form-control'])
                    @select(['name'=>'role_id','class'=>'form-control','elements'=>$roles])
{{--                    @select(['name'=>'role_id','class'=>'form-control','elements'=>Arr::pluck($roles,'name')])--}}
                    @input(['type'=>'password','title'=>'كلمة المرور :','name'=>'password','class'=>'form-control'])
                    @input(['type'=>'submit','value'=>'Save','class'=>'btn btn-primary'])
                </div>
            </div>

            <div class="col-sm-4">
                <img src="https://knetic.org.uk/wp-content/uploads/2020/07/Pcture-Placeholder-1024x684.png" alt=""
                     height="70%" width="100%">
                <hr>
                @input(['type'=>'file','name'=>'photo_id'])
            </div>
        </div>
    </x-form>
@endsection
