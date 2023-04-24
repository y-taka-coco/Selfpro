
<?php
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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CulculateController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\UsersController;

Route::group(['middleware'=>['can:admin']],function(){
Route::get('admin_top', [UsersController::class,'index']);

Route::get('users/{user}/edit',[UsersController::class,'edit'])->name('users.edit');
Route::post('users/{user}/edit',[UsersController::class,'update'])->name('users.update');
Route::post('admin_top', [HomeController::class,'ajaxroute'])->name('ajaxpost');
});


Auth::routes();
Route::group(['middleware'=>'auth'],function(){
//Route::get('/',function () {return view('top');});
Route::get('/', [HomeController::class,'index']);




Route::resource('grades', 'GradeController');
Route::resource('maps', 'MapController');

Route::get('users/{user}/image',[UsersController::class,'useredit'])->name('users.useredit');
Route::post('users/{user}/image',[UsersController::class,'userupdate'])->name('users.userupdate');


Route::get('culculate/create', [CulculateController::class,'create'])->name('culculate.create');
Route::get('culculate',[CulculateController::class,'index'])->name('culculate.index');
Route::get('culculate/{culculate}',[CulculateController::class,'show'])->name('culculate.show');
Route::get('culculate/{culculate}/edit',[CulculateController::class,'edit'])->name('culculate.edit');
Route::post('culculate/{culculate}/edit',[CulculateController::class,'update'])->name('culculate.update');
Route::post('culculate/{culculate}',[CulculateController::class,'destroy'])->name('culculate.delete');

});