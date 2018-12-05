<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceAction::query()
            ->create([	'id' => '501', 	'resource' => '301', 	'name' => 'CategoryListAction', 	'description' => 'Action to call list of categories', 	'title' => 'Categories', 		'menu' => 'Categories', 									])
            ->create([	'id' => '502', 	'resource' => '301', 	'name' => 'BrandsListAction', 	'description' => 'Action to call list of brands', 	'title' => 'Brands', 		'menu' => 'Brands', 									])
            ->create([	'id' => '503', 	'resource' => '301', 	'name' => 'SizeListAction', 	'description' => 'Action to call list of size', 	'title' => 'Sizes', 		'menu' => 'Size', 									])
            ->create([	'id' => '504', 	'resource' => '301', 	'name' => 'ColorListAction', 	'description' => 'Action to call list of colors', 	'title' => 'Colors', 		'menu' => 'Colors', 									])
            ->create([	'id' => '505', 	'resource' => '302', 	'name' => 'ProductsListAction', 	'description' => 'Action to list all products', 	'title' => 'Products', 		'menu' => 'Products', 									])
            ->create([	'id' => '506', 	'resource' => '304', 	'name' => 'VisitorListAction', 	'description' => 'Action to list all visitor', 	'title' => 'Visitors', 		'menu' => 'Visitors', 									])
            ->create([	'id' => '507', 	'resource' => '304', 	'name' => 'VisitorAddAction', 	'description' => 'Action to add a visitor', 	'title' => 'Add Visitor', 		'menu' => 'Create Visitor', 									])
            ->create([	'id' => '508', 	'resource' => '305', 	'name' => 'WishlistListAction', 	'description' => 'Action to list all wishlist', 	'title' => 'Wishlists', 		'menu' => 'Wishlists', 									])
            ->create([	'id' => '509', 	'resource' => '305', 	'name' => 'WishlistCreateAction', 	'description' => 'Action to create a wishlist', 	'title' => 'Create a Wish List', 		'menu' => 'Create Wish List', 									])
            ->create([	'id' => '510', 	'resource' => '305', 	'name' => 'VendorWishlistAction', 	'description' => 'Action to list all wishlists which are shared with vendor', 	'title' => 'Wish Lists', 		'menu' => 'Vendor Wishlists', 									])
            ->create([	'id' => '511', 	'resource' => '301', 	'name' => 'CategoryProductsListAction', 	'description' => 'Action to list all products of a category', 	'title' => 'Products', 											])
            ->create([	'id' => '512', 	'resource' => '301', 	'name' => 'BrandProductsListAction', 	'description' => 'Action to list all products of a brand', 	'title' => 'Products', 											])
            ->create([	'id' => '513', 	'resource' => '301', 	'name' => 'SizeProductsListAction', 	'description' => 'Action to list all products of a size', 	'title' => 'Products', 											])
            ->create([	'id' => '514', 	'resource' => '301', 	'name' => 'ColorProductsListAction', 	'description' => 'Action to list all products of a color', 	'title' => 'Products', 											])
            ->create([	'id' => '515', 	'resource' => '302', 	'name' => 'AddProductImageAction', 	'description' => 'Action to add a image for a product', 	'title' => 'Add Image', 											])
            ->create([	'id' => '516', 	'resource' => '302', 	'name' => 'ProductImagesListAction', 	'description' => 'Action to list all images of a product', 	'title' => 'Product Images', 											])
            ->create([	'id' => '517', 	'resource' => '303', 	'name' => 'ImageStatusChangeAction', 	'description' => 'Action to change status of a image', 	'title' => 'Change Image Status', 											])
            ->create([	'id' => '518', 	'resource' => '304', 	'name' => 'VisitorWishlistListAction', 	'description' => 'Action to list all wishlists of a visitor', 	'title' => 'Own Wishlists', 											])
            ->create([	'id' => '519', 	'resource' => '304', 	'name' => 'VisitorSharedWishlistListAction', 	'description' => 'Action to list all wishlist shared with this visitor', 	'title' => 'Shared Wishlists', 											])
            ->create([	'id' => '520', 	'resource' => '305', 	'name' => 'WishlistSharesListAction', 	'description' => 'Action to list all vistors whom with wishlist shared', 	'title' => 'Shares', 											])
            ->create([	'id' => '521', 	'resource' => '305', 	'name' => 'WishlistProductsListAction', 	'description' => 'List Item details of a wishlist', 	'title' => 'View Items', 											])
            ->create([	'id' => '522', 	'resource' => '304', 	'name' => 'VisitorDetailsAction', 	'description' => 'Action to view details of a visitor', 	'title' => 'Details', 											])
            ->create([	'id' => '523', 	'resource' => '305', 	'name' => 'WishlistMessagesListAction', 	'description' => 'Action to list all messages in a wishlist', 	'title' => 'View Messages', 											])
            ->create([	'id' => '524', 	'resource' => '305', 	'name' => 'ManageWishlistProductsAction', 	'description' => 'Action to manage products in a wishlist', 	'title' => 'Add/Remove Products', 											])
            ->create([	'id' => '525', 	'resource' => '305', 	'name' => 'ShareWishlistAction', 	'description' => 'Action to share wishlist with a visitor', 	'title' => 'Share Wish List', 											])
            ->create([	'id' => '526', 	'resource' => '305', 	'name' => 'WishlistDetailsAction', 	'description' => 'Action to view details of a wishlist', 	'title' => 'Details', 											])
            ->create([	'id' => '527', 	'resource' => '305', 	'name' => 'UpdateWishlistDetailsAction', 	'description' => 'Action to update wish list details', 	'title' => 'Update', 											])
            ->create([	'id' => '528', 	'resource' => '305', 	'name' => 'AddWishlistNoteAction', 	'description' => 'Action to add wishlist message', 	'title' => 'Add Note', 											])
            ->create([	'id' => '529', 	'resource' => '301', 	'name' => 'AlterWebListAction', 	'description' => 'Action to alter web listing of a item group', 	'title' => 'Alter Web Listing', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
