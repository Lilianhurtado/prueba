<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([RoleSeeder::class
        ]);


        //crear usuario de prueba cada que se ejecuten migraciones
        User::factory()->create([
            'name' => 'joel andrade',
            'email' => 'joel@tecnm.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
