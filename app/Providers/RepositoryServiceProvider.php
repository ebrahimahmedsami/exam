<?php

namespace App\Providers;

use App\Repositories\Interfaces\BaseInterface;
use App\Repositories\Interfaces\RegisterInterface;
use App\Repositories\Repositories\BaseRepository;
use App\Repositories\Repositories\RegisterRepository;
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
            BaseInterface::class,
            BaseRepository::class
        );
        $this->app->bind(
            RegisterInterface::class,
            RegisterRepository::class
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
