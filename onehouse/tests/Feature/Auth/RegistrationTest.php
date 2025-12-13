<?php

namespace Tests\Feature\Auth;

use App\Models\Phase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        parent::setUp();
        // phases テーブルに 1〜23 を作成
        foreach (range(1, 23) as $i) {
            Phase::create([
                'number' => $i,
                'list' => 'default', 
            ]);
        }
        $response = $this->post('/register', [
            'name' => 'Test User1',
            'email' => 'test1@example.com',
            'password' => 'password',
        ]);
        // $this->assertGuest();
        $this->assertAuthenticated();
        $response->assertRedirect('phase1');
    }
}
