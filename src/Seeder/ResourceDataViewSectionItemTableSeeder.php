<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataViewSectionItemTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceDataViewSectionItem::query()
            ->create([	'id' => '501', 	'section' => '501', 	'label' => 'Email Address', 	'attribute' => 'email', 												])
            ->create([	'id' => '502', 	'section' => '501', 	'label' => 'Contact Number', 	'attribute' => 'number', 												])
            ->create([	'id' => '503', 	'section' => '502', 	'label' => 'Name', 	'attribute' => 'name', 												])
            ->create([	'id' => '504', 	'section' => '502', 	'label' => 'Description', 	'attribute' => 'description', 												])
            ->create([	'id' => '505', 	'section' => '502', 	'label' => 'Products', 	'attribute' => 'name', 	'relation' => '518', 											])
            ->create([	'id' => '506', 	'section' => '503', 	'label' => 'Name', 	'attribute' => 'name', 												])
            ->create([	'id' => '507', 	'section' => '503', 	'label' => 'Description', 	'attribute' => 'description', 												])
            ->create([	'id' => '508', 	'section' => '503', 	'label' => 'Products', 	'attribute' => 'name', 	'relation' => '518', 											])
            ->create([	'id' => '509', 	'section' => '504', 	'label' => 'Author', 	'attribute' => 'name', 	'relation' => '513', 											])
            ->create([	'id' => '510', 	'section' => '504', 	'label' => 'Shared with Vendor', 	'attribute' => 'status', 	'relation' => '514', 											])
            ->create([	'id' => '511', 	'section' => '504', 	'label' => 'Description', 	'attribute' => 'description', 												])
            ->create([	'id' => '512', 	'section' => '505', 	'label' => 'Name', 	'attribute' => 'name', 												])
            ->create([	'id' => '513', 	'section' => '505', 	'label' => 'Email', 	'attribute' => 'email', 												])
            ->create([	'id' => '514', 	'section' => '505', 	'label' => 'Number', 	'attribute' => 'number', 												])
            ->create([	'id' => '515', 	'section' => '506', 	'label' => 'Product', 	'attribute' => 'name', 	'relation' => '526', 											])
            ->create([	'id' => '516', 	'section' => '506', 	'label' => 'Added By', 	'attribute' => 'name', 	'relation' => '523', 											])
            ->create([	'id' => '517', 	'section' => '506', 	'label' => 'Removed By', 	'attribute' => 'name', 	'relation' => '524', 											])
            ->create([	'id' => '518', 	'section' => '507', 	'label' => 'Note', 	'attribute' => 'note', 												])
            ->create([	'id' => '519', 	'section' => '507', 	'label' => 'Author', 	'attribute' => 'name', 	'relation' => '521', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
