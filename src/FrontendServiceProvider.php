<?php

namespace Phont\Frontend;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Phont\Frontend\Middleware\AutoCreateImageResize;
use Phont\Frontend\Middleware\Redirect301Middleware;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(Kernel $kernel): void
    {
        $kernel->pushMiddleware(Redirect301Middleware::class);
        $kernel->pushMiddleware(AutoCreateImageResize::class);
        Validator::extend('recaptcha', 'Phont\Frontend\Validators\ReCaptcha@validate');

        view()->composer(
            ['phont::*'],
            'Phont\Frontend\ViewComposers\FrontEndComposer'
        );
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'phont');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'phont');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/Routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/Routes/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        // $this->app->singleton(Redirect301Middleware::class);

        $this->app->singleton(\Phont\Frontend\ViewComposers\FrontEndComposer::class);
        $this->mergeConfigFrom(__DIR__.'/../config/frontend.php', 'frontend');

        // Register the service the package provides.
        $this->app->singleton('frontend', function ($app) {
            return new Frontend;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['frontend'];
    }

    /**
     * Console-specific booting.
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        // $this->publishes([
        //     __DIR__ . '/../config/frontend.php' => config_path('frontend.php'),
        // ], 'frontend.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/phont'),
        ], 'frontend.view');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../resources/assets/frontend' => resource_path('frontend'),
            __DIR__.'/../resources/exam/app.php' => base_path('config/app.php'),
            __DIR__.'/../resources/exam/AppServiceProvider.php' => base_path('app/Providers/AppServiceProvider.php'),
            __DIR__.'/../resources/exam/.env.exam' => base_path('.env'),
            __DIR__.'/../resources/exam/elfinder.php' => base_path('config/elfinder.php'),
            __DIR__.'/../resources/exam/en.json' => base_path('lang/en.json'),
            __DIR__.'/../resources/exam/vi.json' => base_path('lang/vi.json'),
            __DIR__.'/../resources/exam/package.json' => base_path('package.json'),
            __DIR__.'/../resources/exam/User.php' => base_path('app/Models/User.php'),
            __DIR__.'/../resources/exam/webpack.mix.js' => base_path('webpack.mix.js'),
            __DIR__.'/../resources/exam/web.php' => base_path('routes/web.php'),
            __DIR__.'/../resources/assets/img' => public_path('img'),
            __DIR__.'/../resources/assets/svg' => resource_path('views/svg'),
            __DIR__.'/../resources/exam/AccountSeeder.php' => base_path('database/seeders/AccountSeeder.php'),
            __DIR__.'/../resources/exam/DatabaseSeeder.php' => base_path('database/seeders/DatabaseSeeder.php'),

        ], 'frontend.source');

        // Publishing the translation files.
        /*$this->publishes([
        __DIR__.'/../resources/lang' => resource_path('lang/vendor/phobrv'),
         */

        // Registering package commands.
        // $this->commands([]);
    }
}
