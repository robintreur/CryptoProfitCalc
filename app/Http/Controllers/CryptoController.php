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

        $capData = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?limit=600&convert=EUR');
        $capData = json_decode($capData, true);

        // new blade friendly array
        $output = [];
        // loop over every crypto currency
        foreach ($capData as $object) {
            $output[$object['symbol']] = $object;
        }

        return view('cryptos.index', compact('cryptos', 'output'));
    }

    public function detail($id)
    {
        $crypto = Crypto::find($id)->with(['coin'])->where('user_id', auth()->user()->id)->get();

        return view('cryptos.detail', compact('crypto'));
    }

    public function getData()
    {


        return view('cryptos.detail', compact('crypto'));
    }
}
