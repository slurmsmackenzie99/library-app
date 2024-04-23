<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Call other seeders here if needed
        $this->call([
            AuthorSeeder::class,
            BookSeeder::class,
            ComicSeeder::class,
            ShortStoryCollectionSeeder::class,
        ]);
    }
}

