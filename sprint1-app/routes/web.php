<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route GET cho link reset password từ email
// Khi user click link trong email, sẽ hiển thị token + email để dùng với API
Route::get('/reset-password', function (\Illuminate\Http\Request $request) {
    return response()->json([
        'message'  => 'Sử dụng token và email bên dưới để gọi POST /api/reset-password',
        'token'    => $request->query('token'),
        'email'    => $request->query('email'),
        'api_endpoint' => url('/api/reset-password'),
        'method'   => 'POST',
        'body_example' => [
            'token'                 => $request->query('token'),
            'email'                 => $request->query('email'),
            'password'              => 'new_password_here',
            'password_confirmation' => 'new_password_here',
        ],
    ]);
})->name('password.reset');
