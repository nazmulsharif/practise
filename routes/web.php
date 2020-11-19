<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontEnd\PagesController;
use App\Http\Controllers\backEnd\UserController;
use App\Http\Controllers\backEnd\LogoController;
use App\Http\Controllers\backEnd\SliderController;
use App\Http\Controllers\backEnd\RecentWorksCategoryController;
use App\Http\Controllers\backEnd\RecentWorksController;
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


 /*---FrontEnd Routes Start ------------ --------------------*/
  Route::get('/',[PagesController::class,'index'])->name('frontEnd.home');
 Route::prefix('frontEnd')->group(function(){

	 Route::get('about-us',[PagesController::class,'about'])->name('frontEnd.about_us');
	 Route::get('services',[PagesController::class,'services'])->name('frontEnd.services');
	 Route::get('blog',[PagesController::class,'blog'])->name('frontEnd.blog');
	 Route::get('contact',[PagesController::class,'contact'])->name('frontEnd.contact');
 });


 /*---------------------FrontEnd Routes End ------------ */


 /*---BackEnd Routes Start ------------ --------------------*/


/*------------------ user Routes Start---------------*/
 Route::prefix('user')->group(function(){
 	Route::get('manage',[UserController::class, 'index'])->name('user.manage');
 	Route::get('add',[UserController::class, 'create'])->name('user.add');
 	Route::post('store',[UserController::class, 'store'])->name('user.store');
 	Route::get('edit/{id}',[UserController::class, 'edit'])->name('user.edit');
 	Route::post('update/{id}',[UserController::class, 'update'])->name('user.update');
 	Route::get('delete/{id}',[UserController::class, 'destroy'])->name('user.delete');
 	Route::get('show/{id}',[UserController::class, 'show'])->name('user.profile');
 	Route::get('change-password/{id}',[UserController::class, 'changePassword'])->name('user.password.change');
 	Route::post('update-password/{id}',[UserController::class, 'updatePassword'])->name('user.password.update');
 	Route::post('status/{id}',[UserController::class, 'statusChange'])->name('user.status');
 });
/*------------------ user Routes End---------------*/

/*------------------ Logo Routes Start---------------*/
Route::prefix('logo')->group(function(){
 	Route::get('manage',[logoController::class, 'index'])->name('logo.manage');
 	Route::get('create',[logoController::class, 'create'])->name('logo.create');
 	Route::post('store',[logoController::class, 'store'])->name('logo.store');
 	Route::get('edit/{id}',[logoController::class, 'edit'])->name('logo.edit');
 	Route::post('update/{id}',[logoController::class, 'update'])->name('logo.update');
 	Route::get('delete/{id}',[logoController::class, 'destroy'])->name('logo.delete');
 	Route::post('status/{id}',[logoController::class, 'statusChange'])->name('logo.status');
 });
/*------------------ Logo Routes End---------------*/

/*------------------ Slider Routes Start---------------*/
Route::prefix('slider')->group(function(){
 	Route::get('manage',[SliderController::class, 'index'])->name('slider.manage');
 	Route::get('create',[SliderController::class, 'create'])->name('slider.create');
 	Route::post('store',[SliderController::class, 'store'])->name('slider.store');
 	Route::get('edit/{id}',[SliderController::class, 'edit'])->name('slider.edit');
 	Route::post('update/{id}',[SliderController::class, 'update'])->name('slider.update');
 	Route::get('delete/{id}',[SliderController::class, 'destroy'])->name('slider.delete');
 	Route::post('status/{id}',[SliderController::class, 'statusChange'])->name('slider.status');
 	Route::get('trash',[SliderController::class, 'trash'])->name('slider.trash');
 	Route::get('restore/{id}',[SliderController::class, 'restore'])->name('slider.restore');
 });
/*------------------ Slider Routes End---------------*/

