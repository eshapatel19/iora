<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalutationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salutations')->truncate();

        DB::table('salutations')->insert([
            ["name" => "Mr.", "status"=>1],
            ["name" => "Mrs.", "status"=>1],
            ["name" => "Miss.", "status"=>1],
            ["name" => "Dr.", "status"=>1],
            ["name" => "Prof.", "status"=>1],
            ["name" => "Sir.", "status"=>1],
            ["name" => "Madame.", "status"=>1],
        ]);
    }
}
