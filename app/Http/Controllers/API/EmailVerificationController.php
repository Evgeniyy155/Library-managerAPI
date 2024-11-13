<?php

namespace App\Http\Controllers\API;

use App\Data\Email\EmailVerificationRequestData;
use App\Facades\EmailVerificationFacade;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function notice(Request $request): JsonResponse
    {
        return EmailVerificationFacade::getNotice($request->user());
    }

    public function verify(Request $request)
    {
        return EmailVerificationFacade::verify(new EmailVerificationRequestData($request->id, $request->hash));
    }

    public function resend(Request $request): JsonResponse
    {
        return EmailVerificationFacade::resend($request->user());
    }
}
