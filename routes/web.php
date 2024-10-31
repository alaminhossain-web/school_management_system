<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\DressCodeController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\NoticeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Admin\WhyUsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resources([
        'permission' => PermissionController::class,
        'role' => RoleController::class,
        'user'=>UserController::class,
        'dress'=>DressCodeController::class,
        'video-gallery'=>VideoGalleryController::class,
        'photo-gallery'=>PhotoGalleryController::class,
        'notice'=>NoticeController::class,
        'event'=>EventController::class,
        'why-us'=>WhyUsController::class,
        'about'=>AboutController::class
    ]);
});

require __DIR__.'/auth.php';
