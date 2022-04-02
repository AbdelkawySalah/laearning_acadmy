<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TrainerController;

Route::namespace('Admin')->prefix('dashboard')->group(function(){
    Route::get('/login',[AuthController::class,'login'])->name('admin.login');
    Route::post('/dologin',[AuthController::class,'dologin'])->name('admin.doLogin');
   
   Route::middleware('Adminauth')->group(function(){
        Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');
        Route::get('/',[HomeController::class,'index'])->name('admin.home');

     //Categoriyes

     Route::group(['prefix'=>'cats'],function(){
      Route::get('/',[CatController::class,'index'])->name('admin.cat.index');
      Route::get('/create',[CatController::class,'create'])->name('admin.cat.create');
      Route::post('/store',[CatController::class,'store'])->name('admin.cat.store');
      Route::get('/edit/{id}',[CatController::class,'edit'])->name('admin.cat.edit');
      Route::post('/update',[CatController::class,'update'])->name('admin.cat.update');
      Route::get('/delete/{id}',[CatController::class,'destroy'])->name('admin.cat.delete');

     }); 
    

        //Triners
       Route::get('/trainers',[TrainerController::class,'index'])->name('admin.trainer.index');
       Route::get('/trainers/create',[TrainerController::class,'create'])->name('admin.trainer.create');
       Route::post('/trainers/store',[TrainerController::class,'store'])->name('admin.trainer.store');
       Route::get('/trainers/edit/{id}',[TrainerController::class,'edit'])->name('admin.trainer.edit');
       Route::post('/trainers/update',[TrainerController::class,'update'])->name('admin.trainer.update');
       Route::get('/trainers/delete/{id}',[TrainerController::class,'destroy'])->name('admin.trainer.delete');

   Route::prefix('course')->group(function(){
       Route::get('/',[CourseController::class,'index'])->name('admin.course.index');
       Route::get('/create',[CourseController::class,'create'])->name('admin.course.create');
       Route::post('/store',[CourseController::class,'store'])->name('admin.course.store');

       Route::get('/edit/{id}',[CourseController::class,'edit'])->name('admin.course.edit');
       Route::post('/update',[CourseController::class,'update'])->name('admin.course.update');

       Route::get('/delete/{id}',[CourseController::class,'delete'])->name('admin.course.delete');


      });


   });

});