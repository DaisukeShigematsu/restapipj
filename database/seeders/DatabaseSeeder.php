<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     *アプリケーションのデータベースをシードします。
     * @return void
     */
    public function run()
    {
        $this->call(RestsTableSeeder::class);
    }
}
