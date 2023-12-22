<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'title' => 'Kinh dị',
            ],
            [
                'title' => 'Trinh thám',
            ],
            [
                'title' => 'Tình cảm',
            ],
            [
                'title' => 'Hài hước',
            ],
        ];

        foreach ($array as $arr) {
            $arr['slug'] = Str::slug($arr['title']); 
            $arr['created_at'] = Carbon::now();
            $arr['status'] = rand(0, 1);
            DB::table('genres')->insert($arr);
        }
    }
}

