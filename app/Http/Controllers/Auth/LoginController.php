<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash ;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(loginRequest $request)
    {
        // $user = User::where('email',$request->email)->first();

        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['Invalid email or password'],
        //     ]);
        // }


     

        if (!auth()->attempt($request->only(['email','password']))) {
            throw ValidationException::withMessages([
                'email' => ['Invalid email or password'],
            ]);
        }
        
    }
}
