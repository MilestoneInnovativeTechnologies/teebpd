<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceListSearchTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceListSearch::query()
            ->create([	'id' => '501', 	'resource_list' => '501', 	'field' => 'name', 													])
            ->create([	'id' => '502', 	'resource_list' => '502', 	'field' => 'name', 													])
            ->create([	'id' => '503', 	'resource_list' => '503', 	'field' => 'name', 													])
            ->create([	'id' => '504', 	'resource_list' => '504', 	'field' => 'name', 													])
            ->create([	'id' => '505', 	'resource_list' => '505', 	'field' => 'description', 													])
            ->create([	'id' => '506', 	'resource_list' => '506', 	'field' => 'name', 													])
            ->create([	'id' => '507', 	'resource_list' => '506', 	'field' => 'email', 													])
            ->create([	'id' => '508', 	'resource_list' => '506', 	'field' => 'number', 													])
            ->create([	'id' => '509', 	'resource_list' => '507', 	'field' => 'name', 													])
            ->create([	'id' => '510', 	'resource_list' => '507', 	'field' => 'description', 													])
            ->create([	'id' => '511', 	'resource_list' => '508', 	'field' => 'name', 													])
            ->create([	'id' => '512', 	'resource_list' => '508', 	'field' => 'description', 													])
            ->create([	'id' => '513', 	'resource_list' => '509', 	'field' => 'note', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
