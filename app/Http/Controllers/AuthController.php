<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\GenerateSlug;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register()
    {
        $request = request();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min_digits:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'slug' => GenerateSlug::generateSlug(User::class, $request->name),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        EmailController::SendVerificationEmail($request, $user);

        if ($user) {
            return $this->login();
        } else {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function verifyOtp()
    {
        $request = request();
        $user = auth()->user();
        $otp = new OtpController();
        if ($otp->IsExpired($user->id, $request->otp))
            return response()->json(['error' => 'OTP Expired'], 410);
        if ($otp->VerifyOTP($user->id, $request->otp)) {
            $user->email_verified_at = now();
            $user->save();
            return response()->json(['message' => 'Email succesfully verify']);
        } else {
            return response()->json(['error' => 'Invalid OTP'], 409);
        }
    }

    public function resendOtp()
    {
        $request = request();
        $user = auth()->user();

        if ($user->email_verified_at != null) {
            return response()->json(['error' => 'Email Already Verified'], 409);
        }
        EmailController::SendVerificationEmail($request, $user);
        return response()->json(['message'=> 'Email successfuly send. Check your mailbox!']);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}