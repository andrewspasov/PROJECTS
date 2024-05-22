<?php

namespace Tests\Feature;

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FootballMatchRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function only_admin_can_submit_the_form()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $response = $this->actingAs($user)->post('/route-using-the-request', []);
        $response->assertForbidden(); // or assertRedirect based on your application's handling

        $admin = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->post('/route-using-the-request', []);
        $response->assertOk(); // or any other expected outcome
    }

}
