<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceListTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceList::query()
            ->create([	'id' => '501', 	'resource' => '301', 	'name' => 'CaregoryList', 	'description' => 'List all categories', 	'title' => 'Categories', 	'items_per_page' => '70', 										])
            ->create([	'id' => '502', 	'resource' => '301', 	'name' => 'BrandList', 	'description' => 'List all brands', 	'title' => 'Brands', 	'items_per_page' => '70', 										])
            ->create([	'id' => '503', 	'resource' => '301', 	'name' => 'SizeList', 	'description' => 'List all sizes', 	'title' => 'Size', 	'items_per_page' => '70', 										])
            ->create([	'id' => '504', 	'resource' => '301', 	'name' => 'ColorList', 	'description' => 'List all color', 	'title' => 'Color', 	'items_per_page' => '70', 										])
            ->create([	'id' => '505', 	'resource' => '302', 	'name' => 'ProductsList', 	'description' => 'Liast all products', 	'title' => 'Products', 											])
            ->create([	'id' => '506', 	'resource' => '304', 	'name' => 'VisitorsList', 	'description' => 'List all visitors', 	'title' => 'Visitors', 											])
            ->create([	'id' => '507', 	'resource' => '305', 	'name' => 'WishlistsList', 	'description' => 'List all wishlists', 	'title' => 'Wishlists', 											])
            ->create([	'id' => '508', 	'resource' => '305', 	'name' => 'VendorWishlist', 	'description' => 'List all wshlists in which shared with vendor', 	'title' => 'Wishlists', 											])
            ->create([	'id' => '509', 	'resource' => '308', 	'name' => 'WishlistNotesList', 	'description' => 'Messages for a wishlist', 	'title' => 'Messages/Notes', 											])
            ->create([	'id' => '510', 	'resource' => '303', 	'name' => 'ProductImagesList', 	'description' => 'List product images', 	'title' => 'Images', 	'items_per_page' => '10', 										])
            ->create([	'id' => '511', 	'resource' => '309', 	'name' => 'WishlistItemsList', 	'description' => 'List items in a wishlist', 	'title' => 'Products', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
