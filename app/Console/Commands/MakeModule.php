<?php


namespace App\Console\Commands;


use Illuminate\Console\Command;

class MakeModule extends Command
{

    /**
     * 控制台命令 signature 的名称。
     *
     * @var string
     */
    protected $signature = 'lvsi:makeModule {moduleName}';

    /**
     * 控制台命令说明。
     *
     * @var string
     */
    protected $description = 'makeModule 创建一个 module';

    /**
     * 创建一个新的命令实例。
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 执行控制台命令。
     *
     * @
     */
    public function handle()
    {
        // 只输入模块名即可 , 不用再输入 moduleOf
        $moduleName = $this->argument('moduleName');

        $this->call("lvsi:makeRoute", ['moduleName' => $moduleName]);
        $this->call("lvsi:makeController", ['moduleName' => $moduleName]);
        $this->call("lvsi:makeInput", ['moduleName' => $moduleName]);
        $this->call("lvsi:makeBusiness", ['moduleName' => $moduleName]);
        $this->call("lvsi:makeOutput", ['moduleName' => $moduleName]);
        $this->call("lvsi:makeShared", ['moduleName' => $moduleName]);


    }

}