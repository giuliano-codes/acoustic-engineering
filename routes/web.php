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

use App\Livewire\Admin\Room\Index as RoomIndex;
use App\Livewire\Admin\Room\Show as RoomShow;
use App\Livewire\Admin\Room\Create as RoomCreate;
use App\Livewire\Admin\Room\Edit as RoomEdit;
use App\Livewire\Admin\Room\Delete as RoomDelete;

use App\Livewire\Admin\Measurement\Index as MeasurementIndex;
use App\Livewire\Admin\Measurement\Show as MeasurementShow;
use App\Livewire\Admin\Measurement\Create as MeasurementCreate;
use App\Livewire\Admin\Measurement\Edit as MeasurementEdit;
use App\Livewire\Admin\Measurement\Delete as MeasurementDelete;

use App\Livewire\Admin\HRTF\Index as HRTFIndex;
use App\Livewire\Admin\HRTF\Show as HRTFShow;
use App\Livewire\Admin\HRTF\Create as HRTFCreate;
use App\Livewire\Admin\HRTF\Edit as HRTFEdit;
use App\Livewire\Admin\HRTF\Delete as HRTFDelete;
use App\Models\Building;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;

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

Route::get('/auralization', function () {
    return view('auralization', ['places' => Place::all()]);
})->name('auralization');

Route::get('/auralization/place/{id}', function ($id) {
    return view('place', ['place' => Place::findOrFail($id)]);
})->name('place');

Route::get('/auralization/building/{id}', function ($id) {
    return view('building', ['building' => Building::findOrFail($id)]);
})->name('building');

Route::get('/auralization/room/{id}', function ($id) {
    $songs = Storage::disk('public')->files('songs');
    return view('room', ['room' => Room::findOrFail($id), 'songs' => $songs]);
})->name('room');

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

    Route::get('/admin/room', RoomIndex::class)->name('admin.room.index');
    Route::get('/admin/room/create', RoomCreate::class)->name('admin.room.create');
    Route::get('/admin/room/{id}', RoomShow::class)->name('admin.room.show');
    Route::get('/admin/room/{id}/edit', RoomEdit::class)->name('admin.room.edit');
    Route::get('/admin/room/{id}/delete', RoomDelete::class)->name('admin.room.delete');

    Route::get('/admin/measurement', MeasurementIndex::class)->name('admin.measurement.index');
    Route::get('/admin/measurement/create', MeasurementCreate::class)->name('admin.measurement.create');
    Route::get('/admin/measurement/{id}', MeasurementShow::class)->name('admin.measurement.show');
    Route::get('/admin/measurement/{id}/edit', MeasurementEdit::class)->name('admin.measurement.edit');
    Route::get('/admin/measurement/{id}/delete', MeasurementDelete::class)->name('admin.measurement.delete');

    Route::get('/admin/hrtf', HRTFIndex::class)->name('admin.hrtf.index');
    Route::get('/admin/hrtf/create', HRTFCreate::class)->name('admin.hrtf.create');
    Route::get('/admin/hrtf/{id}', HRTFShow::class)->name('admin.hrtf.show');
    Route::get('/admin/hrtf/{id}/edit', HRTFEdit::class)->name('admin.hrtf.edit');
    Route::get('/admin/hrtf/{id}/delete', HRTFDelete::class)->name('admin.hrtf.delete');
});


require __DIR__.'/auth.php';
