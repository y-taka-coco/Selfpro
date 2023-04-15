<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('grades')->insert([
            'top'=> 4,
            'second'=> 4,
            'third'=> 4,
            'fourth'=>1,
            'income'=>20000,
            'spending'=>0,
            'date'=>'2022/01/01',
            'map_id'=>'1',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
