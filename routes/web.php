<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUser;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\posts;
use App\Models\User;
use Illuminate\Support\Facades\App;


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


Route::get('/',[AuthUser::class ,'index'])->middleware('notlog')->name('login');
Route::post('login',[AuthUser::class ,'login'])->middleware('notlog');
Route::get('/register',[AuthUser::class ,'register'])->middleware('notlog');
Route::post('/auth/register',[AuthUser::class ,'auth_register']);
Route::middleware(['auth'])->group(function () {

// Route::get('/dasboard',function($mess=null){
    //     return view('dashboard')->with('mess',$mess);
    // })->middleware('login');
    

Route::get('/dasboard/{lang?}',function($lang=null){
    App::setLocale($lang);
    return app(AuthUser::class)->dashboard();
})->middleware('login');
    


Route::any('/logout',function(){
    Auth::logout();
    
    return redirect('/');
    
   
    
});
Route::get('/user',function(){
    $user=User::all();
    echo '<pre>';
    print_r($user->toArray());
    echo '</pre>';
});


Route::get('/userData',[UsersController::class,'index'])->middleware('login');
Route::post('/update/{id}',[UsersController::class,'update']);
Route::get('/createPost',[posts::class,'index'])->middleware('login');
Route::post('/createPost',[posts::class,'handlePost'])->middleware('login');
Route::get('/post/delete/{id}',[posts::class,'deletePost'])->name('delete.post')->middleware('login');
Route::get('/post/edit/{id}',[posts::class,'editPost'])->name('edit.post')->middleware('login');
Route::post('/post/edit/{id}',[posts::class,'updatePost'])->name('update.post')->middleware('login');
Route::post('/update_status/{id}',[Posts::class,'updatestatus'])->middleware('login');;

Route::get('/post/admin/delete/{id}',[posts::class,'admin_deletePost'])->name('admin.delete.post')->middleware('login');
Route::get('/post/admin/edit/{id}',[posts::class,'admin_editPost'])->name('admin.edit.post')->middleware('login');
Route::post('/post/admin/edit/{id}',[posts::class,'admin_updatePost'])->name('admin.update.post')->middleware('login');});
