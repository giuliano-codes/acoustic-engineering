<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\Index as AdminIndex;
use App\Livewire\Admin\Auralization;

use App\Livewire\Admin\Place\Index as PlaceIndex;
use App\Livewire\Admin\Place\Show as PlaceShow;
use App\Livewire\Admin\Place\Create as PlaceCreate;
use App\Livewire\Admin\Place\Edit as PlaceEdit;
use App\Livewire\Admin\Place\Delete as PlaceDelete;

use App\Livewire\Admin\Building\Index as BuildingIndex;
use App\Livewire\Admin\Building\Show as BuildingShow;
use App\Livewire\Admin\Building\Create as BuildingCreate;
use App\Livewire\Admin\Building\Edit as BuildingEdit;
use App\Livewire\Admin\Building\Delete as BuildingDelete;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin', AdminIndex::class)->name('admin');
    Route::get('/admin/auralization', Auralization::class)->name('admin.auralization');
    Route::get('/admin/place', PlaceIndex::class)->name('admin.place.index');
    Route::get('/admin/place/create', PlaceCreate::class)->name('admin.place.create');
    Route::get('/admin/place/{id}', PlaceShow::class)->name('admin.place.show');
    Route::get('/admin/place/{id}/edit', PlaceEdit::class)->name('admin.place.edit');
    Route::get('/admin/place/{id}/delete', PlaceDelete::class)->name('admin.place.delete');

    Route::get('/admin/building', BuildingIndex::class)->name('admin.building.index');
    Route::get('/admin/building/create', BuildingCreate::class)->name('admin.building.create');
    Route::get('/admin/building/{id}', BuildingShow::class)->name('admin.building.show');
    Route::get('/admin/building/{id}/edit', BuildingEdit::class)->name('admin.building.edit');
    Route::get('/admin/building/{id}/delete', BuildingDelete::class)->name('admin.building.delete');
});


require __DIR__.'/auth.php';
