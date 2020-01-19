<?php

namespace Zerocod3lab\CommitChecker\Providers;

use Zerocod3lab\CommitChecker\Commands\InstallHooks;
use Zerocod3lab\CommitChecker\Commands\InstallPhpcs;
use Zerocod3lab\CommitChecker\Commands\PreCommitHook;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallHooks::class,
                PreCommitHook::class,
                InstallPhpcs::class,
            ]);
        }
    }
}
