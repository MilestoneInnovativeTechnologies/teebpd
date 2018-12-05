<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionMethodTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceActionMethod::query()
            ->create([	'id' => '501', 	'resource_action' => '501', 	'type' => 'List', 		'idn1' => '501', 											])
            ->create([	'id' => '502', 	'resource_action' => '502', 	'type' => 'List', 		'idn1' => '502', 											])
            ->create([	'id' => '503', 	'resource_action' => '503', 	'type' => 'List', 		'idn1' => '503', 											])
            ->create([	'id' => '504', 	'resource_action' => '504', 	'type' => 'List', 		'idn1' => '504', 											])
            ->create([	'id' => '505', 	'resource_action' => '505', 	'type' => 'List', 		'idn1' => '505', 											])
            ->create([	'id' => '506', 	'resource_action' => '506', 	'type' => 'List', 		'idn1' => '506', 											])
            ->create([	'id' => '507', 	'resource_action' => '507', 	'type' => 'Form', 		'idn1' => '503', 											])
            ->create([	'id' => '508', 	'resource_action' => '508', 	'type' => 'List', 		'idn1' => '507', 											])
            ->create([	'id' => '509', 	'resource_action' => '509', 	'type' => 'Form', 		'idn1' => '504', 											])
            ->create([	'id' => '510', 	'resource_action' => '510', 	'type' => 'List', 		'idn1' => '508', 											])
            ->create([	'id' => '511', 	'resource_action' => '511', 	'type' => 'ListRelation', 		'idn1' => '501', 	'idn2' => '505', 										])
            ->create([	'id' => '512', 	'resource_action' => '512', 	'type' => 'ListRelation', 		'idn1' => '502', 	'idn2' => '505', 										])
            ->create([	'id' => '513', 	'resource_action' => '513', 	'type' => 'ListRelation', 		'idn1' => '503', 	'idn2' => '505', 										])
            ->create([	'id' => '514', 	'resource_action' => '514', 	'type' => 'ListRelation', 		'idn1' => '504', 	'idn2' => '505', 										])
            ->create([	'id' => '515', 	'resource_action' => '515', 	'type' => 'AddRelation', 		'idn1' => '509', 	'idn2' => '501', 										])
            ->create([	'id' => '516', 	'resource_action' => '516', 	'type' => 'ListRelation', 		'idn1' => '509', 	'idn2' => '510', 										])
            ->create([	'id' => '517', 	'resource_action' => '517', 	'type' => 'FormWithData', 		'idn1' => '502', 	'idn2' => '502', 										])
            ->create([	'id' => '518', 	'resource_action' => '518', 	'type' => 'ListRelation', 		'idn1' => '511', 	'idn2' => '507', 										])
            ->create([	'id' => '519', 	'resource_action' => '519', 	'type' => 'ListRelation', 		'idn1' => '512', 	'idn2' => '507', 										])
            ->create([	'id' => '520', 	'resource_action' => '520', 	'type' => 'ListRelation', 		'idn1' => '515', 	'idn2' => '506', 										])
            ->create([	'id' => '521', 	'resource_action' => '521', 	'type' => 'ListRelation', 		'idn1' => '517', 	'idn2' => '511', 										])
            ->create([	'id' => '522', 	'resource_action' => '522', 	'type' => 'Data', 		'idn1' => '501', 											])
            ->create([	'id' => '523', 	'resource_action' => '523', 	'type' => 'ListRelation', 		'idn1' => '516', 	'idn2' => '509', 										])
            ->create([	'id' => '524', 	'resource_action' => '524', 	'type' => 'ManageRelation', 		'idn1' => '518', 	'idn2' => '505', 										])
            ->create([	'id' => '525', 	'resource_action' => '525', 	'type' => 'AddRelation', 		'idn1' => '528', 	'idn2' => '506', 										])
            ->create([	'id' => '526', 	'resource_action' => '526', 	'type' => 'Data', 		'idn1' => '503', 											])
            ->create([	'id' => '527', 	'resource_action' => '527', 	'type' => 'FormWithData', 		'idn1' => '505', 	'idn2' => '503', 										])
            ->create([	'id' => '528', 	'resource_action' => '528', 	'type' => 'AddRelation', 		'idn1' => '516', 	'idn2' => '507', 										])
            ->create([	'id' => '529', 	'resource_action' => '529', 	'type' => 'FormWithData', 		'idn1' => '508', 	'idn2' => '504', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
