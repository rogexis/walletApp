<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wallet;
use App\Models\transfer;


class TransferController extends Controller
{
    public function store(Request $request){
        $wallet = wallet::find($request->wallet_id);
        $wallet->saldo = $wallet->saldo + $request->transaccion;
        $wallet->update();

        $transfer = new transfer();
        $transfer->concepto = $request->concepto;
        $transfer->transaccion = $request->transaccion;
        $transfer->wallet_id = $request->wallet_id;
        $transfer->save();
        
        return response()->json($transfer, 201);

    }
}
