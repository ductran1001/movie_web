<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountrySeeder extends Seeder
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
                'title' => 'Việt Nam',
            ],
            [
                'title' => 'Nhật Bản',
            ],
            [
                'title' => 'Hàn Quốc',
            ],
            [
                'title' => 'Mỹ',
            ],
        ];

        foreach ($array as $arr) {
            $arr['slug'] = Str::slug($arr['title']); 
            DB::table('categories')->insert($arr);
        }
    }
}

