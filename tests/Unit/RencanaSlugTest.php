<?php

namespace Tests\Unit;

use App\Models\Rencana;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class RencanaSlugTestSlugTest extends TestCase
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

        $rencana = Rencana::create([
            'title'     => 'Test Judul rencana',
            'content'   => 'Test Isi',
            'user_id'   => $user->id,
        ]);

        $this->assertEquals('test-judul-rencana', $rencana->slug);
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

        $rencana1 = Rencana::create([
            'title' => 'Rencana',
            'content' => 'test rencana aaaaaaa',
            'user_id' => $user->id,
        ]);

        $rencana2 = Rencana::create([
            'title' => 'Rencana',
            'content' => 'Test rencana bbbbbb',
            'user_id' => $user->id,
        ]);

        $this->assertEquals('rencana', $rencana1->slug);

        $this->assertEquals('rencana-1', $rencana2->slug);
    }
}