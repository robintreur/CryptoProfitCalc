<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Crypto;

class CryptoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cryptos = Crypto::with(['coin'])->where('user_id', auth()->user()->id)->get();

        return view('cryptos.index', compact('cryptos'));
    }

    public function detail($id)
    {
        $crypto = Crypto::find($id)->with(['coin'])->where('user_id', auth()->user()->id)->get();

        return view('cryptos.detail', compact('crypto'));
    }
}
