<?php

namespace Milestone\Teebpd;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

use Milestone\Teebpd\Event\VisitorCreated;
use Milestone\Teebpd\Event\WishlistCreated;
use Milestone\Teebpd\Listener\AddWishlistVendor;
use Milestone\Teebpd\Listener\CheckAndCreateDefaultWishlist;

class TeebpdServiceProvider extends ServiceProvider
{

    protected $bootDataDir = __DIR__ . '/../';
    protected $bootData = [
        'loadRoutesFrom' => 'routes/web.php',
        'loadViewsFrom' => ['views','teebpd'],
        'loadMigrationsFrom' => 'migrations',
    ];

    protected $publishData = [
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
        $this->publishes($publishDataArray,'teebpd-update');

        Event::listen(WishlistCreated::class, AddWishlistVendor::class);
        Event::listen(VisitorCreated::class, CheckAndCreateDefaultWishlist::class);
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
