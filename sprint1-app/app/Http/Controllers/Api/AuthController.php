<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Đăng ký tài khoản mới
     *
     * POST /api/register
     */
    public function register(RegisterRequest $request)
    {
        // Data đã được validate bởi RegisterRequest trước khi vào đây
        $user = User::create($request->validated());

        // Gửi email xác nhận
        $user->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Đăng ký thành công. Vui lòng kiểm tra email để xác nhận tài khoản.',
            'user'    => $user,
        ], 201);
    }

    /**
     * Đăng nhập
     *
     * POST /api/login
     */
    public function login(LoginRequest $request)
    {
        // Data đã được validate bởi LoginRequest
        $user = User::where('email', $request->email)->first();

        // Kiểm tra user tồn tại + password đúng
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email hoặc mật khẩu không đúng.',
            ], 401);
        }

        // Kiểm tra email đã xác nhận chưa
        if (!$user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email chưa được xác nhận. Vui lòng kiểm tra email.',
            ], 403);
        }

        // Tạo Sanctum token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Đăng nhập thành công.',
            'user'    => $user,
            'token'   => $token,
        ]);
    }

    /**
     * Đăng xuất
     *
     * POST /api/logout
     * Header: Authorization: Bearer {token}
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Đăng xuất thành công.',
        ]);
    }
}
