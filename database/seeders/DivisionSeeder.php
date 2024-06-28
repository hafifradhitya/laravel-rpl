<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $divisions = ([
            ([
                "name" => "Umum"
            ]),
            ([
                "name" => "Marketing"
            ]),
            ([
                "name" => "IT"
            ]),
        ]);

        Division::insert($divisions);
    }
}
