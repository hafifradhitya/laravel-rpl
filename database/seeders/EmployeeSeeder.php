<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = ([
            ([
                "number_id" => "123",
                "division_id" => 1,
                "name" => "Ahmad",
                "gender" => "L",
                "birth_place" => "Cirebon",
                "birth_date" => "2000-04-21",
                "address" => "Gunjat"
            ]),
            ([
                "number_id" => "124",
                "division_id" => 2,
                "name" => "Budi",
                "gender" => "L",
                "birth_place" => "Cirebon",
                "birth_date" => "2000-02-03",
                "address" => "Talun"
            ]),
            ([
                "number_id" => "125",
                "division_id" => 3,
                "name" => "Cindy",
                "gender" => "P",
                "birth_place" => "Cirebon",
                "birth_date" => "2001-10-12",
                "address" => "Plered"
            ])
        ]);
        Employee::insert($data);
    }
}
