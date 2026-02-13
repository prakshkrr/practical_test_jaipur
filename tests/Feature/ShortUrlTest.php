<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use App\Models\ShortUrl;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShortUrlTest extends TestCase
{
    use RefreshDatabase;

    protected function createUser($role)
    {
        $company = Company::create(['name' => 'Test Company']);

        return User::create([
            'name' => $role,
            'email' => $role.'@test.com',
            'role' => $role,
            'company_id' => $role === 'SuperAdmin' ? null : $company->id,
            'password' => bcrypt('password'),
        ]);
    }

    public function test_admin_cannot_create_short_url()
    {
        $admin = $this->createUser('Admin');

        $this->actingAs($admin)
            ->post('/short-urls', [
                'original_url' => 'https://google.com'
            ])
            ->assertStatus(403);
    }

    public function test_member_cannot_create_short_url()
    {
        $member = $this->createUser('Member');

        $this->actingAs($member)
            ->post('/short-urls', [
                'original_url' => 'https://google.com'
            ])
            ->assertStatus(403);
    }

    public function test_superadmin_cannot_create_short_url()
    {
        $super = $this->createUser('SuperAdmin');

        $this->actingAs($super)
            ->post('/short-urls', [
                'original_url' => 'https://google.com'
            ])
            ->assertStatus(403);
    }

    public function test_short_urls_are_not_publicly_accessible()
    {
        $this->get('/abc123')
            ->assertStatus(404);
    }
}
