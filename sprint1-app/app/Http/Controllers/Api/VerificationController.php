<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Xác nhận email
     *
     * GET /api/email/verify/{id}/{hash}
     *
     * @param  Request  $request
     * @param  int      $id    — ID của user
     * @param  string   $hash  — SHA1 hash của email
     * @return JsonResponse
     */
    public function verify(Request $request, $id, $hash): JsonResponse
    {
        $user = User::findOrFail($id);

        // Kiểm tra hash có khớp với email của user không
        if (!hash_equals(sha1($user->getEmailForVerification()), $hash)) {
            return response()->json([
                'message' => 'Link xác nhận không hợp lệ.',
            ], 403);
        }

        // Nếu email đã verify rồi
        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email đã được xác nhận trước đó.',
            ]);
        }

        // Đánh dấu email đã verify
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return response()->json([
            'message' => 'Email đã được xác nhận thành công.',
        ]);
    }

    /**
     * Gửi lại email xác nhận
     *
     * POST /api/email/resend
     * Header: Authorization: Bearer {token}
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function resend(Request $request): JsonResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email đã được xác nhận.',
            ]);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Email xác nhận đã được gửi lại.',
        ]);
    }
}

