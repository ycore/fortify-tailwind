<?php

namespace Ycore\FortifyUI;

use Illuminate\Support\ServiceProvider;
use Ycore\FortifyUI\Commands\TailwindUICommand;

class TailwindUIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../stubs/tailwind/webpack.mix.js' => base_path('webpack.mix.js'),
                __DIR__ . '/../stubs/tailwind/resources/css' => base_path('resources/css'),
            ], 'tailwind-scaffold');

            $this->publishes([
                __DIR__ . '/../stubs/tailwind/resources/views' => base_path('resources/views'),
            ], 'tailwind-views');

            $this->commands([
                TailwindUICommand::class,
            ]);
        }
    }
}
