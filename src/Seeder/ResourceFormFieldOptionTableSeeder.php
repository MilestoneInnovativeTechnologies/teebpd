<?php

namespace Milestone\Teebpd\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldOptionTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormFieldOption::query()
            ->create([	'id' => '501', 	'form_field' => '504', 	'type' => 'enum', 													])
            ->create([	'id' => '502', 	'form_field' => '505', 	'type' => 'enum', 													])
            ->create([	'id' => '503', 	'form_field' => '515', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