Route::prefix('aboutSection')->group(function(){
    Route::get('manage',[\App\Http\Controllers\backEnd\AboutSectionController::class, 'index'])->name('aboutSection.manage');
    Route::get('create',[\App\Http\Controllers\backEnd\AboutSectionController::class, 'create'])->name('aboutSection.create');
    Route::post('store',[\App\Http\Controllers\backEnd\AboutSectionController::class, 'store'])->name('aboutSection.store');
    Route::get('edit/{id}',[\App\Http\Controllers\backEnd\AboutSectionController::class, 'edit'])->name('aboutSection.edit');
    Route::post('update/{id}',[\App\Http\Controllers\backEnd\AboutSectionController::class, 'update'])->name('aboutSection.update');
    Route::get('delete/{id}',[\App\Http\Controllers\backEnd\AboutSectionController::class, 'destroy'])->name('aboutSection.delete');
    Route::post('status/{id}',[\App\Http\Controllers\backEnd\AboutSectionController::class, 'statusChange'])->name('aboutSection.status');
    Route::get('trash',[\App\Http\Controllers\backEnd\AboutSectionController::class, 'trash'])->name('aboutSection.trash');
    Route::get('restore/{id}',[\App\Http\Controllers\backEnd\AboutSectionController::class, 'restore'])->name('aboutSection.restore');
});
/*------------------ aboutSection Routes End---------------*/

Route::prefix('recentWorksCategory')->group(function(){
    Route::get('manage',[\App\Http\Controllers\backEnd\RecentWorksCategoryController::class, 'index'])->name('recentWorksCategory.manage');
    Route::get('create',[\App\Http\Controllers\backEnd\RecentWorksCategoryController::class, 'create'])->name('recentWorksCategory.create');
    Route::post('store',[\App\Http\Controllers\backEnd\RecentWorksCategoryController::class, 'store'])->name('recentWorksCategory.store');
    Route::get('edit/{id}',[\App\Http\Controllers\backEnd\RecentWorksCategoryController::class, 'edit'])->name('recentWorksCategory.edit');
    Route::post('update/{id}',[\App\Http\Controllers\backEnd\RecentWorksCategoryController::class, 'update'])->name('recentWorksCategory.update');
    Route::get('delete/{id}',[\App\Http\Controllers\backEnd\RecentWorksCategoryController::class, 'destroy'])->name('recentWorksCategory.delete');
    Route::post('status/{id}',[\App\Http\Controllers\backEnd\RecentWorksCategoryController::class, 'statusChange'])->name('recentWorksCategory.status');
    Route::get('trash',[\App\Http\Controllers\backEnd\RecentWorksCategoryController::class, 'trash'])->name('recentWorksCategory.trash');
    Route::get('restore/{id}',[\App\Http\Controllers\backEnd\RecentWorksCategoryController::class, 'restore'])->name('recentWorksCategory.restore');
});
/*------------------ recentWorksCategory Routes End---------------*/

Route::prefix('recentWorks')->group(function(){
    Route::get('manage',[\App\Http\Controllers\backEnd\RecentWorksController::class, 'index'])->name('recentWorks.manage');
    Route::get('create',[\App\Http\Controllers\backEnd\RecentWorksController::class, 'create'])->name('recentWorks.create');
    Route::post('store',[\App\Http\Controllers\backEnd\RecentWorksController::class, 'store'])->name('recentWorks.store');
    Route::get('edit/{id}',[\App\Http\Controllers\backEnd\RecentWorksController::class, 'edit'])->name('recentWorks.edit');
    Route::post('update/{id}',[\App\Http\Controllers\backEnd\RecentWorksController::class, 'update'])->name('recentWorks.update');
    Route::get('delete/{id}',[\App\Http\Controllers\backEnd\RecentWorksController::class, 'destroy'])->name('recentWorks.delete');
    Route::post('status/{id}',[\App\Http\Controllers\backEnd\RecentWorksController::class, 'statusChange'])->name('recentWorks.status');
    Route::get('trash',[\App\Http\Controllers\backEnd\RecentWorksController::class, 'trash'])->name('recentWorks.trash');
    Route::get('restore/{id}',[\App\Http\Controllers\backEnd\RecentWorksController::class, 'restore'])->name('recentWorks.restore');
});
/*------------------ recentWorksCategory Routes End---------------*/
  /*---BackEnd Routes End ------------ --------------------*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
