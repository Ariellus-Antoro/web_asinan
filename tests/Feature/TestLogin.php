<?php

namespace Tests\Feature;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    public function test_login_page_can_be_rendered()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('admin');
    }
}