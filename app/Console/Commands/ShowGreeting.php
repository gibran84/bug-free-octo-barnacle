<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShowGreeting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laracasts:greet {name=anonymous} {--greeting=Hi}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Say hello at your way!';

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
        
        $this->info($this->option('greeting') . ' Im ' . $this->argument('name'));
        
    }
}
