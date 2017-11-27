<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('employees')->insert([
            'first_name' => "Jen",
            'last_name' => "Sadauskas"
        ]);

        DB::table('employees')->insert([
            'first_name' => "Derrick",
            'last_name' => "Ward"
        ]);

        DB::table('employees')->insert([
            'first_name' => "Stephen",
            'last_name' => "Mogensen"
        ]);
    }
}
