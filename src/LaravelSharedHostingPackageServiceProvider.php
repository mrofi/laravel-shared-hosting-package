<?php

namespace Mrofi\LaravelSharedHostingPackage;

use Illuminate\Support\ServiceProvider;

class LaravelSharedHostingPackageServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function baseDir()
    {
        return __DIR__ . '/..';
    }

    protected function bootPublish()
    {
        // index.php
        $this->publishes([$this->baseDir().'/stubs/index.php.stub' => base_path('index.php')], 'index.php');

        // .htaccess
        $this->publishes([$this->baseDir().'/stubs/.htaccess.stub' => base_path('.htaccess')], '.htaccess');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootPublish();

        // Extends Url Generator
        $this->app->bind('url', function ($app) {
            return new UrlGenerator(
                $app['router']->getRoutes(),
                $app['request']
            );
        });
    }
}
