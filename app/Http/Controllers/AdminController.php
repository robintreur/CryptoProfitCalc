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
     * @param Request $request
     */
    public function search(Request $request)
    {
        // Here will be the Search
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
}
