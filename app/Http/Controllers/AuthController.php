<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Http\Controllers\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use HasApiToken;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

    public function register(Request $request) {

        $role_id = DB::table('roles')->where('role_type', $request->input('role_type'))->value('id');
        
        // personal login
        if($role_id === 2) {
            $validatedData = Validator::make($request->all(), [
                'fullname' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'ic' => 'required|string|max:12|unique:users',
                'password' => 'required|string|max:12',
                'phone_no' => 'required|string|min:8',
                'company_id' => 'required|string',
                'position' => 'required|string'
            ],
            [   
                'fullname.required' => 'Please Input Full Name',
                'email.email' => 'Email must be in format email',
                'ic.required' => 'Please Input Your Identification Number (for local) or Passport (for international)',
                'company_name.required' => 'Please Input Company Name',
                'fullname.max' => 'Full Name less than 255 characters',
                'phone_no' => 'Please Input Phone Number',
                'position' => 'Please Input Your Position'
            ]);
    
            if ($validatedData->fails()) {
                $errors = $validatedData->errors();
                return response($errors->first(), 400);
            }

        User::create([
            'fullname' => $request['fullname'],
            'email' => $request['email'],
            'ic' => $request['ic'],
            'password' => Hash::make($request['password']),
            'phone_no' => $request['phone_no'],
            'company_id' => $request['company_id'],
            'position' => $request['position'],
            'role_id' => $role_id
        ]);

        return response()->json([
            "message" => "Successfully register"
        ]);
            
        } else {
            //company register
            $validatedData = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string',
                'fullname' => 'required|string',
                'phone_no' => 'required|string',
                'company_id' => 'required|string',
                'company_name' => 'required|string'
            ]);
            
            if ($validatedData->fails()) {
                $errors = $validatedData->errors();
                return response($errors->first(), 400);
            }

            if($request->input('company_id') == 0) {
                $company_name = $request->input('company_name');
                $company_address = $request->input('company_address');
        
                $company = Company::create([
                                'company_name' => $company_name,
                                'company_address' => $company_address,
                            ]);

                User::create([
                    'company_id' => $company->id,
                    'password' => Hash::make($request['password']),
                    'email' => $request['email'],
                    'fullname' => $request['fullname'],
                    'phone_no' => $request['phone_no'],
                    'role_id' => $role_id
                ]);

            } else {
                User::create([
                    'company_id' => $request['company_id'],
                    'password' => Hash::make($request['password']),
                    'email' => $request['email'],
                    'fullname' => $request['fullname'],
                    'phone_no' => $request['phone_no'],
                    'role_id' => $role_id
                ]);
            } 
    
            return response()->json([
                "message" => "Successfully register"
            ]);
            
        }
        
        // dd($request->all()); mcm console.log
        // php artisan make:model <nama model> -m -c --api
    
    }

    public function login(Request $request){
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|min:5'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return response($errors->first(), 400);
        }
        
        // Authentication passed...
        //Check email
        $credentials = User::where('email', $request['email'])->get();
        
        if($credentials->isEmpty()) {
            return response("Email not exist.", 400);
        }

        foreach ($credentials as $user) {
            $user->password = $user->password;
        }

        //Check password
        if(!Hash::check($request->password, $user->password)) {
            return response("Bad credentials", 400);
        }


        $token = $user->createToken('myapptoken')->plainTextToken;
        $role =  DB::table('roles')->where('id', $user->role_id)->get('role_type');
        return response()->json([
            "token" => $token,
            "id" => $user->id,
            "company_id" => $user->company_id,
            "role" => $role,
            "message" => "Success"
        ]);


    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        $response = [
            'status'=>true,
            'message'=>'Logout successfully',
        ];
        return response($response,201);
    }

    public function forgotPassword(Request $request) {

        $validatedData = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255'
        ]);
        
        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return response($errors->first(), 400);
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        if($status == Password::RESET_LINK_SENT) {
            return [
                'status' => __($status)
            ];
        };

        throw ValidationException::withMessages([
            'email' => [trans($status)]
        ]);
    }

    public function reset(Request $request) {
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'token' => 'required',
            'password' => 'required'
        ]);
        
        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return response($errors->first(), 400);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'confirmed_password', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password'=> Hash::make($request->password)
                ])->save();
            }
        );

        return response([
            'message' => __($status)
        ], 201);
    }

    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
