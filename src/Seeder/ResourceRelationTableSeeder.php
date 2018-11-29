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
            ->create([	'id' => '501', 	'resource' => '301', 	'name' => 'CategoryProducts', 	'description' => 'Products of a specified category', 	'method' => 'CategoryProducts', 	'type' => 'hasMany', 	'relate_resource' => '302', 									])
            ->create([	'id' => '502', 	'resource' => '301', 	'name' => 'BrandProducts', 	'description' => 'Products of a specified brand', 	'method' => 'BrandProducts', 	'type' => 'hasMany', 	'relate_resource' => '302', 									])
            ->create([	'id' => '503', 	'resource' => '301', 	'name' => 'SizeProducts', 	'description' => 'Products of a specified size', 	'method' => 'SizeProducts', 	'type' => 'hasMany', 	'relate_resource' => '302', 									])
            ->create([	'id' => '504', 	'resource' => '301', 	'name' => 'ColorProducts', 	'description' => 'Products of a specified color', 	'method' => 'ColorProducts', 	'type' => 'hasMany', 	'relate_resource' => '302', 									])
            ->create([	'id' => '505', 	'resource' => '302', 	'name' => 'ProductCategory', 	'description' => 'Details of category of this product belongs', 	'method' => 'Category', 	'type' => 'belongsTo', 	'relate_resource' => '301', 									])
            ->create([	'id' => '506', 	'resource' => '302', 	'name' => 'ProductBrand', 	'description' => 'Details of brand of this product belongs', 	'method' => 'Brand', 	'type' => 'belongsTo', 	'relate_resource' => '301', 									])
            ->create([	'id' => '507', 	'resource' => '302', 	'name' => 'ProductSize', 	'description' => 'Details of size of this product belongs', 	'method' => 'Size', 	'type' => 'belongsTo', 	'relate_resource' => '301', 									])
            ->create([	'id' => '508', 	'resource' => '302', 	'name' => 'ProductColor', 	'description' => 'Details of color of this product belongs', 	'method' => 'Color', 	'type' => 'belongsTo', 	'relate_resource' => '301', 									])
            ->create([	'id' => '509', 	'resource' => '302', 	'name' => 'ProductImages', 	'description' => 'Images of a product', 	'method' => 'Images', 	'type' => 'hasMany', 	'relate_resource' => '303', 									])
            ->create([	'id' => '510', 	'resource' => '302', 	'name' => 'ProductWishlists', 	'description' => 'Wishlists to which this product belongs to', 	'method' => 'Wishlists', 	'type' => 'belongsToMany', 	'relate_resource' => '305', 									])
            ->create([	'id' => '511', 	'resource' => '304', 	'name' => 'VisitorWishlist', 	'description' => 'Wishlists which are created by a visitor', 	'method' => 'Wishlists', 	'type' => 'hasMany', 	'relate_resource' => '305', 									])
            ->create([	'id' => '512', 	'resource' => '304', 	'name' => 'VisitorWishlistShared', 	'description' => 'Whishlists which are shared to a visitor', 	'method' => 'SharedWishlist', 	'type' => 'belongsToMany', 	'relate_resource' => '305', 									])
            ->create([	'id' => '513', 	'resource' => '305', 	'name' => 'WishlistAuthor', 	'description' => 'Author of a wishlist', 	'method' => 'Author', 	'type' => 'belongsTo', 	'relate_resource' => '304', 									])
            ->create([	'id' => '514', 	'resource' => '305', 	'name' => 'WishlistVendor', 	'description' => 'Vendor state details of a wishlist', 	'method' => 'Vendor', 	'type' => 'hasOne', 	'relate_resource' => '306', 									])
            ->create([	'id' => '515', 	'resource' => '305', 	'name' => 'WishlistVisitors', 	'description' => 'Visitors to whom with a wishlist shared', 	'method' => 'Visitors', 	'type' => 'belongsToMany', 	'relate_resource' => '304', 									])
            ->create([	'id' => '516', 	'resource' => '305', 	'name' => 'WishlistNotes', 	'description' => 'Notes or Messages shared on this basis of a wishlist', 	'method' => 'Notes', 	'type' => 'hasMany', 	'relate_resource' => '308', 									])
            ->create([	'id' => '517', 	'resource' => '305', 	'name' => 'WishlistItems', 	'description' => 'Item or product details in a wishlist', 	'method' => 'Items', 	'type' => 'hasMany', 	'relate_resource' => '309', 									])
            ->create([	'id' => '518', 	'resource' => '305', 	'name' => 'WishlistProducts', 	'description' => 'All products in a wishlist', 	'method' => 'Products', 	'type' => 'belongsToMany', 	'relate_resource' => '302', 									])
            ->create([	'id' => '519', 	'resource' => '307', 	'name' => 'VisitorWishlistDetails', 	'description' => 'Details of wishlist in a visitor wishlist', 	'method' => 'Wishlist', 	'type' => 'belongsTo', 	'relate_resource' => '305', 									])
            ->create([	'id' => '520', 	'resource' => '307', 	'name' => 'VisitorWishlistVisitor', 	'description' => 'Visitor details of a visitor wishlist entry', 	'method' => 'Visitor', 	'type' => 'belongsTo', 	'relate_resource' => '304', 									])
            ->create([	'id' => '521', 	'resource' => '308', 	'name' => 'WishlistNoteAuthor', 	'description' => 'Author details of a message on wishlist', 	'method' => 'Author', 	'type' => 'belongsTo', 	'relate_resource' => '304', 									])
            ->create([	'id' => '522', 	'resource' => '309', 	'name' => 'WishlistProductWishlist', 	'description' => 'Details of wishlist in a wishlist product entry', 	'method' => 'Wishlist', 	'type' => 'belongsTo', 	'relate_resource' => '305', 									])
            ->create([	'id' => '523', 	'resource' => '309', 	'name' => 'WishlistProductAddedBy', 	'description' => 'Visitor who added a product to wishlist', 	'method' => 'Added', 	'type' => 'belongsTo', 	'relate_resource' => '304', 									])
            ->create([	'id' => '524', 	'resource' => '309', 	'name' => 'WishlistProductRemovedBy', 	'description' => 'Visitor who removed a product to wishlist', 	'method' => 'Removed', 	'type' => 'belongsTo', 	'relate_resource' => '304', 									])
            ->create([	'id' => '525', 	'resource' => '309', 	'name' => 'WishlistProductNotes', 	'description' => 'Notes or Messages shared on this basis of a wishlist product', 	'method' => 'Notes', 	'type' => 'hasMany', 	'relate_resource' => '310', 									])
            ->create([	'id' => '526', 	'resource' => '309', 	'name' => 'WishlistProductDetails', 	'description' => 'Details of a product in wishlist product entry', 	'method' => 'Product', 	'type' => 'belongsTo', 	'relate_resource' => '302', 									])
            ->create([	'id' => '527', 	'resource' => '310', 	'name' => 'WishlistProductNoteAuthor', 	'description' => 'Author details of a message on wishlist product', 	'method' => 'Author', 	'type' => 'belongsTo', 	'relate_resource' => '304', 									])
            ->create([	'id' => '528', 	'resource' => '305', 	'name' => 'WishlistVisitorShare', 	'description' => 'Share details of a wishlist', 	'method' => 'Share', 	'type' => 'hasMany', 	'relate_resource' => '307', 									])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
