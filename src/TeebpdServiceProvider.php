<?php

namespace Milestone\Teebpd;

use Illuminate\Support\ServiceProvider;

class TeebpdServiceProvider extends ServiceProvider
{

    protected $bootDataDir = __DIR__ . '/../';
    protected $bootData = [
        'loadRoutesFrom' => 'routes/web.php',
        'loadViewsFrom' => ['views','teebpd'],
        'loadMigrationsFrom' => 'migrations',
    ];

    protected $publishData = [
        'config' => ['config_path','/'],
        'assets' => ['public_path','teebpd'],
        'views' => ['resource_path','views/milestone/teebpd'],
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
	 
    public function boot()
    {
        $bootDir = $this->bootDataDir;
        foreach ($this->bootData as $method => $data){
            $args = (array) $data;
            $args[0] = $bootDir . $args[0];
            call_user_func_array([$this,$method],$args);
        }

        $publishDataArray = [];
        foreach ($this->publishData as $from => $data){
            $source = $bootDir . $from;
            $destination = call_user_func($data[0],$data[1]);
            $publishDataArray[$source] = $destination;
        }

        $this->publishes($publishDataArray);
        $this->publishes($publishDataArray,'update');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/filesystems.php', 'filesystems.disks'
        );
    }
}
