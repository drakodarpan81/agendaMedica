<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'David Arámbula Rodríguez',
            'email' => 'drakodarpan@gmail.com',
            'password' => bcrypt('Dar123456'),
            'curp' => 'XXXX123456HNYRDV01',
            'phone' => '6671625915',
            'address' => 'Calle X 123'
        ]);

        $user->assignRole('Doctor');

        $user->doctor()->create();
    }
}
