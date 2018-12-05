<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldDataTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormFieldData::query()
            ->create([	'id' => '501', 	'form_field' => '501', 	'attribute' => 'product', 													])
            ->create([	'id' => '502', 	'form_field' => '502', 	'attribute' => 'name', 													])
            ->create([	'id' => '503', 	'form_field' => '503', 	'attribute' => 'image', 													])
            ->create([	'id' => '504', 	'form_field' => '504', 	'attribute' => 'default', 													])
            ->create([	'id' => '505', 	'form_field' => '505', 	'attribute' => 'status', 													])
            ->create([	'id' => '506', 	'form_field' => '506', 	'attribute' => 'name', 													])
            ->create([	'id' => '507', 	'form_field' => '507', 	'attribute' => 'email', 													])
            ->create([	'id' => '508', 	'form_field' => '508', 	'attribute' => 'number', 													])
            ->create([	'id' => '509', 	'form_field' => '509', 	'attribute' => 'name', 													])
            ->create([	'id' => '510', 	'form_field' => '510', 	'attribute' => 'description', 													])
            ->create([	'id' => '511', 	'form_field' => '511', 	'attribute' => 'product', 	'relation' => '518', 												])
            ->create([	'id' => '512', 	'form_field' => '512', 	'attribute' => 'name', 													])
            ->create([	'id' => '513', 	'form_field' => '513', 	'attribute' => 'description', 													])
            ->create([	'id' => '514', 	'form_field' => '514', 	'attribute' => 'wishlist', 													])
            ->create([	'id' => '515', 	'form_field' => '515', 	'attribute' => 'visitor', 													])
            ->create([	'id' => '516', 	'form_field' => '516', 	'attribute' => 'wishlist', 													])
            ->create([	'id' => '517', 	'form_field' => '517', 	'attribute' => 'note', 													])
            ->create([	'id' => '518', 	'form_field' => '518', 	'attribute' => 'list', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
