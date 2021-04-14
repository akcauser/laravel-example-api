<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        #repository injection
        $this->app->singleton(\App\Repositories\Abstract\IBlogRepository::class, \App\Repositories\Concrete\BlogRepository::class);
    }
}
