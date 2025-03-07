<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatesAndCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('States seeding started!');
        $this->runSqlFile(public_path('sql_files/states.sql'));
        $this->command->info('Cities seeding started!');
        $this->runSqlFile(public_path('sql_files/cities.sql'));
        $this->command->info('Cities seeded successfully!');

    }
    private function runSqlFile($path)
    {
        if (File::exists($path)) {
            $sql = File::get($path);
            DB::unprepared($sql); // Execute the SQL file
        } else {
            $this->command->error("SQL file not found: $path");
        }
    }
}
