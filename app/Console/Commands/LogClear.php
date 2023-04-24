<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LogClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        exec('rm ' . storage_path('logs/*.log'));
        $this->info('Logs have been cleared!');
    }
}
