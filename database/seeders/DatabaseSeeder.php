<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // User::factory(7)->create();
        $user = User::factory()->create([
            'name' => 'Nigger Man',
            'email' => 'jeremy@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
/*
        Listing::create([
            'title' => 'Laravel Senior Developer',
            'tags' => 'laravel, javascript',
            'company' => 'Acme Corp',
            'location' => 'Boston, MA',
            'email' => 'email@email.com',
            'website' => 'https://www.acme.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);

        Listing::create([
            'title' => 'Client Master',
            'tags' => 'laravel, javascript, Phyton',
            'company' => 'Acme Corp, Calavera',
            'location' => 'Boston, MA',
            'email' => 'mayma@email.com',
            'website' => 'https://laragogs.acme.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et ambot unsay pasabot ani storyaah illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);

        /* Example of creating a single user
        User::factory()->create([
            'name' => 'Test User',  
            'email' => 'test@example.com',
        ]);
        */
    }
}
