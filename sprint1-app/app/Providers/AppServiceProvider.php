<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Tạo custom URL cho link reset password trong email
        // Thay vì dùng route('password.reset') (không tồn tại trong API app),
        // link sẽ trỏ về frontend page: {APP_URL}/reset-password?token=xxx&email=yyy
        ResetPassword::createUrlUsing(function ($user, string $token) {
            return url('/reset-password') . '?token=' . $token . '&email=' . urlencode($user->email);
        });
    }
}
