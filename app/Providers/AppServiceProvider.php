<?php

namespace App\Providers;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        View::composer('layouts.navigation', function ($view) {
            $user = Auth::user();
            $trashCount = 0;

            if ($user) {
                $trashCount = Note::onlyTrashed()->where('user_id', $user->id)->count();
            }

            $view->with('trashCount', $trashCount);
        });
    }

}
