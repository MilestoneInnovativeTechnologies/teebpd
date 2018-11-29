<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceScopeTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceScope::query()
            ->create([	'id' => '501', 	'resource' => '301', 	'name' => 'ItemGroupCategory', 	'description' => 'Category from Item Group', 	'method' => 'category', 											])
            ->create([	'id' => '502', 	'resource' => '301', 	'name' => 'ItemGroupBrand', 	'description' => 'Brand from Item Group', 	'method' => 'brand', 											])
            ->create([	'id' => '503', 	'resource' => '301', 	'name' => 'ItemGroupSize', 	'description' => 'Size from Item Group', 	'method' => 'size', 											])
            ->create([	'id' => '504', 	'resource' => '301', 	'name' => 'ItemGroupColor', 	'description' => 'Color from Item Group', 	'method' => 'color', 											])
            ->create([	'id' => '505', 	'resource' => '305', 	'name' => 'WishlistVendorActive', 	'description' => 'Wishlists which are shared with vendor', 	'method' => 'vendorShare', 											])
            ->create([	'id' => '506', 	'resource' => '303', 	'name' => 'ImageStatus', 	'description' => 'Get image status', 	'method' => 'statusOnly', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
