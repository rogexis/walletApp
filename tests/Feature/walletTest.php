<?php

namespace Tests\Feature;

use App\Models\transfer;
use App\Models\wallet;
use Faker\Factory as FakerFactory;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class walletTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function testGetWallet()
    {

        $wallet = wallet::factory()->create();
        $transfers = transfer::factory(3)->create([
            'wallet_id' => $wallet -> id
        ]);

        $response = $this->json('GET', '/api/wallet');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id', 'saldo', 'transfers'=> [
                '*' => [
                    'id', 'concepto', 'transaccion', 'wallet_id'
                ]
            ]
        ]);

    $this->assertCount(3, $response->json()['transfers']);
    }
}
