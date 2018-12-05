<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionListTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceActionList::query()
            ->create([	'id' => '501', 	'resource_action' => '511', 	'resource_list' => '501', 													])
            ->create([	'id' => '502', 	'resource_action' => '512', 	'resource_list' => '502', 													])
            ->create([	'id' => '503', 	'resource_action' => '513', 	'resource_list' => '503', 													])
            ->create([	'id' => '504', 	'resource_action' => '514', 	'resource_list' => '504', 													])
            ->create([	'id' => '505', 	'resource_action' => '515', 	'resource_list' => '505', 													])
            ->create([	'id' => '506', 	'resource_action' => '516', 	'resource_list' => '505', 													])
            ->create([	'id' => '507', 	'resource_action' => '517', 	'resource_list' => '510', 													])
            ->create([	'id' => '508', 	'resource_action' => '518', 	'resource_list' => '506', 													])
            ->create([	'id' => '509', 	'resource_action' => '519', 	'resource_list' => '506', 													])
            ->create([	'id' => '510', 	'resource_action' => '520', 	'resource_list' => '507', 													])
            ->create([	'id' => '511', 	'resource_action' => '521', 	'resource_list' => '507', 													])
            ->create([	'id' => '512', 	'resource_action' => '522', 	'resource_list' => '506', 													])
            ->create([	'id' => '513', 	'resource_action' => '523', 	'resource_list' => '507', 													])
            ->create([	'id' => '514', 	'resource_action' => '524', 	'resource_list' => '507', 													])
            ->create([	'id' => '515', 	'resource_action' => '525', 	'resource_list' => '507', 													])
            ->create([	'id' => '516', 	'resource_action' => '526', 	'resource_list' => '507', 													])
            ->create([	'id' => '517', 	'resource_action' => '528', 	'resource_list' => '507', 													])
            ->create([	'id' => '518', 	'resource_action' => '529', 	'resource_list' => '501', 													])
            ->create([	'id' => '519', 	'resource_action' => '529', 	'resource_list' => '502', 													])
            ->create([	'id' => '520', 	'resource_action' => '529', 	'resource_list' => '503', 													])
            ->create([	'id' => '521', 	'resource_action' => '529', 	'resource_list' => '504', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
