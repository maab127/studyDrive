<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Student;
use Validator;

class AuthController extends Controller {
    
    public function register(Request $request){
        //Validating the $request as per defined rules
        // $validateRegisterRequest = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
        //     'password' => ['required', 'string', 'min:8'],
        // ]);

        $validator = Validator::make($request->all(), [
            'email'     =>  'required|email|unique:students|max:255',
            'name' =>  'required',
            'password' =>  'required|min:8'
        ]);

        
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }else{
            $name = $request->name;
            $email = $request->email;
            $password = bcrypt($request->password);
            $student = Student::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);
            $accessToken = $student->createToken('authToken')->accessToken;
            return response()->json(['student' => $student,'access_token'=>$accessToken]);
        }
    }

    public function login(){

    }
}
