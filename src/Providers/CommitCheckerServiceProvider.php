<?php

namespace Zerocod3lab\CommitChecker\Providers;

use Illuminate\Support\ServiceProvider;

class CommitCheckerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/commit-checker.php', 'commit-checker');

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../../config/commit-checker.php' => config_path('commit-checker.php')], 'config');
        }

        $this->app->register(CommandServiceProvider::class);
    }
}
