<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceTableSeeder extends Seeder
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
		\Milestone\Appframe\Model\Resource::query()																
		->create([	'name' => 'Brand', 	'description' => 'Brand Details', 	'title' => 'Brands', 	'namespace' => 'Milestone\Teebpd\Model', 	'table' => 'brands', 	'key' => 'id', 										])
		->create([	'name' => 'Category', 	'description' => 'Category Details', 	'title' => 'Categories', 	'namespace' => 'Milestone\Teebpd\Model', 	'table' => 'categories', 	'key' => 'id', 										])
		->create([	'name' => 'Product', 	'description' => 'Product Details', 	'title' => 'Products', 	'namespace' => 'Milestone\Teebpd\Model', 	'table' => 'products', 	'key' => 'id', 	'controller' => 'ProductController', 	'controller_namespace' => 'Milestone\Teebpd\Controller', 								])
		->create([	'name' => 'ProductImage', 	'description' => 'Images for a product', 	'title' => 'Product Images', 	'namespace' => 'Milestone\Teebpd\Model', 	'table' => 'product_images', 	'key' => 'id', 										])
		->create([	'name' => 'Visitor', 	'description' => 'Visitor Details', 	'title' => 'Visitors', 	'namespace' => 'Milestone\Teebpd\Model', 	'table' => 'visitors', 	'key' => 'id', 	'controller' => 'VisitorController', 	'controller_namespace' => 'Milestone\Teebpd\Controller', 								])
		->create([	'name' => 'Wishlist', 	'description' => 'Wishlists created by author or visitor', 	'title' => 'Wishlists', 	'namespace' => 'Milestone\Teebpd\Model', 	'table' => 'wishlists', 	'key' => 'id', 	'controller' => 'WishListController', 	'controller_namespace' => 'Milestone\Teebpd\Controller', 								])
		->create([	'name' => 'VendorWishlist', 	'description' => 'Wishlists which are shared with vendor', 	'title' => 'Wishlists', 	'namespace' => 'Milestone\Teebpd\Model', 	'table' => 'vendor_wishlists', 	'key' => 'id', 										])
		->create([	'name' => 'VisitorWishlist', 	'description' => 'Wishlists which are shared among other visitors', 	'title' => 'Wishlists', 	'namespace' => 'Milestone\Teebpd\Model', 	'table' => 'visitor_wishlists', 	'key' => 'id', 										])
		->create([	'name' => 'WishlistNote', 	'description' => 'Notes added by author or visitors on the basis of a Wishlist', 	'title' => 'Notes', 	'namespace' => 'Milestone\Teebpd\Model', 	'table' => 'wishlist_notes', 	'key' => 'id', 	'controller' => 'WishListProductController', 	'controller_namespace' => 'Milestone\Teebpd\Controller', 								])
		->create([	'name' => 'WishlistProduct', 	'description' => 'List of products which are added to a wishlist', 	'title' => 'Products', 	'namespace' => 'Milestone\Teebpd\Model', 	'table' => 'wishlist_products', 	'key' => 'id', 										])
		->create([	'name' => 'WishlistProductNote', 	'description' => 'Notes related to a product in a wishlist', 	'title' => 'Notes', 	'namespace' => 'Milestone\Teebpd\Model', 	'table' => 'wishlist_product_notes', 	'key' => 'id', 										])
		;																
		\DB::statement('set foreign_key_checks = ' . $_);																
    }
}
