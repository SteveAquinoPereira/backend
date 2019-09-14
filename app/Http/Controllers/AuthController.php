<?php
namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:20|string',
            'last_name' => 'required|max:20|string',
            'cedula' => 'required|max:8|string',
            'phone_number' => 'required|min:11|max:11|string',
            'address'=>'required|max:255|string',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8|confirmed',
            'id_gender01' => 'required|max:4|integer',
            'id_user_type01' => 'max:4'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);
        
        return response()->json(['message' => 'Successfully created user!'], 201);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($loginData)) {
            return response()->json(['message' => 'Datos Erroneos'], 401);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                    ->toDateTimeString()
        ]);

                

    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Successfully logged out']);
    }

}
