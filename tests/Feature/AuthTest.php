<?php

/*
    Feature tests for the app.
    IMPORTANT: Do NOT use RefreshDatabase
    IMPORTANT: Test the full suite! 
               Some of these tests alter the database in some ways. Some don't.
               So, if you filter, you may get worng results.
               Also, the database would be inconsistent.
    If the database needs rebuilding:
        1) php artisan migrate:fresh --seed
        2) Run the listed console commands
        3) Login as admin and execute the listed queries
*/

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Valve;
use App\Models\User;
use App\Models\Score;
use App\Models\Role;
use App\Models\Pronoun;
use App\Models\Locale;
use Illuminate\Support\Str;
use App\Models\UserUpdate;
use App\Models\DeletedRoleUser;
use Illuminate\Support\Facades\Hash;

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
        $this->adminId = User::getIdFromUserId((Valve::getValue('adminUserId')));
        $this->genericId = User::getIdFromUserId((Valve::getValue('genericUserId')));
        $this->advancedId = User::getIdFromUserId((Valve::getValue('advancedUserId')));
        $this->premiumId = User::getIdFromUserId((Valve::getValue('premiumUserId')));
        $this->admin = User::find($this->adminId);
        $this->generic = User::find($this->genericId);
        $this->advanced = User::find($this->advancedId);
        $this->premium = User::find($this->premiumId);
        $this->directDbQuery1 = "update valves set this_value = '";
        $this->directDbQuery2 = "' where this_key = 'dummy'";
    }

    public function test_user_admin_is_correct(): void {
        $this->assertEquals(Valve::getValue('adminUserId'),$this->admin->user_id);
    } 

    public function test_user_generic_is_correct(): void {
        $this->assertEquals(Valve::getValue('genericUserId'),$this->generic->user_id);
    } 

    public function test_user_advanced_is_correct(): void {
        $this->assertEquals(Valve::getValue('advancedUserId'),$this->advanced->user_id);
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
            'user_id' => $this->generic->user_id,
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
            'user_id' => $this->generic->user_id,
            'password' => Valve::getValue('genericPw')
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_failed_login_redirects_back() {
        $response = $this->post('/login', [
            'user_id' => $this->advanced->user_id,
            'password' => 'FakePW98765',
            'rememberMe' => true
        ]);
        $response->assertStatus(302);
        $response->assertInvalid(['user_id']);
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

    public function test_generic_score_max_id_is_valid(): void {
        $record = Score::fetchLastRecordByUserId($this->generic->user_id);
        if ($record === null) $flag = false;
        else $flag = $record->id >= 18;
        $this->assertTrue($flag);
    }

    public function test_advanced_score_max_id_is_valid(): void {
        $record = Score::fetchLastRecordByUserId($this->advanced->user_id);
        if ($record === null) $flag = false;
        else $flag = $record->id >= 19;
        $this->assertTrue($flag);
    }

    public function test_admin_score_max_id_is_valid(): void {
        $record = Score::fetchLastRecordByUserId($this->admin->user_id);
        if ($record === null) $flag = false;
        else $flag = $record->id >= 13;
        $this->assertTrue($flag);
    }

    public function test_unauthenticated_cannot_generate_insane_game(): void {
        $response = $this->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 4,
            'x' => 25,
            'y' => 16,
            'count' => 22,
            'worddiff' => null,
            'difficulty' => -1550
        ]);
        $response->assertStatus(403);
    }

    public function test_unauthenticated_cannot_generate_very_difficult_game(): void {
        $response = $this->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 3,
            'x' => 19,
            'y' => 14,
            'count' => 17,
            'worddiff' => null,
            'difficulty' => -1350
        ]);
        $response->assertStatus(403);
    }

    public function test_unauthenticated_generates_game_successfully(): void {
        $response = $this->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 1,
            'x' => 13,
            'y' => 10,
            'count' => 12,
            'worddiff' => null,
            'difficulty' => -1200
        ]);
        $response->assertStatus(200);
    }

    public function test_generic_cannot_generate_insane_game(): void {
        $response = $this->actingAs($this->generic)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 4,
            'x' => 25,
            'y' => 16,
            'count' => 22,
            'worddiff' => null,
            'difficulty' => -1550
        ]);
        $response->assertStatus(403);
    }

    public function test_generic_cannot_generate_very_difficult_game(): void {
        $response = $this->actingAs($this->generic)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 3,
            'x' => 19,
            'y' => 14,
            'count' => 17,
            'worddiff' => null,
            'difficulty' => -1350
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
            'difficulty' => -1250
        ]);
        $record = Score::fetchLastRecordByUserId($this->generic->user_id);
        $response->assertStatus(200);
        $this->assertTrue($record->user_id === $this->generic->user_id);
        $this->assertTrue($record->difficultyLevel === 2);
        $this->assertNull($record->score);
    }

    public function test_generic_completes_game_successfully(): void {
        $score_id = Score::fetchLastRecordByUserId($this->generic->user_id)->id;
        $gameScore = 400;
        $response = $this->actingAs($this->generic)->patch('/wordgame', [
            'score_id' => $score_id,
            'gameScore' => $gameScore
        ]);
        $record = Score::fetchLastRecordByUserId($this->generic->user_id);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertTrue($record->user_id === $this->generic->user_id);
        $this->assertTrue($record->difficultyLevel === 2);
        $this->assertNotNull($record->score);
    }

    public function test_generic_has_been_promoted(): void {
        $this->assertDatabaseHas('role_user', [ 'user_id' => $this->generic->id, 'role_id' => Role::getIdByName('user.advanced') ]);
    }

    public function test_remove_advanced_from_generic_if_needed(): void {
        if (User::userIdHasRole($this->generic->user_id, 'user.advanced'))
            $this->generic->roles()->detach(Role::where('name','user.advanced')->value('id'));
        $this->assertDatabaseMissing('role_user', [ 'user_id' => $this->generic->id, 'role_id' => Role::getIdByName('user.advanced') ]);
    }

    public function test_advanced_cannot_generate_insane_game(): void {
        $response = $this->actingAs($this->advanced)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 4,
            'x' => 25,
            'y' => 16,
            'count' => 22,
            'worddiff' => null,
            'difficulty' => -1550
        ]);
        $response->assertStatus(403);
    }

    public function test_advanced_generates_very_difficult_game(): void {
        $response = $this->actingAs($this->advanced)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 3,
            'x' => 19,
            'y' => 14,
            'count' => 17,
            'worddiff' => null,
            'difficulty' => -1350
        ]);
        $response->assertStatus(200);
    }

    public function test_advanced_completes_game_successfully(): void {
        $score_id = Score::fetchLastRecordByUserId($this->advanced->user_id)->id;
        $gameScore = 900;
        $response = $this->actingAs($this->advanced)->patch('/wordgame', [
            'score_id' => $score_id,
            'gameScore' => $gameScore
        ]);
        $record = Score::fetchLastRecordByUserId($this->advanced->user_id);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertTrue($record->user_id === $this->advanced->user_id);
        $this->assertTrue($record->difficultyLevel === 3);
        $this->assertNotNull($record->score);
    }

    public function test_advanced_generates_game_successfully(): void {
        $response = $this->actingAs($this->advanced)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 2,
            'x' => 15,
            'y' => 10,
            'count' => 12,
            'worddiff' => null,
            'difficulty' => -1250
        ]);
        $response->assertStatus(200);
    }

    public function test_remove_premium_from_advanced_if_needed(): void {
        if (User::userIdHasRole($this->advanced->user_id, 'user.premium'))
            $this->advanced->roles()->detach(Role::where('name','user.premium')->value('id'));
        if (User::userIdHasRole($this->advanced->user_id, 'user.premium.promo'))
            $this->advanced->roles()->detach(Role::where('name','user.premium.promo')->value('id'));
        $this->assertDatabaseMissing('role_user', [ 'user_id' => $this->advanced->id, 'role_id' => Role::getIdByName('user.premium') ]);
        $this->assertDatabaseMissing('role_user', [ 'user_id' => $this->advanced->id, 'role_id' => Role::getIdByName('user.premium.promo') ]);
    }

    public function test_premium_generates_insane_game(): void {
        $response = $this->actingAs($this->premium)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 4,
            'x' => 25,
            'y' => 16,
            'count' => 22,
            'worddiff' => null,
            'difficulty' => -1550
        ]);
        $response->assertStatus(200);
    }

    public function test_premium_completes_game_successfully(): void {
        $score_id = Score::fetchLastRecordByUserId($this->premium->user_id)->id;
        $gameScore = 1500;
        $response = $this->actingAs($this->premium)->patch('/wordgame', [
            'score_id' => $score_id,
            'gameScore' => $gameScore
        ]);
        $record = Score::fetchLastRecordByUserId($this->premium->user_id);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertTrue($record->user_id === $this->premium->user_id);
        $this->assertTrue($record->difficultyLevel === 4);
        $this->assertNotNull($record->score);
    }

    public function test_premium_generates_very_difficult_game(): void {
        $response = $this->actingAs($this->premium)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 3,
            'x' => 19,
            'y' => 14,
            'count' => 17,
            'worddiff' => null,
            'difficulty' => -1350
        ]);
        $response->assertStatus(200);
    }

    public function test_premium_generates_game_successfully(): void {
        $response = $this->actingAs($this->premium)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 2,
            'x' => 15,
            'y' => 10,
            'count' => 12,
            'worddiff' => null,
            'difficulty' => -1250
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
            'difficulty' => -1550
        ]);
        $response->assertStatus(200);
    }

    public function test_admin_completes_game_successfully(): void {
        $score_id = Score::fetchLastRecordByUserId($this->admin->user_id)->id;
        $gameScore = 1400;
        $response = $this->actingAs($this->admin)->patch('/wordgame', [
            'score_id' => $score_id,
            'gameScore' => $gameScore
        ]);
        $record = Score::fetchLastRecordByUserId($this->admin->user_id);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertTrue($record->user_id === $this->admin->user_id);
        $this->assertTrue($record->difficultyLevel === 4);
        $this->assertNotNull($record->score);
    }

    public function test_admin_generates_very_difficult_game(): void {
        $response = $this->actingAs($this->admin)->post('/wordgame', [
            'directions' => false,
            'difficultyLevel' => 3,
            'x' => 19,
            'y' => 14,
            'count' => 17,
            'worddiff' => null,
            'difficulty' => -1350
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
            'difficulty' => -1250
        ]);
        $response->assertStatus(200);
    }

    public function test_scores_are_cleansed(): void {
        $arr = [ $this->admin->user_id, $this->generic->user_id, $this->advanced->user_id, $this->premium->user_id ];
        Score::cleanse($arr);
        $this->assertEquals(0,Score::getCountForAfterCleansing($arr));
    }

    public function test_unauthenticated_cannot_access_querydb_get(): void {
        $response = $this->get('/querydb');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_generic_cannot_access_querydb_get(): void {
        $response = $this->actingAs($this->generic)->get('/querydb');
        $response->assertStatus(403);
    }

    public function test_admin_accesses_querydb_get(): void {
        $response = $this->actingAs($this->admin)->get('/querydb');
        $response->assertStatus(200);
    }

    public function test_unauthenticated_cannot_access_querydb_post(): void {
        $response = $this->get('/querydb');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_generic_cannot_access_querydb_post(): void {
        $response = $this->actingAs($this->generic)->get('/querydb');
        $response->assertStatus(403);
    }

    public function test_admin_accesses_querydb_post(): void {
        $response = $this->actingAs($this->admin)->get('/querydb');
        $response->assertStatus(200);
    }

    public function test_unauthenticated_cannot_access_directdb_get(): void {
        $response = $this->get('/directdb');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_generic_cannot_access_directdb_get(): void {
        $response = $this->actingAs($this->generic)->get('/directdb');
        $response->assertStatus(403);
    }

    public function test_admin_accesses_directdb_get(): void {
        $response = $this->actingAs($this->admin)->get('/directdb');
        $response->assertStatus(200);
    }

    public function test_unauthenticated_cannot_access_directdb_patch(): void {
        $rnd = strval(rand(1000000,9999999));
        $response = $this->patch('/directdb', [ 'query' => $this->directDbQuery1. $rnd. $this->directDbQuery2 ]);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_generic_cannot_access_directdb_patch(): void {
        $rnd = strval(rand(1000000,9999999));
        $response = $this->actingAs($this->generic)->patch('/directdb', [ 'query' => $this->directDbQuery1. $rnd. $this->directDbQuery2 ]);
        $response->assertStatus(403);
    }

    public function test_admin_executes_directdb_patch_successfully(): void {
        $rnd = strval(rand(1000000,9999999));
        $response = $this->actingAs($this->admin)->patch('/directdb', [ 'query' => $this->directDbQuery1. $rnd. $this->directDbQuery2 ]);
        $response->assertStatus(302);
        $this->assertEquals($rnd, Valve::getValue('dummy'));
        $response->assertRedirect('/');
    }

    public function test_contact_form_returns_a_successful_response(): void {
        $response = $this->get('/contact-form');
        $response->assertStatus(200);
    }

    public function test_contact_form_validation_error_redirects_back(): void {
        $response = $this->post('/contact-form', [
            User::MAIN_FIELD => null,
            'name' => 'Jane Doe',
            'email' => 'jane@doe.me',
            'message' => 'Testing..',
        ]);
        $response->assertStatus(302);
        $response->assertValid([User::MAIN_FIELD,'name','email','message']);
        $response->assertInvalid(['captcha']);
    }

    public function test_contact_form_with_bad_user_id_redirects_back(): void {
        $response = $this->post('/contact-form', [
            User::MAIN_FIELD => 'unknown',
            'name' => 'Jane Doe',
            'email' => 'jane@doe.me',
            'message' => 'Testing...1..2..3..',
        ]);
        $response->assertStatus(302);
        $response->assertValid(['name','email','message']);
        $response->assertInvalid([User::MAIN_FIELD, 'captcha']);
    }

    public function test_unauthenticated_cannot_change_password_method_get(): void {
        $response = $this->get('/updatePassword');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_generic_accesses_change_password_form_successfully(): void {
        $response = $this->actingAs($this->generic)->get('/updatePassword');
        $response->assertStatus(200);
    }

    public function test_unauthenticated_cannot_change_password_method_patch(): void {
        $response = $this->patch('/updatePassword');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_generic_changes_password_successfully(): void {
        /* 1) Change a user's password: */
        $response = $this->actingAs($this->generic)->patch('/updatePassword', [
            'current_password' => Valve::getValue('genericPW'),
            'new_password' => 'NewPW3456',
            'new_password_confirmation' => 'NewPW3456'
        ]);
        $response->assertValid(['current_password','new_password','new_password_confirmation']);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        /* 2) Change a user's password back: */
        $response = $this->actingAs($this->generic)->patch('/updatePassword', [
            'current_password' => 'NewPW3456',
            'new_password' => Valve::getValue('genericPW'),
            'new_password_confirmation' => Valve::getValue('genericPW')
        ]);
        $response->assertValid(['current_password','new_password','new_password_confirmation']);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_generic_fails_to_provide_correct_password_confirmation(): void {
        $response = $this->actingAs($this->generic)->patch('/updatePassword', [
            'current_password' => Valve::getValue('genericPW'),
            'new_password' => 'NewPW3456',
            'new_password_confirmation' => 'NewPW34567'
        ]);
        $response->assertValid(['current_password','new_password_confirmation']);
        $response->assertInvalid(['new_password']);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_unauthenticated_cannot_change_profile_method_get(): void {
        $response = $this->get('/profile');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_unauthenticated_cannot_change_profile_method_patch(): void {
        $response = $this->patch('/profile');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_unauthenticated_cannot_change_profile_method_post(): void {
        $response = $this->post('/profile');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_unauthenticated_cannot_change_profile_method_delete(): void {
        $response = $this->delete('/profile');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_generic_accesses_profile_succesfully(): void {
        $response = $this->actingAs($this->generic)->get('/profile');
        $response->assertStatus(200);
    }

    public function test_generic_updates_profile_succesfully(): void {
        $arr = [
            'name' => Valve::getValue('genericName2'),
            'email' => Valve::getValue('genericEmail1'),
            'locale_id' => 2,
            'pronoun_id' => 7,
            'show_pronoun' => false,
            'show_name' => false,
            'show_user_id' => false,
            'show_email' => false
        ];
        $response = $this->actingAs($this->generic)->patch('/profile', $arr);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('users', $arr);
        $arr = [
            'name' => Valve::getValue('genericName1'),
            'email' => Valve::getValue('genericEmail1'),
            'locale_id' => 2,
            'pronoun_id' => 7,
            'show_pronoun' => true,
            'show_name' => true,
            'show_user_id' => true,
            'show_email' => true
        ];
        $response = $this->actingAs($this->generic)->patch('/profile', $arr);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('users', $arr);
    }

    public function test_generic_fails_to_update_profile(): void {
        $arr = [
            'name' => Valve::getValue('genericName2'),
            'email' => 'wrong',
            'locale_id' => 2,
            'pronoun_id' => 7,
            'show_pronoun' => false,
            'show_name' => false,
            'show_user_id' => false,
            'show_email' => false
        ];
        $response = $this->actingAs($this->generic)->patch('/profile', $arr);
        $response->assertValid(['name','locale_id','pronoun_id','show_pronoun','show_name','show_user_id','show_email']);
        $response->assertInvalid(['email']);
    }

    public function test_generic_accesses_profile_predelete_succesfully(): void {
        $response = $this->actingAs($this->generic)->post('/profile');
        $response->assertStatus(200);
    }

    public function test_admin_cannot_predelete(): void {
        $response = $this->actingAs($this->admin)->post('/profile');
        $response->assertStatus(403);
    }

    public function test_admin_cannot_delete_itself(): void {
        $response = $this->actingAs($this->admin)->delete('/profile');
        $response->assertStatus(403);
    }

    public function test_someone_gets_deleted(): void {
        $userId = Valve::getValue('someone');
        $user = User::find(User::getIdFromUserId($userId));
        $response = $this->actingAs($user)->delete('/profile');
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertDatabaseMissing('users', [ User::MAIN_FIELD => $userId ]);
        $this->assertDatabaseMissing('role_user', [ User::MAIN_FIELD => $user->id ]);
        $this->assertDatabaseHas('deleted_role_users', [ User::MAIN_FIELD => $userId ]);
        $this->assertDatabaseHas('user_updates', [ 'operation' => 'D', User::MAIN_FIELD => $userId ]);
        $this->assertDatabaseHas('user_ids', [ User::MAIN_FIELD => $userId ]);
    }

    public function test_someone_gets_reinstated(): void {
        $locale = Valve::getValue('someoneLocale');
        $locale_id = Locale::getIdFromLocale($locale);
        $pronoun = Valve::getValue('someonePronoun');
        $pronoun_id = Pronoun::getIdFromLocalePronoun($locale_id,$pronoun);
        $userId = Valve::getValue('someone');
        $name = Valve::getValue('someoneName');
        $hsh = Valve::getValue('someoneHash');
        $email = Valve::getValue('someoneEmail');
        $role1 = Role::getIdByName('user.generic');
        $role2 = Role::getIdByName('editor.pt');
        $role3 = Role::getIdByName('editor.en');
        UserUpdate::undelete($userId);
        $userUpdate = UserUpdate::where(User::MAIN_FIELD,$userId)->where('operation','E')->get()[0];
        $user = User::create([
            User::MAIN_FIELD => $userId,
            User::PASSWORD_FIELD => $hsh,
            'name' => $name,
            'email' => $email,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'locale_id' => $locale_id,
            'pronoun_id' => $pronoun_id,
            'show_pronoun' => $userUpdate->show_pronoun,
            'show_name' => $userUpdate->show_name,
            'show_email' => $userUpdate->show_email,
            'show_user_id' => $userUpdate->show_user_id
        ]);
        User::undeleteRoles($userId);
        DeletedRoleUser::deleteAllRolesByUserId($userId);
        $userUpdate->operation = 'R';
        $userUpdate->save();
        $this->assertDatabaseHas('users', [ User::MAIN_FIELD => $userId ]);
        $this->assertDatabaseHas('user_updates', [ 'operation' => 'R', User::MAIN_FIELD => $userId ]);
        $this->assertDatabaseHas('role_user', [ User::MAIN_FIELD => $user->id, 'role_id' => $role1 ]);
        $this->assertDatabaseHas('role_user', [ User::MAIN_FIELD => $user->id, 'role_id' => $role2 ]);
        $this->assertDatabaseHas('role_user', [ User::MAIN_FIELD => $user->id, 'role_id' => $role3 ]);
        $this->assertDatabaseMissing('deleted_role_users', [ User::MAIN_FIELD => $userId ]);
        $this->assertDatabaseHas('user_ids', [ User::MAIN_FIELD => $userId ]);
    }

    public function test_authenticated_redirects_to_home_method_get(): void {
        $response = $this->actingAs($this->generic)->get('/register');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_authenticated_redirects_to_home_method_post(): void {
        $response = $this->actingAs($this->generic)->post('/register');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_unauthenticated_can_register(): void {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_register_new(): void {
        $pwHash = Hash::make('TestNewPW367');
        $response = $this->post('/register', [
            User::MAIN_FIELD => 'testnewuser',
            User::PASSWORD_FIELD => $pwHash,
            'password_confirmation' => $pwHash,
            'name' => 'Test New User',
            'email' => 'newuser@someotherdomain.biz',
            'locale_id' => 2,
            'pronoun_id' => 7,
            'show_pronoun' => false,
            'show_name' => true,
            'show_email' => false,
            'show_user_id' => true,
            'captcha' => '1a2b3C4D'
        ]);
        $response->assertStatus(302);
        $response->assertValid([User::MAIN_FIELD, User::PASSWORD_FIELD, 'name', 'email', 'locale_id', 'pronoun_id', 'show_pronoun', 'show_name', 'show_email', 'show_user_id']);
        $response->assertInvalid(['captcha']);
    }

    public function test_unauthenticated_password_expired_redirects_to_login_method_get(): void {
        $response = $this->get('/password-expired');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_unauthenticated_password_expired_redirects_to_login_method_patch(): void {
        $response = $this->patch('/password-expired');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_authenticated_password_expired_successful_on_status_expired(): void {
        $this->generic->update([ User::STATUS_FIELD => User::STATUS_FIELD_PASSWORD_EXPIRED ]);
        $response = $this->actingAs($this->generic)->get('/password-expired');
        $response->assertStatus(200);
    }

    public function test_authenticated_password_expired_redirects_on_status_active(): void {
        $this->generic->update([ User::STATUS_FIELD => User::STATUS_FIELD_ACTIVE ]);
        $response = $this->actingAs($this->generic)->get('/password-expired');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_authenticated_fails_to_change_password_on_password_expired_form(): void {
        $this->generic->update([ User::STATUS_FIELD => User::STATUS_FIELD_PASSWORD_EXPIRED ]);
        $response = $this->actingAs($this->generic)->patch('/password-expired', [
            'new_password' => 'NewPW12345',
            'new_password_confirmation' => 'NewPW1234567'
        ]);
        $response->assertInvalid(['new_password']);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_authenticated_changes_password_on_password_expired_form_on_status_expired(): void {
        /* 1) Change a user's password: */
        $this->generic->update([ User::STATUS_FIELD => User::STATUS_FIELD_PASSWORD_EXPIRED ]);
        $response = $this->actingAs($this->generic)->patch('/password-expired', [
            'new_password' => 'NewPW123456',
            'new_password_confirmation' => 'NewPW123456'
        ]);
        $response->assertValid(['new_password','new_password_confirmation']);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        /* 2) Change a user's password back: */
        $this->generic->update([ User::STATUS_FIELD => User::STATUS_FIELD_PASSWORD_EXPIRED ]);
        $response = $this->actingAs($this->generic)->patch('/password-expired', [
            'new_password' => Valve::getValue('genericPW'),
            'new_password_confirmation' => Valve::getValue('genericPW')
        ]);
        $response->assertValid(['new_password','new_password_confirmation']);
        $response->assertStatus(302);
        $response->assertRedirect('/');    
    }

    public function test_authenticated_unsuccessful_on_password_expired_form_on_status_active(): void {
        $this->generic->update([ User::STATUS_FIELD => User::STATUS_FIELD_ACTIVE ]);
        $response = $this->actingAs($this->generic)->patch('/password-expired');
        $response->assertStatus(403);
    }

    public function test_authenticated_is_redirected_on_forgot_password_form_method_get(): void {
        $response = $this->actingAs($this->generic)->get('/forgot-password');
        $response->assertStatus(302);
        $response->assertRedirect('/');    
    }

    public function test_authenticated_is_redirected_on_forgot_password_form_method_post(): void {
        $response = $this->actingAs($this->generic)->post('/forgot-password');
        $response->assertStatus(302);
        $response->assertRedirect('/');    
    }

    public function test_unauthenticated_displays_forgot_password_form_successfully(): void {
        $response = $this->get('/forgot-password');
        $response->assertStatus(200);
    }

    public function test_unauthenticated_sends_forgot_password_form_user_id_successfully(): void {
        $this->generic->update([ User::STATUS_FIELD => User::STATUS_FIELD_ACTIVE ]);
        $user_id = $this->generic->user_id;
        $response = $this->post('/forgot-password', [
            'method' => 1,
            User::MAIN_FIELD => $user_id
        ]);
        $response->assertStatus(200);
        $response->assertValid('method', User::MAIN_FIELD, 'email');
        $this->assertDatabaseHas('users', [ User::MAIN_FIELD => $user_id, User::STATUS_FIELD => User::STATUS_FIELD_PASSWORD_EXPIRED ]);
    }

    public function test_unauthenticated_sends_forgot_password_form_email_successfully(): void {
        $this->generic->update([ User::STATUS_FIELD => User::STATUS_FIELD_ACTIVE ]);
        $email = $this->generic->email;
        $response = $this->post('/forgot-password', [
            'method' => 2,
            'email' => $email
        ]);
        $response->assertStatus(200);
        $response->assertValid('method', User::MAIN_FIELD, 'email');
        $this->assertDatabaseHas('users', [ 'email' => $email, User::STATUS_FIELD => User::STATUS_FIELD_PASSWORD_EXPIRED ]);
    }

    public function test_unauthenticated_fails_to_fill_in_correctly_forgot_password_form_user_id(): void {
        $this->generic->update([ User::STATUS_FIELD => User::STATUS_FIELD_ACTIVE ]);
        $response = $this->post('/forgot-password', [
            'method' => 1,
            User::MAIN_FIELD => 'abcdefghijklmnopqrs'
        ]);
        $response->assertStatus(302);
        $response->assertValid('method', 'email'); 
        $response->assertInvalid(User::MAIN_FIELD);
        $this->assertDatabaseHas('users', [ 'id' => $this->generic->id, User::STATUS_FIELD => User::STATUS_FIELD_ACTIVE ]);
    }

    public function test_unauthenticated_fails_to_fill_in_correctly_forgot_password_form_email(): void {
        $this->generic->update([ User::STATUS_FIELD => User::STATUS_FIELD_ACTIVE ]);
        $response = $this->post('/forgot-password', [
            'method' => 2,
            'email' => 'abcdefghij@yetanotherdomain.com'
        ]);
        $response->assertStatus(302);
        $response->assertValid('method', User::MAIN_FIELD); 
        $response->assertInvalid('email');
        $this->assertDatabaseHas('users', [ 'id' => $this->generic->id, User::STATUS_FIELD => User::STATUS_FIELD_ACTIVE ]);
    }
}