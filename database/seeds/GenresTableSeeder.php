<?php

use App\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->delete();

        $genres =
            [
                ['name' => 'Action'],
                ['name' => 'Adventure'],
                ['name' => 'Animation'],
                ['name' => 'Biography'],
                ['name' => 'Comedy'],
                ['name' => 'Crime'],
                ['name' => 'Documentary'],
                ['name' => 'Drama'],
                ['name' => 'Family'],
                ['name' => 'Fantasy'],
                ['name' => 'Film-Noir'],
                ['name' => 'History'],
                ['name' => 'Horror'],
                ['name' => 'Music'],
                ['name' => 'Musical'],
                ['name' => 'Mystery'],
                ['name' => 'Romance'],
                ['name' => 'Sci-Fi'],
                ['name' => 'Sport'],
                ['name' => 'Thriller'],
                ['name' => 'War'],
                ['name' => 'Western']
            ];

        foreach ($genres as $genre)
        {
            Genre::create($genre);
        }
    }
}
