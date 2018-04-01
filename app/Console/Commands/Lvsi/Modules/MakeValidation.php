<?php

namespace App\Console\Commands\Lvsi\Modules;

use Illuminate\Console\GeneratorCommand;

class MakeValidation extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lvsi:makeValidation {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建验证层';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/repository.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Validations';
    }

}
