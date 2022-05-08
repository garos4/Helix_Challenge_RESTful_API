<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    use Response;
    
    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);
        
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('ChallengeApp')->accessToken;
                $response = ['token' => $token];
                return $this->successResponse($response);
            } 
            else {
                return $this->errorResponse('Incorrect credentials');
            }
        } 
        else {
            $response = ["message" => 'User does not exist'];
            return response()->json($response, 422);
        }
    }
}
