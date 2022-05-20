<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Config;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasRole('Donar')){

            return redirect('/');

        }

        if(Auth::user()->hasRole('Organization')){

            // dd(Auth::user()->OrganizationDetail);

            return redirect()->route('user.index');
            return redirect('/');


        }

        if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperAdmin')){

            return redirect()->route('user.index');

        }
    }

}
