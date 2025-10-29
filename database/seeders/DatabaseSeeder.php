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

        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('EceIIJsZJrb5QpH'), 
                'email_verified_at' => now(),
            ]
        );


        // Seed berita data
        $this->call(BeritaSeeder::class);

        // Seed jurusan data
        $this->call(JurusanSeeder::class);

        // Seed galeri data
        $this->call(GaleriSeeder::class);

        // Seed SPMB settings
        $this->call(SpmbSettingSeeder::class);

        // Seed prestasi data
        $this->call(PrestasiSeeder::class);

        // Seed ekstrakurikuler data
        $this->call(EkstrakurikulerSeeder::class);

        // Seed GTK settings
        $this->call(GtkSettingSeeder::class);

        // Seed FAQ data
        $this->call(FaqSeeder::class);
    }
}
