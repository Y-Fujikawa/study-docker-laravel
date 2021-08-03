<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use DatabaseMigrations;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * ログイン画面を表示
     */
    public function testLoginView()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $this->assertGuest();
    }

    /**
     * ダッシュボードアクセス（ログイン画面へリダイレクト）
     */
    public function testNoLoginAccess()
    {
        $response = $this->get('/home');
        $response->assertStatus(302)
                 ->assertRedirect('/login');
        $this->assertGuest();
    }

    /**
     * ログイン処理の実行
     */
    public function testLogin()
    {
        $this->assertGuest();
        $response = $this->dummyLogin();
        $response->assertStatus(200);
        $this->assertAuthenticated();
    }

    /**
     * ログアウト処理を実行
     */
    public function testLogout()
    {
        $response = $this->dummyLogin();
        $this->assertAuthenticated();
        $response = $this->post('/logout');
        $response->assertStatus(302)->assertRedirect('/');
        $this->assertGuest();
    }

    /**
     * ダミーユーザーログイン
     */
    private function dummyLogin()
    {
        $user = User::factory()->make();
        return $this->actingAs($user)->withSession(['user_id' => $user->id])->get(route('home'));
    }
}
