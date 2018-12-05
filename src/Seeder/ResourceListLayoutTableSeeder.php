<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceListLayoutTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceListLayout::query()
            ->create([	'id' => '501', 	'resource_list' => '501', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '502', 	'resource_list' => '501', 	'label' => 'Web List', 	'field' => 'list', 												])
            ->create([	'id' => '503', 	'resource_list' => '501', 	'label' => 'Type', 	'field' => 'type', 												])
            ->create([	'id' => '504', 	'resource_list' => '501', 	'label' => 'Status', 	'field' => 'status', 												])
            ->create([	'id' => '505', 	'resource_list' => '502', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '506', 	'resource_list' => '502', 	'label' => 'Web List', 	'field' => 'list', 												])
            ->create([	'id' => '507', 	'resource_list' => '502', 	'label' => 'Type', 	'field' => 'type', 												])
            ->create([	'id' => '508', 	'resource_list' => '502', 	'label' => 'Status', 	'field' => 'status', 												])
            ->create([	'id' => '509', 	'resource_list' => '503', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '510', 	'resource_list' => '503', 	'label' => 'Web List', 	'field' => 'list', 												])
            ->create([	'id' => '511', 	'resource_list' => '503', 	'label' => 'Type', 	'field' => 'type', 												])
            ->create([	'id' => '512', 	'resource_list' => '503', 	'label' => 'Status', 	'field' => 'status', 												])
            ->create([	'id' => '513', 	'resource_list' => '504', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '514', 	'resource_list' => '504', 	'label' => 'Web List', 	'field' => 'list', 												])
            ->create([	'id' => '515', 	'resource_list' => '504', 	'label' => 'Type', 	'field' => 'type', 												])
            ->create([	'id' => '516', 	'resource_list' => '504', 	'label' => 'Status', 	'field' => 'status', 												])
            ->create([	'id' => '517', 	'resource_list' => '505', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '518', 	'resource_list' => '505', 	'label' => 'Category', 	'field' => 'name', 	'relation' => '505', 											])
            ->create([	'id' => '519', 	'resource_list' => '505', 	'label' => 'Brand', 	'field' => 'name', 	'relation' => '506', 											])
            ->create([	'id' => '520', 	'resource_list' => '505', 	'label' => 'Size', 	'field' => 'name', 	'relation' => '507', 											])
            ->create([	'id' => '521', 	'resource_list' => '505', 	'label' => 'Color', 	'field' => 'name', 	'relation' => '508', 											])
            ->create([	'id' => '522', 	'resource_list' => '506', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '523', 	'resource_list' => '506', 	'label' => 'Email', 	'field' => 'email', 												])
            ->create([	'id' => '524', 	'resource_list' => '506', 	'label' => 'Number', 	'field' => 'number', 												])
            ->create([	'id' => '525', 	'resource_list' => '507', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '526', 	'resource_list' => '507', 	'label' => 'Author', 	'field' => 'name', 	'relation' => '513', 											])
            ->create([	'id' => '527', 	'resource_list' => '507', 	'label' => 'Description', 	'field' => 'description', 												])
            ->create([	'id' => '528', 	'resource_list' => '508', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '529', 	'resource_list' => '508', 	'label' => 'Author', 	'field' => 'name', 	'relation' => '513', 											])
            ->create([	'id' => '530', 	'resource_list' => '508', 	'label' => 'Description', 	'field' => 'description', 												])
            ->create([	'id' => '531', 	'resource_list' => '509', 	'label' => 'ID', 	'field' => 'id', 												])
            ->create([	'id' => '532', 	'resource_list' => '509', 	'label' => 'Message', 	'field' => 'note', 												])
            ->create([	'id' => '533', 	'resource_list' => '509', 	'label' => 'Author', 	'field' => 'name', 	'relation' => '521', 											])
            ->create([	'id' => '534', 	'resource_list' => '510', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '535', 	'resource_list' => '510', 	'label' => 'Status', 	'field' => 'status', 												])
            ->create([	'id' => '536', 	'resource_list' => '511', 	'label' => 'Product', 	'field' => 'name', 	'relation' => '526', 											])
            ->create([	'id' => '537', 	'resource_list' => '511', 	'label' => 'Added By', 	'field' => 'name', 	'relation' => '523', 											])
            ->create([	'id' => '538', 	'resource_list' => '511', 	'label' => 'Removed By', 	'field' => 'name', 	'relation' => '524', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
