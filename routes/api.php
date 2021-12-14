<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// PUBLIC API
Route::get('/ping', [HomeController::class, 'ping']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

// PRIVATE API (TOKEN IS COMPULSORY)
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile/{id}', [ProfileController::class, 'show']);
    Route::put('/profile/{id}', [ProfileController::class, 'update']);
    Route::get('/course', [CourseController::class, 'index']);
    Route::post('/course', [CourseController::class, 'create']);
    Route::get('/training', [TrainingController::class, 'index']);
    Route::post('/training', [TrainingController::class, 'create']);
    Route::post("/logout",[AuthController::class,'logout']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});





