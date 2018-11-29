<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceData::query()
            ->create([	'id' => '501', 	'resource' => '304', 	'name' => 'VisitorDetails', 	'description' => 'View all details of a visitor', 	'title_field' => 'name', 											])
            ->create([	'id' => '502', 	'resource' => '303', 	'name' => 'ProductImageStatus', 	'description' => 'Get status of product image', 	'title_field' => 'status', 											])
            ->create([	'id' => '503', 	'resource' => '305', 	'name' => 'WishlistDetails', 	'description' => 'Getall details of a wishlist', 	'title_field' => 'name', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
