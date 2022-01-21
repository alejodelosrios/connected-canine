<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setup();
        Role::create(['name' => 'Admin']);
    }

    /** @test */
    public function user_admin_can_access_to_accounts_screen()
    {
        $admin = User::factory()->create()->assignRole('Admin');
        $this->actingAs($admin);

        $response = $this->get(route('admin.accounts'));

        $response->assertStatus(200);
    }

    /** @test */
    public function only_user_admin_can_access_to_accounts_screen()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('admin.accounts'));

        $response->assertForbidden();
    }
}
