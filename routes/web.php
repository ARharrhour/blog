<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
use App\Post;

Route::get('/','HomeController@index' )->name('home.page');
Route::get('/post/{post}','PostController@show' )->name('showpost');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function () {
Route::get('/admin','AdminsController@index' )->name('admin.index');
Route::get('/admin/posts','PostController@index' )->name('posts.index');
Route::get('/admin/post/create','PostController@create' )->name('post.create');
Route::post('/admin/post/store','PostController@store' )->name('post.store');
Route::delete('/admin/post/{post}','PostController@destroy' )->name('post.destroy');
Route::get('/admin/edit/{post}','PostController@edit' )->name('post.edit');
Route::patch('/admin/update/{post}','PostController@update' )->name('post.update');
Route::get('/admin/categories','CategoryController@index')->name('index.categories');
Route::post('/admin/category','CategoryController@store')->name('category.create');
Route::delete('/admin/category/{category}','CategoryController@destroy')->name('category.delete');
Route::get('/admin/category/edit/{category}','CategoryController@edit')->name('category.edit');
Route::put('/admin/category/update/{category}','CategoryController@update')->name('category.update');
Route::put('/admin/category/update/{category}','CategoryController@update')->name('category.update');
Route::put('/admin/profile/update/{id}','UserController@update')->name('user.update');
Route::get('/admin/profile/','UserController@show')->name('user.profile');
Route::get('/admin/users','UserController@index')->name('users.index');
Route::delete('/admin/users/{delete}','UserController@delete')->name('user.delete');
Route::get('/admin/users/{delete}','UserController@index');
Route::PATCH('/admin/profile/{role}/detach','UserController@detach')->name('role.detach');
Route::PATCH('/admin/profile/{role}/attach','UserController@attach')->name('role.attach');
Route::delete('/admin/profile/{role}/delete', 'UserController@userRoleDelete')->name('userRoleDelete');
Route::delete('/admin/role/{role}/delete', 'RoleController@delete')->name('role.delete');
Route::post('/admin/role/create', 'RoleController@store')->name('role.store');
Route::get('/admin/roles', 'RoleController@index')->name('index.roles');
Route::get('/admin/role/{role}/edit', 'RoleController@edit')->name('role.edit');
Route::patch('/admin/role/{role}/update', 'RoleController@update')->name('role.update');
Route::get('/admin/role/{role}/permissions', 'RoleController@rolePermissions')->name('role.permissions');
Route::patch('/admin/role/{role}/permission/{permission}/attach', 'RoleController@rolePermissionsAttach')->name('role.permissions.attach');
Route::patch('/admin/role/{role}/permission/{permission}/detach', 'RoleController@rolePermissionsDetach')->name('role.permissions.detach');
Route::delete('/admin/posts/delete/bulk','PostController@bulk')->name('bulk.delete');
});

