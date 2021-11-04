<?php

use Illuminate\Support\Facades\Route;
//$post = Post::all();


Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout']);

Auth::routes();

Route::get('admin',[\App\Http\Controllers\HomeController::class,'dashboard'])
                        ->name('dashboard')
                        ->middleware('auth');

Route::prefix('admin/posts')->middleware(['auth','can:posts'])->name('admin.posts.')->group(function (){
    Route::get('/',[\App\Http\Controllers\PostController::class,'index'])->name('index');
    Route::get('create',[\App\Http\Controllers\PostController::class,'create'])->name('create');
    Route::post('create',[\App\Http\Controllers\PostController::class,'store'])->name('store');
    Route::get('{id}/edit',[\App\Http\Controllers\PostController::class,'edit'])->name('edit');
    Route::patch('{id}/edit',[\App\Http\Controllers\PostController::class,'update'])->name('update');
    Route::get('delete/{id}',[\App\Http\Controllers\PostController::class,'destroy'])->name('delete');
    Route::get('{id}/show',[\App\Http\Controllers\PostController::class,'show'])->name('show');
    Route::get('/trash',[\App\Http\Controllers\PostController::class,'trashed'])->name('trash');
    Route::get('search',[\App\Http\Controllers\PostController::class,'search'])->name('search');
    Route::put('/approve/{id}',[\App\Http\Controllers\PostController::class,'approve'])->name('approve');
    Route::put('/draft/{id}',[\App\Http\Controllers\PostController::class,'draft'])->name('draft');
    Route::get('/control',[\App\Http\Controllers\PostController::class,'control'])->name('control');

});

Route::resource('admin/comments',\App\Http\Controllers\CommentController::class,['names'=>[
    'index'=>'admin.comments.index',
    'create'=>'admin.comments.create',
    'edit'=>'admin.comments.edit',
    Route::post('admin/comments/store/{post}',[\App\Http\Controllers\CommentController::class,'store'])->name('admin.comments.store')
]]);

Route::resource('admin/comments/replies',\App\Http\Controllers\ReplayController::class,['names'=>[
    'index'=>'admin.replies.index',
    'create'=>'admin.replies.create',
    'edit'=>'admin.replies.edit',
    Route::post('admin/replies/store/{comment}',[\App\Http\Controllers\ReplayController::class,'store'])->name('admin.replies.store')

]]);

Route::resource('admin/users',\App\Http\Controllers\UserController::class,['names'=>[
    'index'=>'admin.users.index',
    'create'=>'admin.users.create',
    'show'=>'admin.users.show',
    'edit'=>'admin.users.edit',
    Route::get('admin/users/{id}/delete',[\App\Http\Controllers\UserController::class,'destroy'])->name('admin.users.delete')
]])->middleware('auth')->middleware(['auth','can:users']);

Route::resource('admin/roles',\App\Http\Controllers\RoleController::class,['names'=>[
    'index'=>'admin.roles.index',
    'create'=>'admin.roles.create',
    'show'=>'admin.roles.show',
    'edit'=>'admin.roles.edit',
    Route::get('admin/roles/{id}/delete',[\App\Http\Controllers\RoleController::class,'destroy'])->name('admin.roles.delete')
]])->middleware(['auth','can:roles']);

Route::prefix('admin/categories')->middleware(['auth'])->name('admin.categories.')->group(function (){

    Route::get('/',[\App\Http\Controllers\CategoryController::class,'index'])->name('index');
    Route::get('search',[\App\Http\Controllers\CategoryController::class,'search'])->name('search');
    Route::get('create',[\App\Http\Controllers\CategoryController::class,'create'])->name('create');
    Route::post('create',[\App\Http\Controllers\CategoryController::class,'store'])->name('store');
    Route::get('edit/{id}',[\App\Http\Controllers\CategoryController::class,'edit'])->name('edit');
    Route::put('edit/{id}',[\App\Http\Controllers\CategoryController::class,'update'])->name('update');
    Route::post('delete/{id}',[\App\Http\Controllers\CategoryController::class,'destroy'])->name('delete');

});



Route::prefix('admin/settings')->middleware(['auth','can:information'])->name('admin.setting.')->group(function (){
    Route::get('/',[\App\Http\Controllers\SettingController::class,'index'])->name('index');
    Route::get('create',[\App\Http\Controllers\SettingController::class,'create'])->name('create');
    Route::post('create',[\App\Http\Controllers\SettingController::class,'store'])->name('store');
    Route::get('edit/{id}',[\App\Http\Controllers\SettingController::class,'edit'])->name('edit');
    Route::put('edit/{id}',[\App\Http\Controllers\SettingController::class,'update'])->name('update');
});


Route::prefix('/')->name('home.')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('index');
    Route::get('/show/{id}',[\App\Http\Controllers\FrontendController::class,'show'])->name('show');
    Route::get('/category/{id}',[\App\Http\Controllers\FrontendController::class,'PostsCategory'])->name('category');
    Route::get('contact',[\App\Http\Controllers\FrontendController::class,'contact'])->name('contact');


});
Route::get('{lang}',[\App\Http\Controllers\HomeController::class,'language'])->name('language');


