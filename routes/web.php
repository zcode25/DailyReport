<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectDetailController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ProjectController::class)->group(function() {
    Route::get('/project', 'index')->name('project.index')->middleware('auth');
    Route::get('/project/add', 'add')->name('project.add')->middleware('auth');
    Route::post('/project/save', 'save')->name('project.save')->middleware('auth');
    Route::get('/project/edit/{project:projectId}', 'edit')->name('project.edit')->middleware('auth');
    Route::post('/project/update/{project:projectId}', 'update')->name('project.update')->middleware('auth');
});


Route::controller(ProjectDetailController::class)->group(function() {
    Route::get('/project/projectDetail/{project:projectId}', 'index')->name('projectDetail.index')->middleware('auth');
    Route::get('/project/projectDetail/add/{project:projectId}', 'add')->name('projectDetail.add')->middleware('auth');
    Route::post('/project/projectDetail/save/{project:projectId}', 'save')->name('projectDetail.save')->middleware('auth');
});

Route::controller(ReportController::class)->group(function() {
    Route::get('/project/projectDetail/report/{report:reportId}', 'index')->name('report.index')->middleware('auth');
    Route::get('/project/projectDetail/report/manpower/{report:reportId}', 'manpower')->name('report.manpower')->middleware('auth');
    Route::post('/project/projectDetail/report/manpower/save/{report:reportId}', 'manpowerSave')->name('report.manpower.save')->middleware('auth');
});


Route::controller(UserController::class)->group(function() {
    Route::get('/user', 'index')->name('user.index')->middleware('auth');
    Route::get('/user/add', 'add')->name('user.add')->middleware('auth');
    Route::post('/user/save', 'save')->name('user.save')->middleware('auth');
    Route::get('/user/edit/{user:id}', 'edit')->name('user.edit')->middleware('auth');
    Route::post('/user/update/{user:id}', 'update')->name('user.update')->middleware('auth');
    Route::delete('/user/destroy/{user:id}', 'destroy')->name('user.destroy')->middleware('auth');
});

require __DIR__.'/auth.php';
