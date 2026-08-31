<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StarterSmokeTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_reachable(): void
    {
        $this->get('/login')->assertOk()->assertSee('EAD Laboratory');
    }

    public function test_demo_user_can_sign_in(): void
    {
        $this->seed();

        $response = $this->post('/login', [
            'email' => 'demo@eadlaboratory.test',
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard')->assertSessionHas('demo_user_id');
    }

    public function test_room_catalog_and_reservation_list_are_reachable_after_sign_in(): void
    {
        $this->seed();
        $this->withSession(['demo_user_id' => 1]);

        $this->get('/rooms')->assertOk()->assertSee('Lab A-101');
        $this->get('/reservations')->assertOk()->assertSee('Praktikum Pemrograman Perangkat Lunak');
    }

    public function test_reservation_form_validates_required_shape_without_solving_business_rules(): void
    {
        $this->seed();
        $this->withSession(['demo_user_id' => 1]);

        $this->post('/reservations', [])->assertSessionHasErrors([
            'room_id', 'date', 'start_time', 'end_time', 'purpose', 'participant_count',
        ]);
    }
}
