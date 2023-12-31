<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
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
            $arr['created_at'] = Carbon::now();
            $arr['status'] = rand(0, 1);
            DB::table('categories')->insert($arr);
        }
    }
}

