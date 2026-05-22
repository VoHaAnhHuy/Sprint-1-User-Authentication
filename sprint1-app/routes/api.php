<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PasswordResetController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\VariantController;
use App\Http\Controllers\Api\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ===================== Public Routes (không cần đăng nhập) =====================

// Đăng ký & Đăng nhập
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Quên mật khẩu & Reset mật khẩu
Route::post('/forgot-password', [PasswordResetController::class, 'forgotPassword']);
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword']);

// Xác nhận email (click link từ email)
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->name('verification.verify');

// ===================== Protected Routes (cần đăng nhập) =====================

Route::middleware('auth:sanctum')->group(function () {
    // Lấy thông tin user hiện tại
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Đăng xuất
    Route::post('/logout', [AuthController::class, 'logout']);

    // Gửi lại email xác nhận
    Route::post('/email/resend', [VerificationController::class, 'resend']);

    // ===================== Product CRUD =====================
    Route::apiResource('products', ProductController::class);

    // ===================== Variant CRUD (nested) =====================
    Route::apiResource('products.variants', VariantController::class);
});
