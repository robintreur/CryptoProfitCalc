<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Crypto;
use App\Transformers\CryptoTransformer;

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
     * @return array
     */
    public function index()
    {
        $request = Request::create('api/cryptos', 'GET');
        $data = json_decode(Route::dispatch($request)->getContent());

        return view('cryptos.index', compact('data'));
    }

    /**
     * @return array
     */
    public function detail($id)
    {
        $request = Request::create("api/cryptos/detail/$id" , 'GET');
        $crypto = json_decode(Route::dispatch($request)->getContent());

        return view('cryptos.detail', compact('crypto'));
    }

    /**
     * @return array
     */
    public function apiDetail($id)
    {
        $crypto = Crypto::find($id)->with(['coin'])->where('user_id', auth()->user()->id)->first();

        return (new CryptoTransformer)->transform($crypto);
    }

    /**
     * @return array
     */
    public function apiIndex()
    {

        $cryptos = Crypto::with(['coin'])->where('user_id', auth()->user()->id)->get();

        return fractal()->collection($cryptos)->transformWith(new CryptoTransformer())->toArray();


    }
}
