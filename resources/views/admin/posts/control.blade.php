@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">التحكم في المنشورات</h1>
            <hr>

        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">عرض المنشورات</li>

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
            <th scope="col">أسم المستخدم</th>
            <th scope="col">الصلاحية</th>
            <th scope="col">التاريخ</th>
            <th scope="col">العمليات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key=>$post)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{Str::limit($post->title,30)}}</td>
                <td>{{$post->user ? $post->user->name : 'No User'}}</td>
                <td>{{$post->user->role ? $post->user->role->name :'Nothing'}}</td>
                <td>
                    @if($post->status == 0)
                    <x-form :action="route('admin.posts.approve',$post->id)">
                        @method('put')
                    <i class="fas fa-check-circle form-inline">&nbsp;
                        @input(['type'=>'submit','value'=>'Approve','class'=>'btn btn-sm btn-success'])
                    </i>
                    </x-form>
                    @else
                        <x-form :action="route('admin.posts.draft',$post->id)">
                            @method('put')
                            <li class="fas fa-times-circle form-inline">&nbsp;
                                @input(['type'=>'submit','value'=>'Draft','class'=>'btn btn-sm btn-dark'])
                            </li>

                        </x-form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        <div class="mx-auto">
            {{$posts->links()}}
        </div>
    </div>
@endsection
