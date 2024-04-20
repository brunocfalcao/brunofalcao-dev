<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Student;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        if (Schema::hasTable('courses') && Schema::hasColumn('courses', 'student_admin_id')) {
            $adminIds = Course::all()->pluck('student_admin_id');
            $emails = Student::whereIn('email', $adminIds)->pluck('email');

            Gate::define('viewNova', function ($user) use ($emails) {
                return in_array($user->email, $emails) ||
                   $user->email == env('EDUKA_SUPER_ADMIN_EMAIL');
            });
        } else {
            Gate::define('viewNova', function () {
                return true;
            });
        }
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }
}
