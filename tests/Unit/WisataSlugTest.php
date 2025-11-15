<?php

namespace Tests\Unit;

use App\Models\Wisata;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class WisataSlugTestSlugTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function generates_slug_from_title()
    {
        
        $user = User::create([
            'name' => 'Test User 1',
            'username' => 'testuser1',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $wisata = Wisata::create([
            'title'     => 'Test Judul wisata',
            'content'   => 'Test Isi',
            'user_id'   => $user->id,
        ]);

        $this->assertEquals('test-judul-wisata', $wisata->slug);
    }

    /** @test */
    public function slug_must_be_unique()
    {
        
        $user = User::create([
            'name' => 'Test User 2',
            'username' => 'testuser2',
            'email' => 'test2@example.com',
            'password' => Hash::make('password'),
        ]);

        $wisata1 = Wisata::create([
            'title' => 'Wisata',
            'content' => 'test wisata aaaaaaa',
            'user_id' => $user->id,
        ]);

        $wisata2 = Wisata::create([
            'title' => 'Wisata',
            'content' => 'Test wisata bbbbbb',
            'user_id' => $user->id,
        ]);

        $this->assertEquals('wisata', $wisata1->slug);

        $this->assertEquals('wisata-1', $wisata2->slug);
    }
}