<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Valve;
use App\Models\User;

class AuthTest extends TestCase {
    public $adminId = null;
    public $genericId = null;
    public $advancedId = null;
    public $premiumId = null;
    public $admin = null;
    public $generic = null;
    public $advanced = null;
    public $premium = null;

    protected function setUp(): void {
        parent::setUp();
        $this->adminId = intval(Valve::getValue('adminId'));
        $this->genericId = intval(Valve::getValue('genericId'));
        $this->advancedId = intval(Valve::getValue('advancedId'));
        $this->premiumId = intval(Valve::getValue('premiumId'));
        $this->admin = User::find($this->adminId);
        $this->generic = User::find($this->genericId);
        $this->advanced = User::find($this->advancedId);
        $this->premium = User::find($this->premiumId);
    }

    public function test_user_id_admin_exists(): void {
        $this->assertEquals(1,$this->adminId);
    }

    public function test_user_admin_is_correct(): void {
        $this->assertEquals(Valve::getValue('adminUserId'),$this->admin->user_id);
    } 

    public function test_user_id_generic_exists(): void {
        $this->assertEquals(2,$this->genericId);
    }

    public function test_user_generic_is_correct(): void {
        $this->assertEquals(Valve::getValue('genericUserId'),$this->generic->user_id);
    } 

    public function test_user_id_advanced_exists(): void {
        $this->assertEquals(6,$this->advancedId);
    }

    public function test_user_advanced_is_correct(): void {
        $this->assertEquals(Valve::getValue('advancedUserId'),$this->advanced->user_id);
    } 

    public function test_user_id_premium_exists(): void {
        $this->assertEquals(3,$this->premiumId);
    }

    public function test_user_premium_is_correct(): void {
        $this->assertEquals(Valve::getValue('premiumUserId'),$this->premium->user_id);
    } 

    public function test_the_application_returns_a_successful_response(): void {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_logout(): void {
        $response = $this->actingAs($this->generic)->get('/logout');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_unauthenticated_user_can_logout(): void {
        $response = $this->get('/logout');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_login_unauthenticated_redirects_to_home() {
        $response = $this->post('/login', [
            'email' => $this->generic->user_id,
            'password' => Valve::getValue('genericPw')
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_login_authenticated_redirects_to_home(): void {
        $response = $this->actingAs($this->generic)->get('/login');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_login_authenticated_post_redirects_to_home() {
        $response = $this->actingAs($this->generic)->post('/login', [
            'email' => $this->generic->user_id,
            'password' => Valve::getValue('genericPw')
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_the_faq_page_returns_a_successful_response(): void {
        $response = $this->get('/faq');
        $response->assertStatus(200);
    }

    public function test_wordgame_get_redirects_to_home(): void {
        $response = $this->get('/wordgame');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_unauthenticated_generates_game_successfully(): void {
        $response = $this->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 1,
            'x' => 13,
            'y' => 10,
            'count' => 12,
            'worddiff' => null,
            'difficulty' => 200
        ]);
        $response->assertStatus(200);
    }

    public function test_unauthenticated_cannot_generate_very_difficult_game(): void {
        $response = $this->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 3,
            'x' => 19,
            'y' => 14,
            'count' => 17,
            'worddiff' => null,
            'difficulty' => 350
        ]);
        $response->assertStatus(403);
    }

    public function test_unauthenticated_cannot_generate_insane_game(): void {
        $response = $this->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 4,
            'x' => 25,
            'y' => 16,
            'count' => 22,
            'worddiff' => null,
            'difficulty' => 550
        ]);
        $response->assertStatus(403);
    }

    public function test_generic_generates_game_successfully(): void {
        $response = $this->actingAs($this->generic)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 2,
            'x' => 15,
            'y' => 10,
            'count' => 12,
            'worddiff' => null,
            'difficulty' => 250
        ]);
        $response->assertStatus(200);
    }

    public function test_generic_cannot_generate_very_difficult_game(): void {
        $response = $this->actingAs($this->generic)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 3,
            'x' => 19,
            'y' => 14,
            'count' => 17,
            'worddiff' => null,
            'difficulty' => 350
        ]);
        $response->assertStatus(403);
    }

    public function test_generic_cannot_generate_insane_game(): void {
        $response = $this->actingAs($this->generic)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 4,
            'x' => 25,
            'y' => 16,
            'count' => 22,
            'worddiff' => null,
            'difficulty' => 550
        ]);
        $response->assertStatus(403);
    }

    public function test_advanced_generates_game_successfully(): void {
        $response = $this->actingAs($this->advanced)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 2,
            'x' => 15,
            'y' => 10,
            'count' => 12,
            'worddiff' => null,
            'difficulty' => 250
        ]);
        $response->assertStatus(200);
    }

    public function test_advanced_generates_very_difficult_game(): void {
        $response = $this->actingAs($this->advanced)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 3,
            'x' => 19,
            'y' => 14,
            'count' => 17,
            'worddiff' => null,
            'difficulty' => 350
        ]);
        $response->assertStatus(200);
    }

    public function test_advanced_cannot_generate_insane_game(): void {
        $response = $this->actingAs($this->advanced)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 4,
            'x' => 25,
            'y' => 16,
            'count' => 22,
            'worddiff' => null,
            'difficulty' => 550
        ]);
        $response->assertStatus(403);
    }

    public function test_premium_generates_game_successfully(): void {
        $response = $this->actingAs($this->premium)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 2,
            'x' => 15,
            'y' => 10,
            'count' => 12,
            'worddiff' => null,
            'difficulty' => 250
        ]);
        $response->assertStatus(200);
    }

    public function test_premium_generates_very_difficult_game(): void {
        $response = $this->actingAs($this->premium)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 3,
            'x' => 19,
            'y' => 14,
            'count' => 17,
            'worddiff' => null,
            'difficulty' => 350
        ]);
        $response->assertStatus(200);
    }

    public function test_premium_generates_insane_game(): void {
        $response = $this->actingAs($this->premium)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 4,
            'x' => 25,
            'y' => 16,
            'count' => 22,
            'worddiff' => null,
            'difficulty' => 550
        ]);
        $response->assertStatus(200);
    }

    public function test_admin_generates_game_successfully(): void {
        $response = $this->actingAs($this->admin)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 2,
            'x' => 15,
            'y' => 10,
            'count' => 12,
            'worddiff' => null,
            'difficulty' => 250
        ]);
        $response->assertStatus(200);
    }

    public function test_admin_generates_very_difficult_game(): void {
        $response = $this->actingAs($this->admin)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 3,
            'x' => 19,
            'y' => 14,
            'count' => 17,
            'worddiff' => null,
            'difficulty' => 350
        ]);
        $response->assertStatus(200);
    }

    public function test_admin_generates_insane_game(): void {
        $response = $this->actingAs($this->admin)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 4,
            'x' => 25,
            'y' => 16,
            'count' => 22,
            'worddiff' => null,
            'difficulty' => 550
        ]);
        $response->assertStatus(200);
    }

    public function test_the_contact_form_returns_a_successful_response(): void {
        $response = $this->get('/contact-form');
        $response->assertStatus(200);
    }
}