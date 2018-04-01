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
    protected $signature = 'lvsi:makeModule {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建一个完整的 Module = Action + Validation + Repository';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $module = $this->argument('module');

        try {

            $this->call('lvsi:makeAction', ['name' => $module]);
            $this->call('lvsi:makeValidation', ['name' => $module]);
            $this->call('lvsi:makeRepository', ['name' => $module]);
        } catch (\Exception $e) {

            $this->error('创建失败,因为此模块中的部分文件已存在,请自行处理');
            return ;
        }

        $this->info('创建成功') ;
        return;
    }
}