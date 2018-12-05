<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldAttrTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormFieldAttr::query()
            ->create([	'id' => '501', 	'form_field' => '505', 	'name' => 'inline', 	'value' => '4', 												])
            ->create([	'id' => '502', 	'form_field' => '518', 	'name' => 'inline', 	'value' => '4', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
