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
    Route::post('/project/projectDetail/report/manpower/save/{report:reportId}', 'manpowerSave')->name('report.manpower.save')->middleware('auth');
    Route::post('/project/projectDetail/report/ppe/save/{report:reportId}', 'ppeSave')->name('report.ppe.save')->middleware('auth');
    Route::post('/project/projectDetail/report/equipment/save/{report:reportId}', 'equipmentSave')->name('report.equipment.save')->middleware('auth');
    Route::post('/project/projectDetail/report/weather/save/{report:reportId}', 'weatherSave')->name('report.weather.save')->middleware('auth');
    Route::post('/project/projectDetail/report/chemical/save/{report:reportId}', 'chemicalSave')->name('report.chemical.save')->middleware('auth');
    Route::post('/project/projectDetail/report/physics/save/{report:reportId}', 'physicsSave')->name('report.physics.save')->middleware('auth');
    Route::post('/project/projectDetail/report/biology/save/{report:reportId}', 'biologySave')->name('report.biology.save')->middleware('auth');
    Route::post('/project/projectDetail/report/psikology/save/{report:reportId}', 'psikologySave')->name('report.psikology.save')->middleware('auth');
    Route::post('/project/projectDetail/report/ergonomy/save/{report:reportId}', 'ergonomySave')->name('report.ergonomy.save')->middleware('auth');
    Route::post('/project/projectDetail/report/behavior/save/{report:reportId}', 'behaviorSave')->name('report.behavior.save')->middleware('auth');
    Route::post('/project/projectDetail/report/condition/save/{report:reportId}', 'conditionSave')->name('report.condition.save')->middleware('auth');
    Route::post('/project/projectDetail/report/question/save/{report:reportId}', 'questionSave')->name('report.question.save')->middleware('auth');
    Route::post('/project/projectDetail/report/note/save/{report:reportId}', 'noteSave')->name('report.note.save')->middleware('auth');
    Route::get('/project/projectDetail/report/activity/add/{report:reportId}', 'activityAdd')->name('report.activity.add')->middleware('auth');
    Route::post('/project/projectDetail/report/activity/save/{report:reportId}', 'activitySave')->name('report.activity.save')->middleware('auth');
    Route::get('/project/projectDetail/report/activityPlan/add/{report:reportId}', 'activityPlanAdd')->name('report.activityPlan.add')->middleware('auth');
    Route::post('/project/projectDetail/report/activityPlan/save/{report:reportId}', 'activityPlanSave')->name('report.activityPlan.save')->middleware('auth');
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
