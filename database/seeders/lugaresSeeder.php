<?php

namespace Database\Seeders;

use App\Models\lugares;
use Illuminate\Database\Seeder;

class lugaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        lugares::create([
            'row_name'=>'H',
            'limit' => 42,
        ]);
        lugares::create([
            'row_name'=>'I',
            'limit' => 42,
        ]);
        lugares::create([
            'row_name'=>'J',
            'limit' => 42,
        ]);
        lugares::create([
            'row_name'=>'K',
            'limit' => 42,
        ]);
        lugares::create([
            'row_name'=>'L',
            'limit' => 42,
        ]);
        lugares::create([
            'row_name'=>'M',
            'limit' => 42,
        ]);
        lugares::create([
            'row_name'=>'N',
            'limit' => 42,
        ]);
        lugares::create([
            'row_name'=>'O',
            'limit' => 42,
        ]);
        lugares::create([
            'row_name'=>'P',
            'limit' => 42,
        ]);
        lugares::create([
            'row_name'=>'Q',
            'limit' => 42,
        ]);
        lugares::create([
            'row_name'=>'R',
            'limit' => 41,
        ]);
        lugares::create([
            'row_name'=>'S',
            'limit' => 39,
        ]);
    }
}
