<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    /**
     * The list table.
     *
     * @var array
     */
    protected $tables = [
        'admins',
        //'event_options',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->startSeederRunning();

        $this->call([
            AdminSeeder::class,
            //EventOptionSeeder::class,
        ]);
    }

    /**
     * Delete items
     *
     * @return void
     */
    private function startSeederRunning()
    {
        $this->command->info('Truncating existing tables');

        foreach ($this->tables as $table) {
            DB::statement('DELETE FROM ' . $table);
        }
    }
}
