@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">تعديل الخبر</h1>
            <hr>
            <div class="float-left">

            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">تعديل خبر</li>

            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')

    <x-form :action="route('admin.posts.update',$post->id)" >
       @method('PATCH')
        <div class="row">
            <div class="col-sm-8">
                <div class="card-body">
                    <input type="hidden" name="edit_id" value="{{$post->id}}">
                    @input(['type'=>'text','title'=>'عنوان الخبر :','value'=>$post->title,'name'=>'title','class'=>'form-control'])
                    @textarea(['title'=>'المحتوى :','value'=>$post->content,'name'=>'content','class'=>'form-control'])
                    @select(['name'=>'category_id','class'=>'form-control','items'=>$categories,'CategoryId'=>$post->category_id])
                    @input(['type'=>'checkbox','name'=>'slider','title'=>'سلايدر :','class'=>'form-check d-inline','value'=>$post->slider ==1?'checked':0])
                    @input(['type'=>'submit','value'=>'Save','class'=>'btn btn-primary'])
{{--                    @error('name')--}}
{{--                    <p class="text-danger">{{$message}}</p>--}}
{{--                    @enderror--}}
                </div>
            </div>

            <div class="col-sm-4">
{{--                <h4>{{url($post->Photo->path)}}</h4>--}}
                <img src="{{$post->Photo ? url(asset($post->Photo->path)):url(asset('images/Placeholder.png'))}}" alt=""
                     height="70%" width="100%">
                <hr>
                @input(['type'=>'file','name'=>'photo'])
            </div>
        </div>
    </x-form>
@endsection
