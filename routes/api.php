<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/paginated_posts', [PostController::class, 'getPaginatedPosts']);
    Route::apiResource('/posts', PostController::class);
    Route::get('/getcourses', [CourseController::class, 'GetCourseDetails']);
    Route::post('/postcourse', [CourseController::class, 'PostCourseDetails']);

    Route::post('/auth/logout', [AuthController::class, 'logout']);
});





