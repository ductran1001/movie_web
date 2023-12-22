<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
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
                'title' => 'Phim mới',
            ],
            [
                'title' => 'Phim lẻ',
            ],
            [
                'title' => 'Phim bộ',
            ],
            [
                'title' => 'Phim trinh thám',
            ],
        ];

        foreach ($array as $arr) {
            $arr['slug'] = Str::slug($arr['title']); // Generate slug from title
            DB::table('categories')->insert($arr);
        }
    }
}

