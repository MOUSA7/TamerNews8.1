@extends('admin.layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                    @input(['type'=>'text','title'=>'عنوان :','name'=>'name','class'=>'form-control'])
                    @input(['type'=>'submit','value'=>'Save','class'=>'btn btn-primary'])
                </div>
            </div>

        </div>
    </x-form>
@endsection

