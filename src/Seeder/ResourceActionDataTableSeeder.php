<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionDataTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceActionData::query()
            ->create([	'id' => '501', 	'resource_action' => '527', 	'resource_data' => '503', 													])
            ->create([	'id' => '502', 	'resource_action' => '524', 	'resource_data' => '503', 													])
            ->create([	'id' => '503', 	'resource_action' => '525', 	'resource_data' => '503', 													])
            ->create([	'id' => '504', 	'resource_action' => '528', 	'resource_data' => '503', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
