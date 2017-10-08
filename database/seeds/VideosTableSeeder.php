<?php

use App\Video;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->delete();

        $videos =
            [
                [
                    'user_id'           => 1,
                    'media_type_id'     => '1',
                    'condition_id'      => '1',
                    'title'             => 'Man on Fire',
                    'year'              => '2004',
                    'genres'            => 'Action, Crime, Drama',
                    'directors'         => 'Tony Scott',
                    'actors'            => 'Denzel Washington, Christopher Walken, Dakota Fanning',
                ],
                [
                    'user_id'           => 1,
                    'media_type_id'     => '1',
                    'condition_id'      => '1',
                    'title'             => 'Eastern Promises',
                    'year'              => '2007',
                    'genres'            => 'Crime, Drama, Mystery',
                    'directors'         => 'David Cronenberg',
                    'actors'            => 'Naomi Watts, Viggo Mortensen, Armin Mueller-Stahl',
                ]
            ];

        foreach ($videos as $video)
        {
            Video::create($video);
        }
    }
}