<?php

use Illuminate\Database\Seeder;

class CountriesVideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country_video')->delete();

        $countries_videos =
            [
                [
                    'video_id'      => 1,
                    'country_id'    => 1
                ],
                [
                    'video_id'      => 2,
                    'country_id'    => 1
                ]
            ];

        foreach ($countries_videos as $cv)
        {
            DB::table('country_video')->insert($cv);
        }
    }
}
