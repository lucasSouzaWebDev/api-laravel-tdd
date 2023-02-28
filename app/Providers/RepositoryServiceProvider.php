<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    ResourceRepositoryInterface
};
use App\Repositories\Eloquent\{
    ResourceRepository,
};

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ResourceRepositoryInterface::class,
            ResourceRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
