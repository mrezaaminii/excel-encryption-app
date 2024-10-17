<?php

namespace App\Providers;

use App\Contracts\BaseRepositoryInterface;
use App\Contracts\FileRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Repositories\FileRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(FileRepositoryInterface::class, FileRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
