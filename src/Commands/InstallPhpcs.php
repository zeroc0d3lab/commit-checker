<?php

namespace Zerocod3lab\CommitChecker\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;

class InstallPhpcs extends Command
{
    use ConfirmableTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'git:create-phpcs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default phpcs.xml';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $phpcs = base_path('vendor/zeroc0d3lab/commit-checker/phpcs.xml');
        $rootphpcs = base_path('phpcs.xml');

        // Checkout existence of sample phpcs.xml.
        if (!file_exists($phpcs)) {
            $this->error('The sample phpcs.xml does not exist! Try to reinstall zeroc0d3lab/commit-checker package!');

            return false;
        }

        // Checkout existence phpcs.xml in root path of project.
        if (file_exists($rootphpcs)) {
            if (!$this->confirmToProceed('phpcs.xml already exists, do you want to overwrite it?', true)) {
                return false;
            }

            //remove old phpcs.xml file form root
            unlink($rootphpcs);
        }

        $this->writePHPCS($phpcs, $rootphpcs)
            ? $this->info('Phpcs.xml successfully created!')
            : $this->error('Unable to create phpcs.xml');
    }

    /**
     * Copy phpcs.xml file to root and return true on success, false otherwise.
     *
     * @param string $phpcs
     * @param string $rootphpcs
     * @return bool
     */
    protected function writePHPCS(string $phpcs, string $rootphpcs): bool
    {
        // phpcs.xml file to root
        if (!copy($phpcs, $rootphpcs)) {
            return false;
        } else {
            return true;
        }
    }
}
