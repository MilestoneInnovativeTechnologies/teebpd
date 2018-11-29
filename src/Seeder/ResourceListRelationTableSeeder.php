<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceListRelationTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceListRelation::query()
            ->create([	'id' => '501', 	'resource_list' => '505', 	'relation' => '505', 													])
            ->create([	'id' => '502', 	'resource_list' => '505', 	'relation' => '506', 													])
            ->create([	'id' => '503', 	'resource_list' => '505', 	'relation' => '507', 													])
            ->create([	'id' => '504', 	'resource_list' => '505', 	'relation' => '508', 													])
            ->create([	'id' => '505', 	'resource_list' => '507', 	'relation' => '513', 													])
            ->create([	'id' => '506', 	'resource_list' => '508', 	'relation' => '513', 													])
            ->create([	'id' => '507', 	'resource_list' => '509', 	'relation' => '521', 													])
            ->create([	'id' => '508', 	'resource_list' => '511', 	'relation' => '526', 													])
            ->create([	'id' => '509', 	'resource_list' => '511', 	'relation' => '523', 													])
            ->create([	'id' => '510', 	'resource_list' => '511', 	'relation' => '524', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
