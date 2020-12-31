<?php

use Illuminate\Database\Seeder;
use App\Bottom;


class BottomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bottom::create(['bottom'=>'士昕版權所有']);
    }
}
