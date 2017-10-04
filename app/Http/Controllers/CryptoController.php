<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Crypto;
use App\Coin;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $request = Request::create('api/cryptos', 'GET');
        $data = json_decode(Route::dispatch($request)->getContent());

        return view('cryptos.index', compact('data'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $request = Request::create("api/cryptos/detail/$id" , 'GET');
        $crypto = json_decode(Route::dispatch($request)->getContent());

        return view('cryptos.detail', compact('crypto'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $coins = Coin::all();

        return view('cryptos.create', compact('coins'));
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->validate(request(), [
            'coin_id' => 'required',
            'number' => 'required',
            'purchase_price' => 'required',
        ]);

        Crypto::create([
            'coin_id' => request('coin_id'),
            'number' => request('number'),
            'purchase_price' => request('purchase_price'),
            'user_id' => auth()->user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('cryptos')
            ->with('succes','Crypto created Succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $crypto = Crypto::find($id);
        $coins = Coin::all();

        return view('cryptos.edit',compact('crypto', 'coins'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'coin_id' => 'required',
            'number' => 'required',
            'purchase_price' => 'required',
        ]);

        Crypto::find($id)->update($request->all());

        return redirect()->route('cryptos')
            ->with('succes','Crypto updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $crypto = Crypto::find($id);
        $crypto->delete();

        return redirect()->route('cryptos')
            ->with('succes','Crypto deleted successfully');
    }

//    API
    /**
     * @param $id
     * @return array
     */
    public function apiDetail($id)
    {
        $crypto = Crypto::with(['coin'])->where('id', $id)->where('user_id', auth()->user()->id)->first();

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
