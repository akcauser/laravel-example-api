<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //DON'T DELETE THIS LINES
        #data-service-injection
        $this->app->singleton(\App\Cruder\DataService\Abstract\IBlogDataService::class, \App\Cruder\DataService\Concrete\BlogDataService::class);
        $this->app->singleton(\App\Cruder\DataService\Abstract\ITagDataService::class, \App\Cruder\DataService\Concrete\TagDataService::class);
    }
}
