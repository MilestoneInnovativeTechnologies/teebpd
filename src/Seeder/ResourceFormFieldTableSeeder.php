<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormField::query()
            ->create([	'id' => '501', 	'resource_form' => '501', 	'name' => 'product', 	'type' => 'text', 	'label' => 'Product ID', 											])
            ->create([	'id' => '502', 	'resource_form' => '501', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name (if any)', 											])
            ->create([	'id' => '503', 	'resource_form' => '501', 	'name' => 'image', 	'type' => 'file', 	'label' => 'Image File', 											])
            ->create([	'id' => '504', 	'resource_form' => '501', 	'name' => 'default', 	'type' => 'select', 	'label' => 'default', 											])
            ->create([	'id' => '505', 	'resource_form' => '502', 	'name' => 'status', 	'type' => 'select', 	'label' => 'Change Status to', 											])
            ->create([	'id' => '506', 	'resource_form' => '503', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Visitors Name', 											])
            ->create([	'id' => '507', 	'resource_form' => '503', 	'name' => 'email', 	'type' => 'text', 	'label' => 'Email Address', 											])
            ->create([	'id' => '508', 	'resource_form' => '503', 	'name' => 'number', 	'type' => 'text', 	'label' => 'Contact Number', 											])
            ->create([	'id' => '509', 	'resource_form' => '504', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Wish List Name', 											])
            ->create([	'id' => '510', 	'resource_form' => '504', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description (if any)', 											])
            ->create([	'id' => '511', 	'resource_form' => '504', 	'name' => 'products', 	'type' => 'multiselect', 	'label' => 'Select Products', 											])
            ->create([	'id' => '512', 	'resource_form' => '505', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Wish List Name', 											])
            ->create([	'id' => '513', 	'resource_form' => '505', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description (if any)', 											])
            ->create([	'id' => '514', 	'resource_form' => '506', 	'name' => 'wishlist', 	'type' => 'text', 	'label' => 'Wishlist', 											])
            ->create([	'id' => '515', 	'resource_form' => '506', 	'name' => 'visitor', 	'type' => 'select', 	'label' => 'Select Visitor', 											])
            ->create([	'id' => '516', 	'resource_form' => '507', 	'name' => 'wishlist', 	'type' => 'text', 	'label' => 'Wishlist', 											])
            ->create([	'id' => '517', 	'resource_form' => '507', 	'name' => 'note', 	'type' => 'textarea', 	'label' => 'Message/Note', 											])
            ->create([	'id' => '518', 	'resource_form' => '508', 	'name' => 'list', 	'type' => 'select', 	'label' => 'List on Web', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
