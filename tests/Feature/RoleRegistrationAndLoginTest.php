<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RoleRegistrationAndLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_register_admin_via_role_specific_route(): void
    {
        $response = $this->post('/register/admin', [
            'name' => 'Admin Baru',
            'email' => 'adminbaru@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('users', [
            'email' => 'adminbaru@example.com',
            'role' => 'admin',
        ]);
    }

    public function test_can_register_operasional_via_role_specific_route(): void
    {
        $response = $this->post('/register/operasional', [
            'name' => 'Operasional Baru',
            'email' => 'operasionalbaru@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('users', [
            'email' => 'operasionalbaru@example.com',
            'role' => 'operasional',
        ]);
    }

    public function test_can_login_as_any_registered_role(): void
    {
        User::factory()->create([
            'name' => 'Pimpinan Baru',
            'email' => 'pimpinanbaru@example.com',
            'password' => Hash::make('Password123!'),
            'role' => 'pimpinan',
        ]);

        $response = $this->post('/login', [
            'email' => 'pimpinanbaru@example.com',
            'password' => 'Password123!',
        ]);

        $response->assertRedirect();
        $this->assertAuthenticatedAs(User::where('email', 'pimpinanbaru@example.com')->first());
    }

    public function test_operasional_cannot_access_admin_pages(): void
    {
        User::factory()->create([
            'name' => 'Admin Satu',
            'email' => 'admin1@example.com',
            'password' => Hash::make('Password123!'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Operasional Satu',
            'email' => 'operasional1@example.com',
            'password' => Hash::make('Password123!'),
            'role' => 'operasional',
        ]);

        $this->actingAs(User::where('email', 'admin1@example.com')->first())
            ->get('/peti-kemas')
            ->assertOk();

        $this->actingAs(User::where('email', 'operasional1@example.com')->first())
            ->get('/peti-kemas')
            ->assertRedirect(route('dashboard'));
    }
}
