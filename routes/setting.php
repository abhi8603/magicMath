<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\settingController;

Route::match(['get', 'post'],'general-setting', [settingController::class,'generalSetting']);
Route::match(['get', 'post'],'theam-setting', [settingController::class,'theamSetting']);
Route::match(['get', 'post'],'session-setting', [settingController::class,'sessionSetting']);
Route::match(['get', 'post'],'addMenu', [settingController::class,'addMenu']);
Route::match(['get', 'post'],'auth-types', [settingController::class,'authTypes']);
Route::match(['get', 'post'],'authorize-user', [settingController::class,'authorizeUser']);