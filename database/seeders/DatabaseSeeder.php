<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Berita;
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
        User::factory()->create([
            'name' => 'Admin1',
            'username' => 'iniAdmin1',
            'email' => 'email@gmail.com'
        ]);
        $categories=[
            'Kegiatan',
            'Pariwisata',
            'Prestasi',
            'Lingkungan',
            'Budaya',
        ];

        foreach($categories as $category){
            Category::create(['name' =>$category]);
        }
        
    }
 

}
