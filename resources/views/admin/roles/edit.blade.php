@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">أضافة صلاحية</h1>
            <hr>
            <div class="float-left">

            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">أضافة صلاحية</li>

            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
<style>
    span {
        margin-left: 50px;
    }

    .form-inline {
        background-color: yellow !important;
        display: block;
    }
</style>
@section('content')

    <x-form :action="route('roles.update',$role->id)">
        @method('PATCH')
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">
                    @input(['type'=>'text','value'=>$role->name,'title'=>'أسم الصلاحية :','name'=>'name','class'=>'form-control'])
                    @input(['type'=>'submit','value'=>'Save','class'=>'btn btn-primary'])
                </div>


            </div>

            <div class="col-sm-6">
                @foreach(config('glopal.permissions') as $key=>$value)
                    <div class="form-group">
                        <label for="">
                            <input type="checkbox" class="chk-box" name="permissions[]" value="{{$key}}" {{in_array($key,$role->permissions)?'checked':''}}>
                            {{$value}}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </x-form>
@endsection
