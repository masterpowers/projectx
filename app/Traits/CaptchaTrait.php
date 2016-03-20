<?php namespace App\Traits;

use Illuminate\Http\Request;
use ReCaptcha\ReCaptcha;
 
trait CaptchaTrait 
{
 
    public function captchaCheck(Request $request)
    {
 
        $response = $request->input('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = config('services.g-recaptcha.secret');
 
        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return true;
        } else {
            return false;
        }
 
    }
 
}
