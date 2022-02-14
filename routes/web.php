<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
// use App\HTTP\Controllers\UserController;


Route::get('/testing/test', [App\Http\Controllers\Testing::class, 'index_tasks'])->name('index_testing');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login',function() { return view('auth.login');  })->name('login');
Route::get('/register', function () {  return view('auth/register'); })->name('signup');
Route::get('/register', [App\Http\Controllers\CountryController::class, 'country'])->name('signup');
Route::post('/register_post', [App\Http\Controllers\RegisterBlogController::class, 'store'])->name('register_post');
Route::get('/admin/new_post', [App\Http\Controllers\RegisterBlogController::class, 'new_post'])->name('new_post');

Route::get('/post_details/{post_id}', [App\Http\Controllers\RegisterBlogController::class, 'post_details'])->name('post_details');


Route::get('/about_us', [App\Http\Controllers\RegisterBlogController::class, 'about'])->name('about_us');
Route::get('/deep_learning', [App\Http\Controllers\RegisterBlogController::class, 'deep_learning'])->name('deep_learning');
Route::get('/computer_vision', [App\Http\Controllers\RegisterBlogController::class, 'computer_vision'])->name('computer_vision');
Route::get('/machine_learning', [App\Http\Controllers\RegisterBlogController::class, 'machine_learning'])->name('machine_learning');
Route::get('/data_science', [App\Http\Controllers\RegisterBlogController::class, 'data_science'])->name('data_science');
Route::get('/data_visualization', [App\Http\Controllers\RegisterBlogController::class, 'data_visualization'])->name('data_visualization');


//Authenticate Routes Login
Route::post('/dashboard', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('signin');

Route::group(['middleware' => ['auth']], function() {

//Authenticate Routes Logout
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/Validate/post' ,[App\Http\Controllers\Auth\RegisterController::class, 'validate_Register'])->name('RegisterController.validate');
Route::post('/Validate/user' ,[App\Http\Controllers\Auth\RegisterController::class, 'validate_User'])->name('RegisterController.validatesusername');

Route::resource('roles', RoleController::class);

Route::resource('users', UserController::class);

Route::middleware('auth')->group(function () {
Route::get('/user_profile', [App\Http\Controllers\user_profile_controller::class, 'user_profile'])->name('user_profile');
Route::PATCH('/users/{id}', [App\Http\Controllers\user_profile_controller::class, 'update'])->name('users_profile.update');
Route::get('/check_password', [App\Http\Controllers\user_profile_controller::class, 'check_validity_strength'])->name('check_password');

    });
}
);
