<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\StateController;

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
    Route::get('/role', [RoleController::class, 'index']);
    Route::post('/role', [RoleController::class, 'create']);
    Route::delete('/role/{id}', [RoleController::class, 'destroy']);
    Route::get('/course', [CourseController::class, 'index']);
    Route::get('/coursename', [CourseController::class, 'showName']);
    Route::get('/course/{id}', [CourseController::class, 'show']);
    Route::put('/course/{id}', [CourseController::class, 'update']);
    Route::post('/course', [CourseController::class, 'create']);
    Route::delete('/course/{id}', [CourseController::class, 'destroy']);
    Route::get('/training', [TrainingController::class, 'index']);
    Route::get('/training/{id}', [TrainingController::class, 'show']);
    Route::get('/trainingbycourse/{id}', [TrainingController::class, 'showTrainingByCourseID']);
    Route::get('/trainingbyyear/{year}', [TrainingController::class, 'showTrainingByYear']);
    Route::get('/totaltrainee/{id}', [TrainingController::class, 'getTotalTrainee']);
    Route::post('/training', [TrainingController::class, 'create']);
    Route::put('/training/{id}', [TrainingController::class, 'update']);
    Route::delete('/training/{id}', [TrainingController::class, 'destroy']);
    Route::get('/trainee', [TraineeController::class, 'index']);
    Route::get('/trainee/{id}', [TraineeController::class, 'showName']);
    Route::post('/trainee', [TraineeController::class, 'create']);
    Route::put('/trainee/{id}', [TraineeController::class, 'update']);
    Route::delete('/trainee/{id}', [TraineeController::class, 'destroy']);
    Route::get('/state', [StateController::class, 'index']);
    Route::post('/state', [StateController::class, 'create']);
    Route::put('/state/{id}', [StateController::class, 'update']);
    Route::delete('/state/{id}', [StateController::class, 'destroy']);
    Route::get('/discount', [DiscountController::class, 'index']);
    Route::post('/discount', [DiscountController::class, 'create']);
    Route::put('/discount/{id}', [DiscountController::class, 'update']);
    Route::delete('/discount/{id}', [DiscountController::class, 'destroy']);
    Route::get('/company', [CompanyController::class, 'index']);
    Route::get('/company/{id}', [CompanyController::class, 'show']);
    Route::post('/company', [CompanyController::class, 'create']);
    Route::put('/company/{id}', [CompanyController::class, 'update']);
    Route::delete('/company/{id}', [CompanyController::class, 'destroy']);
    Route::post("/logout",[AuthController::class,'logout']);
});





