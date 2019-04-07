<?php

namespace Kosa3\MigrationStubExtention;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Migrations\MigrationCreator;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->extend('migration.creator', function ($creator, $app) {
            return new class ($app['files']) extends MigrationCreator
            {
                public function stubPath()
                {
                    return resource_path() . '/migration';
                }
            };
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $targetPath = resource_path() . '/migration';
        if (! \File::isDirectory($targetPath)) {
            if (\File::makeDirectory($targetPath)) {
                \File::copyDirectory(base_path().'/vendor/laravel/framework/src/Illuminate/Database/Migrations/stubs', $targetPath);
            }
        }
    }
}
