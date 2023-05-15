<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CountryController,SecondPageController,ThirdPageController,AdminController};
use  App\Http\Controllers\Admin\AdminAuthController;
use  App\Http\Controllers\Project\ProjectController;
use  App\Http\Controllers\Task\TaskController;
use  App\Http\Controllers\User\UserController;
use App\Http\Controllers\Client\ClientController;

Route::get('/', function () {

    return redirect('/admin/login');

});




Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
    Route::get('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
});



Route::controller(ClientController::class)->prefix('admin/dashboard/')->group(function () {
    Route::get('client', 'client')->name('client');
    Route::get('add/client', 'addClient')->name('add.client');
    Route::post('add/client', 'postAddClient')->name('post.add.client');
    Route::get('edit/client/{id}', 'editClient')->name('edit.client');
    Route::post('edit/client/{id}', 'postEditClient')->name('post.edit.client');
    Route::get('delete/client/{id}', 'delete')->name('delete.client');
})->middleware('admin');


Route::controller(UserController::class)->prefix('admin/dashboard/')->group(function () {
    Route::get('user', 'user')->name('user');
    Route::get('add/user', 'adduser')->name('add.user');
    Route::post('add/user', 'postAdduser')->name('post.add.user');
    Route::get('edit/user/{id}', 'edituser')->name('edit.user');
    Route::post('edit/user/{id}', 'postEdituser')->name('post.edit.user');
    Route::get('delete/user/{id}', 'delete')->name('delete.user');
})->middleware('admin');


Route::controller(ProjectController::class)->prefix('admin/dashboard/')->group(function () {
    Route::get('project', 'project')->name('project');
    Route::get('add/project', 'addproject')->name('add.project');
    Route::post('add/project', 'postAddproject')->name('post.add.project');
    Route::get('edit/project/{id}', 'editproject')->name('edit.project');
    Route::post('edit/project/{id}', 'postEditproject')->name('post.edit.project');
    Route::get('delete/project/{id}', 'delete')->name('delete.project');
})->middleware('admin');


Route::controller(TaskController::class)->prefix('admin/dashboard/')->group(function () {
    Route::get('task', 'task')->name('task');
    Route::get('add/task', 'addtask')->name('add.task');
    Route::post('add/task', 'postAddtask')->name('post.add.task');
    Route::get('edit/task/{id}', 'edittask')->name('edit.task');
    Route::post('edit/task/{id}', 'postEdittask')->name('post.edit.task');
    Route::get('delete/task/{id}', 'delete')->name('delete.task');
})->middleware('admin');










