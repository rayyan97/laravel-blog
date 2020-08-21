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

Route::get('/', 'WelcomeController@index')->name('welcome-page');
Route::get('blog/post/{post}','SingleBlogController@index')->name('single-blog-post');
Route::get('blog/category/{category}','SingleBlogController@category')->name('single-category');
Route::get('blog/tag/{tag}','SingleBlogController@tag')->name('single-tag');

Auth::routes();



Route::middleware('auth')->group( function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('category', 'CategoryController');
Route::resource('post', 'PostConroller');
Route::resource('tag', 'TagConroller');
Route::put('restore/{post}','PostConroller@restore')->name('post.restore');
Route::get('trashed-post','PostConroller@trashed')->name('trashed-post.index');

});

Route::middleware(['auth','checkAdmin'])->group(function(){
Route::get('users','UserConroller@index')->name('user-page');
Route::post('users/{user}/make-admin', 'UserConroller@makeAdmin')->name('make-admin');
// Route::delete('users/destroy', 'UserConroller@destroy')->name('user.destroy');
Route::get('users/profile', 'UserConroller@edit')->name('users.edit-profile');
Route::put('users/profile-update','UserConroller@update')->name('users.update-profile');
});