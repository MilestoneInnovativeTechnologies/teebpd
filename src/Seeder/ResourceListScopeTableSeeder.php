<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceListScopeTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceListScope::query()
            ->create([	'id' => '501', 	'resource_list' => '501', 	'scope' => '501', 													])
            ->create([	'id' => '502', 	'resource_list' => '502', 	'scope' => '502', 													])
            ->create([	'id' => '503', 	'resource_list' => '503', 	'scope' => '503', 													])
            ->create([	'id' => '504', 	'resource_list' => '504', 	'scope' => '504', 													])
            ->create([	'id' => '505', 	'resource_list' => '508', 	'scope' => '505', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
