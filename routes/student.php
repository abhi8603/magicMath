<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::match(['get', 'post'],'student-admission', [StudentController::class,'studentAdmission']);
