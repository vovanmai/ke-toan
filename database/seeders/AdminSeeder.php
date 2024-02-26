<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $dataInsert = [
            [
                'name' => 'Lionel Võ',
                'role' => Admin::ROLE_SUPPER_ADMIN,
                'email' => 'vovanmai.dt3@gmail.com',
                'password' => bcrypt('lionelvo@071094'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('admins')->insert($dataInsert);
    }
}
