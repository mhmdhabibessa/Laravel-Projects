<?php

namespace App\Providers;

use App\Models\Course;
use App\Observers\CourseObserver;
use App\Observers\StudentObserver;
use App\Settings;
use App\Models\Student;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadHelpers();

        $this->app->singleton(Settings::class, function () {
            return Settings::make(storage_path('app/settings.json'));
        });
    }

    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->setLocale(request()->segment(1));
        Course::observe(CourseObserver::class);
        Student::observe(StudentObserver::class);
        View::share('navCourses', Course::all());
        $enroll = settings('enrollment');
        if (isset($enroll)) {
            $course = Course::find($enroll);
            View::share('course', $course);
        }
    }
}
