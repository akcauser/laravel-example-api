<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BusinessServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //DON'T DELETE THIS LINES
        #business-service-injection
        $this->app->singleton(\App\Cruder\Service\Abstract\ITagService::class, \App\Cruder\Service\Concrete\TagService::class);

        $this->app->singleton(\App\Cruder\Service\Abstract\IBlogService::class, \App\Cruder\Service\Concrete\BlogService::class);
    }
}
