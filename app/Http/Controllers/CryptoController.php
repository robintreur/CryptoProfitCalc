<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

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
        return view('cryptos.index');
    }

    /**
     * @return array
     */
    public function detail($id)
    {
        return view('cryptos.detail');
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
