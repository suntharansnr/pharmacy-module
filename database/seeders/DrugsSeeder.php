<?php

namespace Database\Seeders;

use App\Models\Drug;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drugs = [
            'Abilify',
            'Adderall',
            'Adderall XR',
            'Adrenaline',
            'Albuterol Sulfate',
            'Aldactone',
        ];

        foreach($drugs as $key => $drug){
            Drug::create([
                'name' => $drug,
                'price' => rand(1,100)
            ]);
        }
    }
}
