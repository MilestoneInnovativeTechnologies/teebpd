<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		UserTableSeeder::class,
		GroupTableSeeder::class,
		GroupUserTableSeeder::class,
		RoleTableSeeder::class,
		GroupRoleTableSeeder::class,
		ResourceTableSeeder::class,
		ResourceScopeTableSeeder::class,
		ResourceRelationTableSeeder::class,
		ResourceDataTableSeeder::class,
		ResourceDataRelationTableSeeder::class,
		ResourceDataScopeTableSeeder::class,
		ResourceDataViewSectionTableSeeder::class,
		ResourceDataViewSectionItemTableSeeder::class,
		ResourceListTableSeeder::class,
		ResourceListRelationTableSeeder::class,
		ResourceListScopeTableSeeder::class,
		ResourceListLayoutTableSeeder::class,
		ResourceListSearchTableSeeder::class,
		ResourceFormTableSeeder::class,
		ResourceFormDefaultTableSeeder::class,
		ResourceDefaultTableSeeder::class,
		ResourceActionTableSeeder::class,
		ResourceActionAttrTableSeeder::class,
		ResourceActionMethodTableSeeder::class,
		ResourceActionListTableSeeder::class,
		ResourceActionDataTableSeeder::class,
		ResourceRoleTableSeeder::class,
		ResourceFormFieldTableSeeder::class,
		ResourceFormFieldAttrTableSeeder::class,
		ResourceFormFieldDataTableSeeder::class,
		ResourceFormFieldValidationTableSeeder::class,
		ResourceFormFieldOptionTableSeeder::class,
		ResourceFormFieldDependTableSeeder::class,
		ResourceFormFieldDynamicTableSeeder::class,
		ResourceFormLayoutTableSeeder::class,
		ResourceFormCollectionTableSeeder::class,
		ResourceFormUploadTableSeeder::class,
		ResourceDashboardTableSeeder::class,
		ResourceDashboardSectionTableSeeder::class,
		ResourceDashboardSectionItemTableSeeder::class,
		ResourceMetricTableSeeder::class,
		OrganisationTableSeeder::class,
		OrganisationContactTableSeeder::class,
		BrandTableSeeder::class,
		CategoryTableSeeder::class,
		ProductTableSeeder::class,
		ProductImageTableSeeder::class,
		VisitorTableSeeder::class,
		WishlistTableSeeder::class,
		WishlistProductTableSeeder::class,
		VisitorWishlistTableSeeder::class,
		VendorWishlistTableSeeder::class,
		WishlistNoteTableSeeder::class,
		WishlistProductNoteTableSeeder::class,
    }
}
