<?php

use Illuminate\Database\Seeder;

class MediaTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_types')->delete();

        $media_types =
            [
                ['name' => 'DVD'],
                ['name' => 'Blu-ray disc'],
            ];

        DB::table('media_types')->insert($media_types);
    }
}
