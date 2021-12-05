<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wallet;

class WalletController extends Controller
{
    public function index(){
        $wallet = wallet::firstOrFail();
        return response()->json($wallet->load('transfers'), 200);
    }
}
