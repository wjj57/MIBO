<?php

namespace App\Console\Commands\Lvsi\Modules;

use Illuminate\Console\Command;

class DestroyModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lvsi:destroyModule {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '删除一个 Module = Action + Validation + Repository';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $module = $this->argument('module');

        try{

            $this->call('lvsi:makeAction', ['name' => $module]);
            $this->call('lvsi:makeValidation', ['name' => $module]);
            $this->call('lvsi:makeRepository', ['name' => $module]);
        }catch(\Exception $e){

            $this->call('lvsi:destroyModule') ;
        }

    }
}
