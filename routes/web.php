<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CvAnalyzerController;

Route::get('/upload', [CvAnalyzerController::class, 'showUploadForm'])->name('upload.form');
Route::post('/analyze', [CvAnalyzerController::class, 'analyze'])->name('analyze');