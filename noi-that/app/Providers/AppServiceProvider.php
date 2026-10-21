<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Support\Facades\URL;
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
        // Force HTTPS when running behind Railway's reverse proxy
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        View::composer('admin.partials.sidebar', function ($view) {
            $unreadInquiries = Contact::whereIn('status', ['new', 'Chưa gọi', 'ChÆ°a gá»i'])->count();
            $projectCount = Project::count();
            $postCount = Post::count();

            $view->with([
                'unreadInquiries' => $unreadInquiries,
                'projectCount' => $projectCount,
                'postCount' => $postCount,
            ]);
        });
    }
}
