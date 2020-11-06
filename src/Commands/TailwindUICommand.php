<?php

namespace Ycore\FortifyUI\Commands;

use Illuminate\Console\Command;
use Ycore\FortifyUI\Support\ConfigurationParser;

class TailwindUICommand extends Command
{
    public $config;

    protected $signature = 'fortify-ui:tailwind
        {--views-only : Overwrite all existing views only }
        {--f|force : Overwrite any existing files - equivalent to --new }
        ';

    protected $description = 'Publishes Tailwind CSS-styled authentication blade views for FortifyUI';

    protected $provider = 'Ycore\FortifyUI\TailwindUIServiceProvider';
    protected $viewsTag = 'tailwind-views';

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
        if (! $this->publishAssets()) {
            $this->error('Some resources already exist. Use --views-only or --force to overwrite');
            return;
        }

        if (! $this->option('views-only')) {
            $this->config->appendHomeRoute(['register', 'reset']);
            $this->callSilent('fortify-ui:publish', ['--config' => true]);
            $this->config->updateEnabled(['register', 'reset']);
        }

        $this->call('fortify-ui:publish', ['--show-enabled' => true]);
        $this->info('FortifyUI Installed succesfully.');
    }

    /**
     * Publish the assets
     *
     * @return bool
     */
    protected function publishAssets()
    {
        $tag = $this->option('views-only') ? $this->viewsTag : null;

        $options = [
            '--provider' => $this->provider,
            '--force' => true,
        ];

        if ($tag !== null) {
            $options['--tag'] = $tag;
        }

        if (! $this->config->anyConflicts($this->provider, $tag) ||
            ! file_exists(config_path('fortify.php')) || $this->option('views-only') || $this->option('force')) {
            $this->callSilent('vendor:publish', $options);
            return true;
        }

        return false;
    }
}
