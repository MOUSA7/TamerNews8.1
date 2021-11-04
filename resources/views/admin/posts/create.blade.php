@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">أضافة خبر</h1>
            <hr>
            <div class="float-left">

            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">أضافة خبر</li>

            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')

    <x-form :action="route('admin.posts.store')" >
        <div class="row">
            <div class="col-sm-8">
                <div class="card-body">
                    @input(['type'=>'text','title'=>'عنوان الخبر :','name'=>'title','class'=>'form-control'])
                    @textarea(['title'=>'المحتوى :','name'=>'content','class'=>'form-control'])
                    @select(['name'=>'category_id','class'=>'form-control','elements'=>$categories])
                    @input(['type'=>'checkbox','name'=>'slider','title'=>'السلايدر :','class'=>'form-check d-inline','value'=>1])
                    @input(['type'=>'submit','value'=>'Save','class'=>'btn btn-primary'])
                </div>
            </div>

            <div class="col-sm-4">
                <img src="{{url(asset('images/Placeholder.png'))}}" alt=""
                     height="70%" width="100%">
                <hr>
                @input(['type'=>'file','name'=>'photo'])
            </div>
        </div>
    </x-form>
@endsection
