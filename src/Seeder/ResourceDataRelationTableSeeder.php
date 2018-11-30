<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataRelationTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceDataRelation::query()
            ->create([	'id' => '501', 	'resource_data' => '501', 	'relation' => '511', 	'nest_relation1' => '518', 												])
            ->create([	'id' => '502', 	'resource_data' => '501', 	'relation' => '512', 	'nest_relation1' => '518', 												])
            ->create([	'id' => '503', 	'resource_data' => '503', 	'relation' => '513', 													])
            ->create([	'id' => '504', 	'resource_data' => '503', 	'relation' => '514', 													])
            ->create([	'id' => '505', 	'resource_data' => '503', 	'relation' => '515', 													])
            ->create([	'id' => '506', 	'resource_data' => '503', 	'relation' => '516', 	'nest_relation1' => '521', 												])
            ->create([	'id' => '507', 	'resource_data' => '503', 	'relation' => '517', 	'nest_relation1' => '526', 												])
            ->create([	'id' => '508', 	'resource_data' => '503', 	'relation' => '517', 	'nest_relation1' => '523', 												])
            ->create([	'id' => '509', 	'resource_data' => '503', 	'relation' => '517', 	'nest_relation1' => '524', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
