<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \App\Models\Role::create('roles')([
            ['roleName' => 'admin'],
            ['roleName' => 'cliente'],
            // Agregar más filas según sea necesario
        ]);

    }
}
