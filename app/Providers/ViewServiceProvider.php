<?php

namespace App\Providers;

use App\Http\ViewComposers\TaskCreateFormFields;
use App\Http\ViewComposers\TaskIndexFormFields;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['task.form'], TaskCreateFormFields::class);
        view()->composer(['task.index'], TaskIndexFormFields::class);
    }
}
