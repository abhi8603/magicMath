<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\academicController;

Route::match(['get', 'post'],'section', [academicController::class,'section']);
Route::match(['get', 'post'],'sync-file', [academicController::class,'syncFile']);
Route::match(['get', 'post'],'generate-question', [academicController::class,'generateQuestion']);
Route::match(['get', 'post'],'start-test', [academicController::class,'startTest']);
Route::match(['get', 'post'],'fetch-data', [academicController::class,'fetchData'])->name('fetch-data');
Route::match(['get', 'post'],'fetch-data-s2', [academicController::class,'fetchDataS2'])->name('fetch-data-s2');
Route::match(['get', 'post'],'fetch-data-s3', [academicController::class,'fetchDataS3'])->name('fetch-data-s3');
Route::match(['get', 'post'],'dashboard', [academicController::class,'dashboard'])->name('dashboard');
Route::match(['get', 'post'],'update-practice-session-status', [academicController::class,'updatePracticeSession'])->name('update-practice-session-status');
Route::match(['get', 'post'],'start', [academicController::class,'start'])->name('start');

Route::match(['get', 'post'],'view/details', [academicController::class,'viewDetails']);