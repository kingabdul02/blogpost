<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


  //
  // Route::get('/about/{name?}', function ($name = null) {
  //     return view('action.about', ['name' => $name]);
  // })->name('about');
  //
  // Route::get('/contact', function () {
  //     return view('action.contact');
  // })->name('contact');
  //
  // Route::get('/services', function () {
  //     return view('action.services');
  // })->name('services');


Route::group(['middleware' => ['web']], function(){
  Route::get('/', [
    'uses' => 'PostController@getBlogIndex',
    'as' => 'blog.index'
  ]);

  Route::get('/blog', [
    'uses' => 'PostController@getBlogIndex',
    'as' => 'blog.index'
  ]);

  Route::get('/blog/{post_id}&{end}', [
    'uses' => 'PostController@getSinglePost',
    'as' => 'blog.single'
  ]);

  // other routes
  Route::get('/about', function(){
    return view('frontend.other.about');
  })->name('about');

  Route::get('/contact', [
    'uses' => 'ContactMessageController@getContactIndex',
    'as' => 'contact'
  ]);

  Route::post('/contact/sendmail', [
    'uses' => 'ContactMessageController@postSendMessage',
    'as' => 'contact.send'
  ]);

  Route::get('/admin/login', [
    'uses' => 'AdminController@getLogin',
    'as' => 'admin.login'
  ]);

  Route::post('/admin/login', [
    'uses' => 'AdminController@postLogin',
    'as' => 'admin.login'
  ]);

  Route::group([
     'prefix' => '/admin',
     'middleware' => 'auth'
  ], function(){
    Route::get('/', [
      'uses'=> 'AdminController@getIndex',
      'as' => 'admin.index'
    ]);

    Route::get('/logout', [
      'uses' => 'AdminController@getLogout',
      'as' => 'admin.logout'
    ]);

    Route::get('/blog/posts', [
      'uses'=> 'PostController@getPostIndex',
      'as' => 'admin.blog.index'
    ]);

    Route::get('/blog/posts/{post_id}&{end}', [
      'uses'=> 'PostController@getSinglePost',
      'as' => 'admin.blog.post'
    ]);

    Route::get('/blog/posts/create', [
      'uses'=> 'PostController@getCreatePost',
      'as' => 'admin.blog.create_post'
    ]);

    Route::post('/blog/posts/create', [
      'uses'=> 'PostController@postCreatePost',
      'as' => 'admin.blog.post.create'
    ]);

    Route::get('/blog/post/{post_id}/edit', [
      'uses' => 'PostController@getUpdatePost',
      'as' => 'admin.blog.post.edit'
    ]);

    Route::post('/blog/post/update', [
      'uses' => 'PostController@postUpdatePost',
      'as' => 'admin.blog.post.update'
    ]);

    Route::get('/blog/post/{post_id}/delete', [
      'uses' => 'PostController@getDeletePost',
      'as' => 'admin.blog.post.delete'
    ]);
  });
});


Route::resource('usertype', 'UsertypeController');

Route::resource('user', 'UserController');

Route::resource('category', 'CategoryController');

Route::resource('author', 'AuthorController');

Route::resource('comment', 'CommentController')->except('destroy');

Route::resource('blogpost', 'BlogpostController');
