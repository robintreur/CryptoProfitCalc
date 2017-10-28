<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance
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
     * Activate or disable user
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function active(Request $request)
    {

        User::where('email',$request->email)->first()->update($request->all());

        return redirect()->route('dashboard');
    }


    /**
     * Filter on active or disabled user
     *
     * @param $active
     * @return mixed
     */
    public function filterActive($active)
    {
        $users = User::with('cryptos')->where('active', $active)->get();

        return view('dashboard', compact('users'));
    }

    /**
     * Search all users
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchEquipment(Request $request)
    {
        $searchValue = $request->searchValue;
        $users = User::search($searchValue)->get();

        return view('dashboard', compact('users', 'searchValue'));
    }
}
