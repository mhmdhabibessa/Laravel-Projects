<?php

namespace App\Providers;

use App\Nova\Metrics\ActiveCourses;
use App\Nova\Metrics\LatestStudents;
use App\Nova\Metrics\PendingOrders;
use App\Nova\Metrics\PendingOrdersList;
use Bakerkretzmar\NovaSettingsTool\SettingsTool;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use OptimistDigital\NovaPageManager\NovaPageManager;
use PhpJunior\NovaLogViewer\Tool;
use Spatie\BackupTool\BackupTool;
use Vyuldashev\NovaPermission\NovaPermissionTool;

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
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
               'mohammad@masdev.me',
               'l.amin@geniuskids.ae',
               'registration@geniuskids.ae'
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            (new PendingOrders()),
            (new PendingOrdersList()),
            (new ActiveCourses()),
            (new LatestStudents())
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            (new SettingsTool())->canSee(function ($request) {
                return $request->user()->hasPermissionTo('Manage Settings');
            }),
            (new Tool())->canSee(function ($request) {
                return $request->user()->hasPermissionTo('View Logs');
            }),
            (new NovaPermissionTool())->canSee(function ($request) {
                return $request->user()->hasPermissionTo('Manage Users');
            }),
            (new BackupTool())->canSee(function ($request) {
                return $request->user()->hasPermissionTo('Manage Backups');
            }),
            (new NovaPageManager())->canSee(function ($request) {
                return $request->user()->hasPermissionTo('Manage Pages');
            }),
        ];
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
}
