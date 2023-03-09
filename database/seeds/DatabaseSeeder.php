<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_types')->insert([
            'name' => 'admin',
        ]);
        DB::table('accounts')->insert([
            'img' =>'a',
            'name' => 'admin',
            'password' => bcrypt('123456'),
            'fullname' => 'Mito Sweet',
            'email' => 'mitosweets.demo@gmail.com',
            'phone'=>'0938756845',
            'status' => '1',
            'type' => '1'
        ]);
        DB::table('account_roles')->insert([
            [
                'name' => 'Quản lý tin tức',
            ],
            [
                'name' => 'Quản lý liên hệ',
            ],
            [
                'name' => 'Quản lý nhận tin',
            ],
            [
                'name' => 'Quản lý video hướng dẫn',
            ],
            [
                'name' => 'Quản lý lịch học',
            ],
            [
                'name' => 'Quản lý giao diện',
            ],
            [
                'name' => 'Quản lý khóa học',
            ],
            [
                'name' => 'Quản lý bánh',
            ],
            [
                'name' => 'Quản lý doanh thu',
            ],
            [
                'name' => 'Quản lý tài khoản',
            ],
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
