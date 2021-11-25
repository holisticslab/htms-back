<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use HasApiToken;

class AuthController extends Controller {

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request) {
        
        if($request['role'] === 'individu') {
            $validatedData = $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'ic' => 'required|string|max:12|unique:users',
                'password' => 'required|string|min:8',
                'phone_no' => 'required|string|min:8',
                'company_name' => 'required|string',
                'company_address' => 'required|string'
            ]);


        User::create([
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'ic' => $validatedData['ic'],
            'password' => Hash::make($validatedData['password']),
            'phone_no' => $validatedData['phone_no'],
            'company_name' => $validatedData['company_name'],
            'company_address' => $validatedData['company_address'],
            'allergies' => $request['allergies'],
            'referrel_code' => $request['referrel_code'],
            'promo_code' => $request['promo_code'],
            'hrdf_claim' => $request['hrdf_claim']
        ]);

        return response()->json([
            "message" => "Successfully register"
        ]);
            
        } else if($request['role'] === 'company') {
            $validatedData = $request->validate([
                'company_name' => 'required|string',
                'company_address' => 'required|string',
                'company_type' => 'required|string',
                'ssm_no' => 'required|string|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string',
                'fullname' => 'required|string',
                'ic' => 'required|string',
            ]);

            User::create([
                'company_name' => $validatedData['company_name'],
                'company_address' => $validatedData['company_address'],
                'company_type' => $validatedData['company_type'],
                'ssm_no' => $validatedData['ssm_no'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'fullname' => $validatedData['fullname'],
                'ic' => $validatedData['ic'],
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
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            //Check email
            $user = User::where('email', $request['email'])->firstOrFail();

            //Check password
            if(!Hash::check($credentials['password'], $user->password)) {
                return response(["message" => "Bad credentials"], 401);
            }

            $token = $user->createToken('myapptoken')->plainTextToken;

            return response()->json([
                "token" => $token,
                "id" => $user->id,
                "role" => $user->role,
                "message" => "Success"
            ]);
        } else {
            return response()->json([
                "message" => "Credentials not match"
            ]);
        }
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
