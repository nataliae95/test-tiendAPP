<?php

namespace Database\Seeders;

use App\Models\Talla;
use Illuminate\Database\Seeder;

class TallasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Talla::updateOrCreate(['nombre' => 'S']);
        Talla::updateOrCreate(['nombre' => 'M']);
        Talla::updateOrCreate(['nombre' => 'L']);
    }
}
