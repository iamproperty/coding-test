<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    public function testRegisterEndpointReturnsCorrectView()
    {
        $response = $this->get(route('register.form'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function testPostOnRegisterSavesUser()
    {
        $data = [
            'email' => 'test@example.com',
            'name' => 'Test User',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'postcode' => 'NE1 1LE',
        ];

        $response = $this->post(route('register.store'), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('home'));

        unset($data['password']);
        unset($data['password_confirmation']);

        $this->assertDatabaseHas('users', $data);
    }

    public function testPostWithBadPostcodeDoesNotWork()
    {
        $data = [
            'email' => 'test@example.com',
            'name' => 'Test User',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'postcode' => 'ASDFASDF',
        ];

        $response = $this->post(route('register.store'), $data);
        $response->assertSessionHasErrors('postcode');
        $response->assertStatus(302);
    }
}
