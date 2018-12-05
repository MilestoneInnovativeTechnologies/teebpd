<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataScopeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_ = \DB::statement('SELECT @@GLOBAL.foreign_key_checks');
        \DB::statement('set foreign_key_checks = 0');
        \Milestone\Appframe\Model\ResourceDataScope::query()
            ->create([	'id' => '1', 	'resource_data' => '504', 	'scope' => '508', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
