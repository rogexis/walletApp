<?php

namespace Tests\Feature;

use App\Models\transfer;
use App\Models\wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class transferTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostTransfer()
    {
        $wallet = wallet::factory()->create();
        $transfer = transfer::factory()->make();
        $response = $this->json('POST', '/api/transfer', [
            'concepto' => $transfer->concepto,
            'transaccion' => $transfer->transaccion,
            'wallet_id' => $wallet->id
        ]);


        $response->assertJsonStructure([
            'id', 'concepto', 'transaccion', 'wallet_id'
        ])->assertStatus(201);

        $this->assertDatabaseHas('transfers', [
            'concepto' => $transfer->concepto, 
            'transaccion' => $transfer->transaccion,
            'wallet_id' => $wallet->id
        ]);

        $this->assertDatabaseHas('Wallets', [
            'id' => $wallet->id,
            'saldo' => $wallet -> saldo + $transfer -> transaccion
        ]);
    }
}