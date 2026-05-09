<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    /**
     * Gửi link reset password qua email
     *
     * POST /api/forgot-password
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        // Data đã được validate bởi ForgotPasswordRequest
        $status = Password::sendResetLink(
            $request->validated()
        );

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json([
                'message' => 'Link reset mật khẩu đã được gửi đến email của bạn. Link sẽ hết hạn sau 5 phút.',
            ]);
        }

        return response()->json([
            'message' => 'Không thể gửi link reset. Vui lòng kiểm tra lại email.',
        ], 400);
    }

    /**
     * Reset password bằng token
     *
     * POST /api/reset-password
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        // Data đã được validate bởi ResetPasswordRequest
        $status = Password::reset(
            $request->validated(),
            function ($user, $password) {
                $user->forceFill([
                    'password'       => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json([
                'message' => 'Mật khẩu đã được đổi thành công.',
            ]);
        }

        return response()->json([
            'message' => 'Không thể reset mật khẩu. Token không hợp lệ hoặc đã hết hạn.',
        ], 400);
    }
}
