<?php

use App\MediaType;
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

        foreach ($media_types as $media_type)
        {
            MediaType::create($media_type);
        }
    }
}
