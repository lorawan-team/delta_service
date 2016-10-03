<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DeviceTableSeeder extends Seeder
{
    public function run()
    {
        for($x = 1; $x <= 10; $x++) {
            DB::table('device')->insert([
                'name' => 'DEVICE' . $x,
                'alias' => 'testdevice ' . $x,
                'token' => str_random(20),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}