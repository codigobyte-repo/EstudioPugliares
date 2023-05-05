<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /* Creamos 9 usuario falsos */
        User::factory(9)->create();

        User::create([
            'name' => 'Martin Aquino',
            'email' => 'maquino@codigobyte.com.ar',
            'password' => bcrypt('Maquino*2030')
        ])->assignRole('Admin');
        
    }
}
