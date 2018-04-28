<?php


namespace App\Console\Commands;


use Illuminate\Console\Command;

class DeleteModule extends Command
{

    /**
     * 控制台命令 signature 的名称。
     *
     * @var string
     */
    protected $signature = 'lvsi:deleteModule {moduleName} {wantToDeleteAll?}';

    /**
     * 控制台命令说明。
     *
     * @var string
     */
    protected $description = 'deleteModule 删除一个 module';

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

        // 模块名切割成2部分
        $sections = explode('/', $moduleName);

        $this->call("lvsi:deleteRoute", ['moduleName' => $moduleName]);
        $this->call("lvsi:deleteController", ['moduleName' => $moduleName]);
        $this->call("lvsi:deleteInput", ['moduleName' => $moduleName]);
        $this->call("lvsi:deleteBusiness", ['moduleName' => $moduleName]);
        $this->call("lvsi:deleteOutput", ['moduleName' => $moduleName]);
        $this->call("lvsi:deleteShared", ['moduleName' => $moduleName]);

        $this->info("{$sections[1]} 模块删除成功");

        // 是否想要删除此module全部的内容 ( php artisan lvsi:deleteModule workflowOfAdmin/courseOnline y )
        $wantToDeleteAll = strtolower($this->argument("wantToDeleteAll"));
        if ($wantToDeleteAll === 'y') {

            if(is_dir($dir = base_path( "{$sections[0]}/moduleOf" . ucwords($sections[1]) ))){

                system('rm -rf ' . $dir );
                $this->info("{$sections[1]} 模块删除成功 - 全部删除");
            }
        }
    }

}

