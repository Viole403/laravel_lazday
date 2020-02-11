<?php

use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courier = [
            [
                'name' => 'JNE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'name' => 'TIKI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'name' => 'POS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        // \App\Models\Courier::insert($courier);
        Courier::insert($courier);
    }
}
