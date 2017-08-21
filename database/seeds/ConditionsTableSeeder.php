<?php

use Illuminate\Database\Seeder;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conditions')->delete();

        $conditions =
            [
                ['name' => 'Brand New'],
                ['name' => 'Like New'],
                ['name' => 'Very Good'],
                ['name' => 'Good'],
                ['name' => 'Acceptable']
            ];

        DB::table('conditions')->insert($conditions);
    }
}
