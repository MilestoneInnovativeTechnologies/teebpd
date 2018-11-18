<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceRelationTableSeeder extends Seeder
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
		\Milestone\Appframe\Model\ResourceRelation::query()																
		->create([	'resource' => '51', 	'name' => 'ProductBrand', 	'description' => 'The brand to which this product belongs to', 	'method' => 'Brand', 	'type' => 'belongsTo', 	'relate_resource' => '49', 										])
		->create([	'resource' => '51', 	'name' => 'ProductCategory', 	'description' => 'The category to which this product belongs to', 	'method' => 'Category', 	'type' => 'belongsTo', 	'relate_resource' => '50', 										])
		->create([	'resource' => '51', 	'name' => 'ProductImages', 	'description' => 'Images of a product', 	'method' => 'Images', 	'type' => 'hasMany', 	'relate_resource' => '52', 										])
		->create([	'resource' => '51', 	'name' => 'ProductWishlists', 	'description' => 'All Wishlists where this product have', 	'method' => 'Wishlists', 	'type' => 'belongsToMany', 	'relate_resource' => '54', 										])
		->create([	'resource' => '49', 	'name' => 'BrandProducts', 	'description' => 'All products of this brand', 	'method' => 'Products', 	'type' => 'hasMany', 	'relate_resource' => '51', 										])
		->create([	'resource' => '50', 	'name' => 'CategoryProducts', 	'description' => 'All products belongs to this category', 	'method' => 'Products', 	'type' => 'hasMany', 	'relate_resource' => '51', 										])
		->create([	'resource' => '53', 	'name' => 'VisitorWishlists', 	'description' => 'All wishlists created by a visitor. Visitor could be the author of said wishlist', 	'method' => 'Wishlists', 	'type' => 'hasMany', 	'relate_resource' => '54', 										])
		->create([	'resource' => '53', 	'name' => 'VisitorWishlistShared', 	'description' => 'All wishlists which are shared with a visitor.', 	'method' => 'SharedWishlist', 	'type' => 'belongsToMany', 	'relate_resource' => '54', 										])
		->create([	'resource' => '54', 	'name' => 'WishlistAuthor', 	'description' => 'Author of a wishlist. It could be a visitor or vendor', 	'method' => 'Author', 	'type' => 'belongsTo', 	'relate_resource' => '53', 										])
		->create([	'resource' => '54', 	'name' => 'WishlistVendorState', 	'description' => 'The state of a wishlist related to vendor. Whether share with vendor Active or Not, Vendor Viewed or Not details', 	'method' => 'Vendor', 	'type' => 'hasOne', 	'relate_resource' => '55', 										])
		->create([	'resource' => '54', 	'name' => 'WishlistVisitorShared', 	'description' => 'All visitors to whom with a wishlist shared. Active and Inactive status share are also listed, which should have pivot->status', 	'method' => 'Visitors', 	'type' => 'belongsToMany', 	'relate_resource' => '53', 										])
		->create([	'resource' => '54', 	'name' => 'WishlistNotes', 	'description' => 'Notes/Messages carried out on the basis of a wishlist.', 	'method' => 'Notes', 	'type' => 'hasMany', 	'relate_resource' => '57', 										])
		->create([	'resource' => '54', 	'name' => 'WishlistItems', 	'description' => 'Items/Product and added,removed details of a product which belongs to a wishlist', 	'method' => 'Items', 	'type' => 'hasMany', 	'relate_resource' => '58', 										])
		->create([	'resource' => '54', 	'name' => 'WishlistProducts', 	'description' => 'All products in a wishlist', 	'method' => 'Products', 	'type' => 'belongsToMany', 	'relate_resource' => '51', 										])
		->create([	'resource' => '57', 	'name' => 'WishlistNoteAuthor', 	'description' => 'Author of a message, which is carried out on the basis of a wishlist', 	'method' => 'Author', 	'type' => 'belongsTo', 	'relate_resource' => '53', 										])
		->create([	'resource' => '58', 	'name' => 'ItemWishlist', 	'description' => 'The wishlist to which this item belongs to.', 	'method' => 'Wishlist', 	'type' => 'belongsTo', 	'relate_resource' => '54', 										])
		->create([	'resource' => '58', 	'name' => 'ItemAddedBy', 	'description' => 'The visitor/vendor who added a item to a wishlist', 	'method' => 'Added', 	'type' => 'belongsTo', 	'relate_resource' => '53', 										])
		->create([	'resource' => '58', 	'name' => 'ItemRemovedBy', 	'description' => 'The visitor/author who removed an item from a wishlist', 	'method' => 'Removed', 	'type' => 'belongsTo', 	'relate_resource' => '53', 										])
		->create([	'resource' => '58', 	'name' => 'ItemNotes', 	'description' => 'Notes/Messages which are carried out on the basis of an item in a wishlist', 	'method' => 'Notes', 	'type' => 'hasMany', 	'relate_resource' => '59', 										])
		->create([	'resource' => '58', 	'name' => 'ItemProduct', 	'description' => 'Product details of an item in a wishlist', 	'method' => 'Product', 	'type' => 'belongsTo', 	'relate_resource' => '51', 										])
		->create([	'resource' => '59', 	'name' => 'WishlistProductNoteAuthor', 	'description' => 'Author of a message, which is carried out on the basis of a wishlist product', 	'method' => 'Author', 	'type' => 'belongsTo', 	'relate_resource' => '53', 										])
		;																
		\DB::statement('set foreign_key_checks = ' . $_);																
    }
}
