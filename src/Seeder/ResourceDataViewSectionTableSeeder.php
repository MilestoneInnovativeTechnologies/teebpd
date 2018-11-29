<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataViewSectionTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceDataViewSection::query()
            ->create([	'id' => '501', 	'resource_data' => '501', 		'title_field' => 'name', 		'colspan' => '12', 										])
            ->create([	'id' => '502', 	'resource_data' => '501', 	'title' => 'Wish Lists', 		'relation' => '511', 	'colspan' => '6', 										])
            ->create([	'id' => '503', 	'resource_data' => '510', 	'title' => 'Shared Wishlists', 		'relation' => '512', 	'colspan' => '6', 										])
            ->create([	'id' => '504', 	'resource_data' => '503', 		'title_field' => 'name', 		'colspan' => '12', 										])
            ->create([	'id' => '505', 	'resource_data' => '503', 	'title' => 'Sharing With', 		'relation' => '515', 	'colspan' => '12', 										])
            ->create([	'id' => '506', 	'resource_data' => '503', 	'title' => 'Products', 		'relation' => '517', 	'colspan' => '12', 										])
            ->create([	'id' => '507', 	'resource_data' => '503', 	'title' => 'Messages/Notes', 		'relation' => '516', 	'colspan' => '12', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
