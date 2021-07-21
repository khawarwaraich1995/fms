<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Customers;
use Validator;

class CustomersController extends Controller
{
    public function customersLogin(Request $request){

        $data = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $user = Customers::where('email', $request->email)->first();
        //dd($user);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'status' => false,
                'message' => 'These credentials do not match our records!'
            ], 200);
        }
    
        $token = $user->createToken('my-app-token')->plainTextToken;
    
        $response = [
            'status' => true,
            'user' => $user,
            'token' => $token
        ];
    
        return response($response, 201);
    }

    public function customersRegistration(Request $request, Customers $customer)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password',
        ]);
        if (isset($validator) && $validator->fails())
        {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->password = Hash::make($request->email);
            $customer->save();
            if($customer->id > 0)
            {
                return response()->json([
                    'status' => true,
                    'message' =>   'Your account has been registered successfully!'
                ], 201);
            }

    }
}
