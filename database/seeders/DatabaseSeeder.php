<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(NoteSeeder::class);

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Alexander Fontler',
            'email' => 'mallexthewise@gmail.com',
            'password' => bcrypt('wertyuio'),
        ]);
    }
}
