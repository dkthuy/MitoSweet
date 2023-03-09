<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'nick'  => 'trangchu',
                'title' => 'Trang chủ',
            ],
            [
                'nick'  => 'tructuyen',
                'title' => 'Khóa học trực tuyến',
            ],
            [
                'nick'  => 'datbanh',
                'title' => 'Đặt bánh',
            ],
            [
                'nick'  => 'gioithieu',
                'title' => 'Về chúng tôi',
            ],
        ]);
    }
}
