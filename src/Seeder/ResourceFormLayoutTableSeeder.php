<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormLayoutTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormLayout::query()
            ->create([	'id' => '501', 	'resource_form' => '501', 	'form_field' => '501', 	'colspan' => '12', 												])
            ->create([	'id' => '502', 	'resource_form' => '501', 	'form_field' => '502', 	'colspan' => '6', 												])
            ->create([	'id' => '503', 	'resource_form' => '501', 	'form_field' => '504', 	'colspan' => '6', 												])
            ->create([	'id' => '504', 	'resource_form' => '501', 	'form_field' => '503', 	'colspan' => '12', 												])
            ->create([	'id' => '505', 	'resource_form' => '503', 	'form_field' => '506', 	'colspan' => '12', 												])
            ->create([	'id' => '506', 	'resource_form' => '503', 	'form_field' => '507', 	'colspan' => '6', 												])
            ->create([	'id' => '507', 	'resource_form' => '503', 	'form_field' => '508', 	'colspan' => '6', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
