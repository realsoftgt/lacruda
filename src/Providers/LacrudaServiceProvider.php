<?php

namespace RealSoft\Lacruda\Providers;

use Illuminate\Support\ServiceProvider;
use RealSoft\Lacruda\Console\Commands\LacrudaAuthCommand;
use RealSoft\Lacruda\Console\Commands\LacrudaMakeCommand;

class LacrudaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__ . '/../../public' => public_path()], ['install', 'public']);
        $this->publishes([__DIR__ . '/../../resources/views/layouts/nav.blade.php' => resource_path('views/vendor/lacruda/layouts/nav.blade.php')], ['install', 'nav']);
        $this->publishes([__DIR__ . '/../../resources/views/layouts/app.blade.php' => resource_path('views/vendor/lacruda/layouts/app.blade.php')], ['install', 'layout']);
        $this->publishes([__DIR__ . '/../../resources/views/auth' => resource_path('views/vendor/lacruda/auth')], ['auth', 'views']);
        $this->publishes([__DIR__ . '/../../resources/views/inputs' => resource_path('views/vendor/lacruda/inputs')], ['inputs', 'views']);
        $this->publishes([__DIR__ . '/../../resources/views/layouts' => resource_path('views/vendor/lacruda/layouts')], ['layouts', 'views']);
        $this->publishes([__DIR__ . '/../../resources/views/models' => resource_path('views/vendor/lacruda/models')], ['models', 'views']);

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'lacruda');

        if ($this->app->runningInConsole()) {
            $this->commands([LacrudaMakeCommand::class, LacrudaAuthCommand::class]);
        }
    }
}
