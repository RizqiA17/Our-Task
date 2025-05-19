<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function GenerateOTP($user_id)
    {
        $otp = Otp::create([
            'user_id' => $user_id,
            'otp' => rand(100000, 999999),
            'expired_at' => now()->addMinutes(5),
        ]);

        return $otp;
    }

    public function VerifyOTP($user_id, $otp)
    {
        $user = Otp::where('user_id', $user_id)
        ->where('otp', $otp)
        ->where('is_active', true)
        ->first();
        
        if ($user) {
            $user->is_active = false;
            $user->save();
            return true;
        }
        return false;
    }

    public function ResendOTP($user_id){
        $allOtp = Otp::where('user_id', $user_id)->get();

        foreach ($allOtp as $otp) {
            $otp->is_active = false;
            $otp->save();
        }

        $otp = $this->GenerateOTP($user_id);
        return $otp;
    }

    public function IsExpired($user_id, $otp){
        $user = Otp::where('user_id', $user_id)
        ->where('otp', $otp)
        ->where('expired_at', '<', now())
        ->where('is_active', true)
        ->first();
        
        if ($user) {
            $user->is_active = false;
            $user->save();
            return true;
        }
        return false;
    }
}
