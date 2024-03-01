<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController as CandidateController;
use App\Http\Controllers\JobController as JobController;
use App\Http\Controllers\SkillController as SkillController;
use App\Http\Controllers\ApplyController as ApplyController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');
