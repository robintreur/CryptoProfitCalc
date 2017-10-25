<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('cryptos')->get();

        return view('dashboard', compact('users'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function active(Request $request)
    {

        User::where('email',$request->email)->first()->update($request->all());

        return redirect()->route('dashboard');
    }


    /**
     * @param $active
     * @return mixed
     */
    public function filterActive($active)
    {
        $users = User::with('cryptos')->where('active', $active)->get();

        return view('dashboard', compact('users'));
    }

    /**
     * @param $request
     * @return mixed
     */
    public function search($request)
    {
        $users = User::search($request)->get();

        return view('dashboard', compact('users'));
    }
}
