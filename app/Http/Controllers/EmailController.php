<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\OtpController;

class EmailController extends Controller
{
    public static function SendVerificationEmail($request, $user) {
        
        $otp = new OtpController();

        Mail::to($request->user(), $user->name)->send(new EmailVerification($user, $otp->GenerateOTP($user->id)));
        
    }
}
