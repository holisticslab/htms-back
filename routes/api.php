<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\EmailController;
use App\Mail\ProformaMail;

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
    
// PUBLIC API
Route::get('/ping', [HomeController::class, 'ping']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgotpassword', [AuthController::class, 'forgotPassword']);
Route::post('/resetpassword', [AuthController::class, 'reset']);
Route::get('/companyname', [CompanyController::class, 'showName']);
Route::get('/companyaddress/{id}', [CompanyController::class, 'showAddressbyId']);
Route::get('/companyname', [CompanyController::class, 'showName']);

// MAILING
Route::get('/email', function () {
    Mail::to('irsyadkamil96@gmail.com')->send(new ProformaMail());
});
Route::get('/mail', [EmailController::class, 'index']);
Route::get('/mailtest', function(){
    return view('email.proforma');
});


// PAYMENT GATEWAY
Route::get('/collection', [PaymentController::class, 'getCollection']);
Route::post('/collection', [PaymentController::class, 'createCollection']);
Route::post('/bill', [PaymentController::class, 'createBill']);
Route::get('/checkaccount', [PaymentController::class, 'checkBankAccount']);

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
    Route::get('/cohort', [CohortController::class, 'index']);
    Route::get('/cohort/{id}', [CohortController::class, 'show']);
    Route::get('/cohortname', [CohortController::class, 'showName']);
    Route::get('/cohortalldate', [CohortController::class, 'showDateCohortName']);
    Route::get('/cohortbycourse/{id}', [CohortController::class, 'showCohortByCourseID']);
    Route::get('/cohortbyyear/{year}', [CohortController::class, 'showCohortByYear']);
    Route::get('/totaltrainee/{id}', [CohortController::class, 'getTotalTrainee']);
    Route::post('/cohort', [CohortController::class, 'create']);
    Route::get('/cohortname', [CohortController::class, 'showName']);
    Route::put('/cohort/{id}', [CohortController::class, 'update']);
    Route::delete('/cohort/{id}', [CohortController::class, 'destroy']);
    Route::get('/trainee', [TraineeController::class, 'index']);
    Route::get('/trainee/{id}', [TraineeController::class, 'showName']);
    Route::post('/trainee', [TraineeController::class, 'create']);
    Route::put('/trainee/{id}', [TraineeController::class, 'update']);
    Route::delete('/trainee/{id}', [TraineeController::class, 'destroy']);
    Route::get('/state', [StateController::class, 'index']);
    Route::get('/state/{id}', [StateController::class, 'show']);
    Route::post('/state', [StateController::class, 'create']);
    Route::put('/state/{id}', [StateController::class, 'update']);
    Route::delete('/state/{id}', [StateController::class, 'destroy']);
    Route::get('/discount', [DiscountController::class, 'index']);
    Route::post('/discount', [DiscountController::class, 'create']);
    Route::get('/discount/{id}', [DiscountController::class, 'show']);
    Route::put('/discount/{id}', [DiscountController::class, 'update']);
    Route::delete('/discount/{id}', [DiscountController::class, 'destroy']);
    Route::get('/company', [CompanyController::class, 'index']);
    Route::get('/company/{id}', [CompanyController::class, 'show']);
    Route::post('/company', [CompanyController::class, 'create']);
    Route::put('/company/{id}', [CompanyController::class, 'update']);
    Route::delete('/company/{id}', [CompanyController::class, 'destroy']);
    Route::get('/invoice', [InvoiceController::class, 'index']);
    Route::get('/invoice/{id}', [InvoiceController::class, 'show']);
    Route::post('/invoice', [InvoiceController::class, 'create']);
    Route::put('/invoice/{id}', [InvoiceController::class, 'update']);
    Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy']);
    Route::get('/billing', [BillingController::class, 'index']);
    Route::get('/billing/{id}', [BillingController::class, 'show']);
    Route::put('/billing/{id}', [BillingController::class, 'update']);
    Route::delete('/billing/{id}', [BillingController::class, 'destroy']);
    Route::get('/staff', [StaffController::class, 'index']);
    Route::post('/staff', [StaffController::class, 'create']);
    Route::get('/staff/{id}', [StaffController::class, 'show']);
    Route::put('/staff/{id}', [StaffController::class, 'update']);
    Route::delete('/staff/{id}', [StaffController::class, 'destroy']);
    Route::post('/payment', [PaymentController::class, 'createBill']);
    Route::get('/attachment', [AttachmentController::class, 'index']);
    Route::post('/attachment', [AttachmentController::class, 'create']);
    Route::get('/attachment/{id}', [AttachmentController::class, 'show']);
    Route::put('/attachment/{id}', [AttachmentController::class, 'update']);
    Route::delete('/attachment/{id}', [AttachmentController::class, 'destroy']);
    Route::post("/logout",[AuthController::class,'logout']);
});





