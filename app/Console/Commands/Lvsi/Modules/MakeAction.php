<?php

namespace App\Console\Commands\Lvsi\Modules;

use Illuminate\Console\GeneratorCommand;

class MakeAction extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lvsi:makeAction {action} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Action';
    

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . './stubs/action.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Actions';
    }

}
