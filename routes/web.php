<?php

use App\Http\Controllers\EventCertificateTemplateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
});


Route::prefix('admin/event-types')->group(function () {
    Route::get('/', [EventTypeController::class, 'index']);
    Route::get('/create', [EventTypeController::class, 'create']);
    Route::post('/', [EventTypeController::class, 'store']);
    Route::get('/{id}/edit', [EventTypeController::class, 'edit']);
    Route::put('/{id}', [EventTypeController::class, 'update']);
    Route::delete('/{id}', [EventTypeController::class, 'destroy']);
});


Route::prefix('admin/events')->group(function () {
    Route::get('/', [EventController::class, 'index']);
    Route::get('/create', [EventController::class, 'create']);
    Route::post('/', [EventController::class, 'store']);
    Route::get('/{id}/edit', [EventController::class, 'edit']);
    Route::put('/{id}', [EventController::class, 'update']);
    Route::delete('/{id}', [EventController::class, 'destroy']);

});

Route::prefix('/admin/event-templates')->group(function(){
    Route::get('/', [EventCertificateTemplateController::class, 'index']);
    Route::get('/create', [EventCertificateTemplateController::class, 'create']);
    Route::post('/', [EventCertificateTemplateController::class, 'store']);
    Route::get('/{id}/edit', [EventCertificateTemplateController::class, 'edit']);
    Route::get('/{id}/download-pdf', [EventCertificateTemplateController::class, 'generatePdf']);
    
    Route::put('/{id}', [EventCertificateTemplateController::class, 'update']);
    Route::delete('/{id}', [EventCertificateTemplateController::class, 'destroy']);
});

Route::prefix('/admin/participants')->group(function(){
    Route::get('/', [ParticipantController::class, 'index']);

    Route::get('/import', [ParticipantController::class, 'importExcel']);
    Route::post('/upload-excel-file', [ParticipantController::class, 'storeExcel']);

    Route::get('/{id}/download-pdf', [ParticipantController::class, 'generatePdf']);
    // Route::get('/export', [ParticipantController::class, 'export'])->name('participants.export');

    Route::get('/create', [ParticipantController::class, 'create']);
    Route::post('/', [ParticipantController::class, 'store']);
    Route::get('/{id}/edit', [ParticipantController::class, 'edit']);
    Route::put('/{id}', [ParticipantController::class, 'update']);
    Route::delete('/{id}', [ParticipantController::class, 'destroy']);
});
