<?php

namespace App\Console\Commands\Lvsi\Modules;

use Illuminate\Console\Command;

class MakeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lvsi:makeModule {module} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $module = $this->argument('module') ;

        $this->call('lvsi:makeAction ' . $module );
        $this->call('lvsi:makeValidation ' . $module );
        $this->call('lvsi:makeRepository ' . $module );
    }
}
