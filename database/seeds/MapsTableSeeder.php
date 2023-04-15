<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('maps')->insert([
            'shopname'=>'海',
            'address'=>'宮前平',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
