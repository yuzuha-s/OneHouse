<?php

namespace Tests\Feature;

use App\Models\LandLog;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class Phase4StoreTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_get_request(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)->get('/phase4');
        $response->assertStatus(200);
    }

    // HTTPリクエストを作る（POST /phase4）
    public function test_post_request()
    {
        $user = User::factory()->create();
        $profile = Profile::factory()->create([
            'user_id' => $user->id,
        ]);

        $postData = [
            'profile_id' => $profile->id,
            'address' => '123-4567 東京都渋谷区56-4523 5丁目',
            'landarea' => '120',
            'far' => '200',
            'bcr' => '80',
            'floor' => '2',
            'builable_area' => '192',
            'pricePerTsubo' => '80',
        ];

        $response = $this->actingAs($user)->post('/phase4', $postData);



        // DB にレコードがあるか確認する
        $response->assertStatus(302);
        $this->assertDatabaseHas('landlogs', [
            'profile_id' => $profile->id,
            'address' => $postData['address'],
        ]);
        // session に成功メッセージがあるか確認する
        $response->assertSessionHas('success', '登録が完了しました');
        $response->assertStatus(302);
    }
    //  削除するDELETE
    public function test_delete_request()
    {
        $user = User::factory()->create();
        $profile = Profile::factory()->create([
            'user_id' => $user->id,

        ]);

        $response = $this->actingAs($user)->post('/phase4', [
            'profile_id' => $profile->id,
            'address' => '123-4567 東京都渋谷区56-4523 5丁目',
            'landarea' => '120',
            'far' => '200',
            'bcr' => '80',
            'floor' => '2',
            'builable_area' => '192',
            'pricePerTsubo' => '80',
        ]);
        $landlog = LandLog::latest()->first();


        $response = $this->actingAs($user)->delete("/phase4/{$landlog->id}");
        $response->assertStatus(302);

        $this->assertDatabaseMissing('landlogs', [
            'id' => $landlog->id,
        ]);


        $response->assertSessionHas('success', "{$landlog->address}を削除しました");
    }
}
