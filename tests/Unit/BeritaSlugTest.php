<?php

namespace Tests\Unit;

use App\Models\Berita;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class BeritaSlugTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function generates_slug_from_title()
    {
        $category = Category::create(['name' => 'Kegiatan']);
        
        $user = User::create([
            'name' => 'Test User 1',
            'username' => 'testuser1',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $berita = Berita::create([
            'title'     => 'Test Judul Berita',
            'content'   => 'Test Isi',
            'category_id' => $category->id,
            'user_id'   => $user->id,
        ]);

        $this->assertEquals('test-judul-berita', $berita->slug);
    }

    /** @test */
    public function slug_must_be_unique()
    {
        $category = Category::create(['name' => 'Pariwisata']);
        
        $user = User::create([
            'name' => 'Test User 2',
            'username' => 'testuser2',
            'email' => 'test2@example.com',
            'password' => Hash::make('password'),
        ]);

        $berita1 = Berita::create([
            'title' => 'Berita Travel',
            'content' => 'Test Berita aaaaaaa',
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);

        $berita2 = Berita::create([
            'title' => 'Berita Travel',
            'content' => 'Test Berita bbbbbb',
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);

        $this->assertEquals('berita-travel', $berita1->slug);

        $this->assertEquals('berita-travel-1', $berita2->slug);
    }
}