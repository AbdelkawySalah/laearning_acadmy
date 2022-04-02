<?php

use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\HomepageController;
use App\Http\Controllers\FrontEnd\CourseController;
use App\Http\Controllers\FrontEnd\MessageController;
use Illuminate\Support\Facades\Route;


Route::group(['namespace'=>'FrontEnd'],function(){
    Route::get('/',[HomepageController::class,'index'])->name('front.homepage');
    Route::get('/cat/{id}',[CourseController::class,'showcourses'])->name('front.coursescat');
    Route::get('/cat/{c_id}/course/{cours_id}',[CourseController::class,'showcourse'])->name('front.showcourse');
    Route::get('/contact',[ContactController::class,'index'])->name('front.contact');
    Route::post('/message/newsletter',[MessageController::class,'newsletter'])->name('front.message.newsletter');
    Route::post('/message/contactus',[MessageController::class,'contactus'])->name('front.message.contactus');
    Route::post('/message/enroll',[MessageController::class,'enroll'])->name('front.message.enroll');


});