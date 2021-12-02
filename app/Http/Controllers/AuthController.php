<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use HasApiToken;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request) {
        
        if($request['role'] === 'individu') {
            $validatedData = Validator::make($request->all(), [
                'fullname' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'ic' => 'required|string|max:12|unique:users',
                'password' => 'required|string|max:12',
                'phone_no' => 'required|string|min:8',
                'company_name' => 'required|string',
                'company_address' => 'required|string'
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
            'company_name' => $request['company_name'],
            'company_address' => $request['company_address'],
            'allergies' => $request['allergies'],
            'referrel_code' => $request['referrel_code'],
            'promo_code' => $request['promo_code'],
            'hrdf_claim' => $request['hrdf_claim']
        ]);

        return response()->json([
            "message" => "Successfully register"
        ]);
            
        } else if($request['role'] === 'company') {
            $validatedData = Validator::make($request->all(), [
                'company_name' => 'required|string',
                'company_address' => 'required|string',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string',
                'fullname' => 'required|string',
                'phone_no' => 'required|string',
            ]);

            if ($validatedData->fails()) {
                $errors = $validatedData->errors();
                return response($errors->first(), 400);
            }

            User::create([
                'company_name' => $request['company_name'],
                'company_address' => $request['company_address'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'fullname' => $request['fullname'],
                'phone_no' => $request['phone_no'],
                'role' => $request['role']
            ]);
    
            return response()->json([
                "message" => "Successfully register"
            ]);
            
        }
        
        // // dd($request->all()); mcm console.log
        // // php artisan make:model <nama model> -m -c --api
    
    }

    public function showLogin(){
        return view('auth.login');
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

        return response()->json([
            "token" => $token,
            "id" => $user->id,
            "role" => $user->role,
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

    // public function update(Request $request, $id)
    // {
    //     $post = Auth::where('id', $id)->update([
    //         'name' => $request->name,
    //         'body' => $request->body,
    //     ]);

    //     return response()->json([
    //         'data' => $post
    //     ]);
    // }


    // protected function authenticated(Request $request, $user) 
    // {
    //     return redirect()->intended();
    // }

    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
