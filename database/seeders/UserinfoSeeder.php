<?php

namespace Database\Seeders;

use App\Models\Userinfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserinfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Userinfo::factory()->count(50)->create();
    }
}
