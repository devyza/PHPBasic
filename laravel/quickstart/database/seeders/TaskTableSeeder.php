<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $TIME = Carbon::now()->format('Y-m-d H:i:s');
        $DATA = [
            [
                'name' => 'Wash the dishes',
                'created_at' => $TIME,
                'updated_at' => $TIME
            ],
            [
                'name' => 'Clean the house',
                'created_at' => $TIME,
                'updated_at' => $TIME
            ],
            [
                'name' => 'Water the plants',
                'created_at' => $TIME,
                'updated_at' => $TIME
            ]
        ];

        foreach($DATA as $row) {
            DB::table('tasks')->insert($row);
        }
    }
}
