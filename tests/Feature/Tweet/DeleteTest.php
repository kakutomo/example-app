<?php

namespace Tests\Feature\Tweet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Tweet;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_delete_successd(): void
    {
        $this->markTestSkipped('テストをスキップします');
        // ユーザを作成
        $user = User::factory()->create();

        //つぶやきを作成
        // $tweet = Tweet::factory()->create(['user_id', $user->id]);
        // $tweet = Tweet::factory()->create([
        //     'user_id' => $user->id,
        //     'content' => 'ここにツイートの内容を記述します。',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // $tweet = Tweet::factory()->create(['user_id', $user->id]);
        $tweet = Tweet::factory()->create(['user_id' => $user->id]);


        // 指定したユーザでログインした状態にする
        $this->actingAs($user);

        $response = $this->delete('/tweet/delete/' . $tweet->id);

        $response->assertRedirect('/tweet');
    }
}
