<?php

use App\Http\Controllers\ProfileController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\CategoryController;
use  App\Http\Controllers\ProductController;

use  App\Http\Controllers\RoleController;
use  App\Http\Middleware\CheckStatus;




use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    Storage::disk('users_images')->put('test.txt','hi');
    return'ok';
});*/
Route::group(['middleware'=>['guest']],function(){
Route::get('/', function () {
    return view('auth.login');
});
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...

 
Route::get( '/home',function(){
    return view('index'); 
})->name('home') ->middleware('CheckStatus');

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified','CheckStatus'])->name('dashboard');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
});
    
Route::resource('category',CategoryController::class);
Route::resource('product',ProductController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
});

require __DIR__.'/auth.php';
