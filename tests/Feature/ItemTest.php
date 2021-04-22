<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ItemTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItemIndex()
    {
        $user = User::factory()->has(Item::factory()->count(3))->create();

        Sanctum::actingAs($user, ['view-tasks']);

        $response = $this->get('/api/items');
        $response->assertOk()->assertJsonCount(3, 'items');
    }

    public function testItemStore()
    {
        $user = User::factory()->has(Item::factory()->count(3))->create();

        Sanctum::actingAs($user, ['view-tasks']);

        $response = $this->post('/api/items', [
            'name' => 'test',
            'stock' => 20,
        ]);
        $response->assertOk()->assertJsonPath('item.name', 'test')->assertJsonPath('item.stock', 20);
    }

    public function testItemShow()
    {
        $user = User::factory()->has(Item::factory()->count(3))->create();

        Sanctum::actingAs($user, ['view-tasks']);

        $item = $user->items()->inRandomOrder(1)->first();
        $response = $this->get("/api/items/{$item->id}");
        $response->assertOk()->assertJson([
            'item' => $item->toArray(),
        ]);
    }

    public function testItemUpdate()
    {
        $user = User::factory()->has(Item::factory()->count(3))->create();

        Sanctum::actingAs($user, ['view-tasks']);

        $item = $user->items()->inRandomOrder(1)->first();
        $response = $this->put("/api/items/{$item->id}", [
            'name' => 'test',
            'stock' => 20,
        ]);
        $response->assertOk()->assertJsonPath('item.name', 'test')->assertJsonPath('item.stock', 20);
    }

    public function testItemDelete()
    {
        $user = User::factory()->has(Item::factory()->count(3))->create();

        Sanctum::actingAs($user, ['view-tasks']);

        $item = $user->items()->inRandomOrder(1)->first();
        $response = $this->delete("/api/items/{$item->id}");
        $response->assertOk()->assertJson([
            'success' => true,
        ]);
    }
}
