<?php

namespace App\Providers;

use App\Models\Note;
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
        View::composer('note.index', function ($view): void {
            // Keep legacy index template working even when it expects a single $note variable.
            $view->with('note', Note::query()->value('id') ?? 1);
        });
    }
}
