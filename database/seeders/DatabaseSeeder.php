<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dean = User::factory()->create([
            'name' => 'Dean',
            'username' => 'dean',
            'email' => 'dean@gmail.com'
        ]);

        $zoro = User::factory()->create([
            'name' => 'Zoro',
            'username' => 'zoro',
            'email' => 'zoro@gmail.com'
        ]);

        $khantminaung = User::factory()->create([
            'name' => 'Khantminaung',
            'username' => 'khantminaung',
            'email' => 'khantminaung@gmail.com',
            'password' => '12345678',
            'is_admin' => true
        ]);

        $frontend = Category::factory()->create([
            'name' => 'frontend',
            'slug' => 'frontend'
        ]);

        $backend = Category::factory()->create([
            'name' => 'backend',
            'slug' => 'backend'
        ]);        
        
        Blog::factory(2)->create([
            'category_id' => $frontend->id,
            'user_id' => $zoro->id
        ]);

        Blog::factory(2)->create([
            'category_id' => $backend->id,
            'user_id' => $dean->id
        ]);

        Blog::factory(4)->create([
            'category_id' => $backend->id,
            'user_id' => $khantminaung->id
        ]);
    }
}
