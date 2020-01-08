<?php

namespace App\Providers;

use App\Contracts\LeaveRepositoryInterface;
use App\Repositories\LeaveRepository;
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
        $this -> app -> bind(
            LeaveRepositoryInterface::class,
            LeaveRepository::class
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
