<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DATA = [
            ['name' => 'Wash the dishes'],
            ['name' => 'Clean the house'],
            ['name' => 'Water the plants']
        ];

        foreach($DATA as $row) {
            DB::table('tasks')->insert($row);
        }
    }
}
