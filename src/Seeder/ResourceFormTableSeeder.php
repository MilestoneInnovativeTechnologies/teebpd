<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceForm::query()
            ->create([	'id' => '501', 	'resource' => '303', 	'name' => 'AddProductImageForm', 	'description' => 'Form to add image for a product', 	'title' => 'Add Product Image', 	'action_text' => 'Add Image', 										])
            ->create([	'id' => '502', 	'resource' => '303', 	'name' => 'ChangeImageStatus', 	'description' => 'Make a product image status to active or inactive', 	'title' => 'Change Image Status', 	'action_text' => 'Update Status', 										])
            ->create([	'id' => '503', 	'resource' => '304', 	'name' => 'Add New Visitor', 	'description' => 'Create a new visitor', 	'title' => 'Add Visitor', 	'action_text' => 'Add Visitor', 										])
            ->create([	'id' => '504', 	'resource' => '305', 	'name' => 'CreateNewWishlistForm', 	'description' => 'A form to create a new wishlist', 	'title' => 'Create Wish List', 	'action_text' => 'Create Wish List', 										])
            ->create([	'id' => '505', 	'resource' => '305', 	'name' => 'UpdateWishlistForm', 	'description' => 'Form used to update wishlist details', 	'title' => 'Update Wish List Details', 	'action_text' => 'Update', 										])
            ->create([	'id' => '506', 	'resource' => '307', 	'name' => 'AddWishlistVisitorForm', 	'description' => 'Share wishlist with a visitor', 	'title' => 'Add Visitor', 	'action_text' => 'Add Visitor', 										])
            ->create([	'id' => '507', 	'resource' => '308', 	'name' => 'AddWishlistNote', 	'description' => 'Add a message to wishlist', 	'title' => 'New Message', 	'action_text' => 'Add Message', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
