<?php

namespace Ycore\FortifyUI\Commands;

use Illuminate\Console\Command;
use Ycore\FortifyUI\Support\ConfigurationParser;

class TailwindUICommand extends Command
{
    public $config;

    protected $signature = 'fortify-ui:tailwind
        {--new : Overwrite any existing resources in a new installation }
        {--views-only : Overwrite all existing views only }
        {--f|force : Overwrite any existing files - equivalent to --new }
        ';

    protected $description = 'Publishes Tailwind CSS-styled authentication blade views for FortifyUI';

    public function __construct()
    {
        $this->config = new ConfigurationParser;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (! $this->publishAssets('tailwind-views', $this->option('views-only'))) {
            $this->error('Authentication views exist. Use --views-only or --force to overwrite');
            return;
        };

        if (! $this->option('views-only')) {
            if (! $this->publishAssets('tailwind-scaffold')) {
                $this->error('Some resources already exist. Use --new or --force to overwrite');
                return;
            };
        }

        $this->config->appendHomeRoute(['register', 'reset']);
        $this->callSilent('fortify-ui:publish', ['--config' => true]);
        $this->config->updateEnabled(['register', 'reset']);
        $this->call('fortify-ui:publish', ['--show-enabled' => true]);

    }

    protected function publishAssets($tag, $override = false)
    {
        if (! $this->config->anyConflicts('Ycore\FortifyUI\TailwindUIServiceProvider', $tag) ||
            $override || $this->option('new') || $this->option('force')) {
            $this->callSilent('vendor:publish', [
                '--provider' => 'Ycore\FortifyUI\TailwindUIServiceProvider',
                '--tag' => $tag,
                '--force' => true,
            ]);
            return true;
        }

        return false;
    }
}
