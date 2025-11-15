<?php

namespace Tests\Unit;

use App\Models\Paket_wisata;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class PaketWisataSlugTest extends TestCase
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

        $paket_wisata = Paket_wisata::create([
            'title'   => 'Test Judul paket',
            'content' => 'Test Isi',
            'harga' => 100000,
            'user_id' => $user->id,
        ]);

        $this->assertEquals('test-judul-paket', $paket_wisata->slug);
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

        $paket_wisata1 = Paket_wisata::create([
            'title' => 'Paket Wisata',
            'content' => 'Test Paket aaaaaaa',
            'harga' => 100000,
            'user_id' => $user->id,
        ]);

        $paket_wisata2 = Paket_wisata::create([
            'title' => 'Paket Wisata',
            'content' => 'Test Paket bbbbbb',
            'harga' => 100000,
            'user_id' => $user->id,
        ]);

        $this->assertEquals('paket-wisata', $paket_wisata1->slug); 

        $this->assertEquals('paket-wisata-1', $paket_wisata2->slug);
    }
}