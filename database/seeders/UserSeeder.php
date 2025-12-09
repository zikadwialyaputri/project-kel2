<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name'     => 'Admin Utama',
            'email'    => 'admin@mail.com',
            'password' => bcrypt('admin123'),
            'role'     => 'admin', // pastikan kolom 'role' sudah ada di migration
        ]);

        // Staff
        User::create([
            'name'     => 'Staff Perpustakaan',
            'email'    => 'staff@mail.com',
            'password' => bcrypt('staff123'),
            'role'     => 'staff',
        ]);
    }
}
