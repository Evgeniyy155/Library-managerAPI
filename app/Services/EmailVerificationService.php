<?php

namespace App\Services;


use App\Data\Email\EmailVerificationRequestData;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;

class EmailVerificationService
{
    public function getNotice(User $user): JsonResponse
    {
        if($response = $this->checkIfEmailVerified($user)){
            return $response;
        };
        return response()->json([
            'message' => 'Email verification required. Please check your inbox for a verification link.'
        ], 403);
    }

    public function verify(EmailVerificationRequestData $data)
    {
        $user = User::query()->findOrFail($data->id);
        if (! hash_equals(sha1($user->getEmailForVerification()), $data->hash)) {
            abort(400);
        }
        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
        }
        return view('email.verified');
    }

    public function resend(User $user): JsonResponse
    {
        if($response = $this->checkIfEmailVerified($user)){
            return $response;
        };
        $user->sendEmailVerificationNotification();
        return responseSuccess('Verification link sent!');
    }


    protected function checkIfEmailVerified(User $user): ?JsonResponse
    {
        if($user->hasVerifiedEmail()){
            return response()->json([
                'message' => 'Email is already verified.'
            ], 400);
        }
        return null;
    }
}
