<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\StudentSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            StudentSeeder::class,
        ]);
    }
}
