<?php

use Illuminate\Database\Seeder;
use App\workDay;

class WorkDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 7; $i++) { 
            workDay::create([
                'day' => $i,
                'active' => ($i==3),
                'morning_start' => ($i==3 ? '07:00:00': '05:00:00'),
                'morning_end' => ($i==3 ? '09:30:00': '05:00:00'),
                'afternoon_start' => ($i==3 ? '16:00:00': '16:00:00'),
                'afternoon_end' => ($i==3 ? '18:00:00': '16:00:00'),
                'user_id' => 3
            ]);
        }
    }
}
