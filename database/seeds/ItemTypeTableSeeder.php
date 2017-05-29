<?php

use Illuminate\Database\Seeder;

class ItemTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_types')->truncate();

        DB::table('item_types')->insert([
            ['id' => 1, 'name' => "Water Bottles"],
            ['id' => 2, 'name' => "Clothes"],
            ['id' => 3, 'name' => "Tents"],
        ]);
    }
}
