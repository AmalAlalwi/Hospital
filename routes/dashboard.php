<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\ProfileController;
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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    //################################ dashboard user ##########################################
    Route::get('/dashboard/user', function () {
    return view('dashboard.user.dashboard');
})->middleware(middleware: ['auth:web'])->name('dashboard.user');
    //################################ end dashboard user #####################################



    //################################ dashboard admin ########################################
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin.dashboard');
    })->middleware(middleware: ['auth:admin'])->name('dashboard.admin');
    //################################ end dashboard admin #####################################

    //-----------------------------------------------------------------------------------------------
    Route::middleware(['auth:admin'])->group(callback: function () {
        //############################# sections route ##########################################
        Route::resource('sections', SectionController::class);
        //############################# end sections route ######################################


        //############################# doctors route ##########################################
        Route::resource('doctors', DoctorController::class);
        //############################# end doctors route ######################################

    });


    require __DIR__.'/auth.php';
});

