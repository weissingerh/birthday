<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('$2y$10$2Fg3xK6T2qS2YNbx8j1uYOvvStwhfABFMto5Ei10IZDwiPkoxjUNe', [Controller::class, 'admin'])->name('admin');

Route::prefix('guest')->group(function () {
    Route::get('{guest}', [GuestController::class, 'show'])->name('guest.show');
    Route::post('update/{guest}', [GuestController::class, 'update']);

    Route::get('sad/{guest}', [GuestController::class, 'notComing'])->name('guest.notcoming');

    Route::get('draw/{guest}', [GuestController::class, 'draw'])->name('guest.draw');
    Route::post('draw/{guest}', [GuestController::class, 'saveDrawing'])->name('guest.draw.save');

    Route::get('thanks/{guest}', [GuestController::class, 'thanks'])->name('guest.thanks');
});
