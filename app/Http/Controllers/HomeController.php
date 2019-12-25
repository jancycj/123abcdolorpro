<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

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
        $user = User::where('id',Auth::id())->with('roles')->first();
        
        $role = $user->roles[0]->name;
        switch($role){
            case 'superadmin':
                return view('v1.company.home',compact('user'));
            break;
            case 'admin':

                 $user = User::where('id',Auth::id())->with('company')->first();
                return view('v1.company_dashbord.home',compact('user'));
            break;
            case 'employee':
                return view('v1.company.home');
            break;
            default:
            return redirect('/');
        }

        return view('v1.company.home');
    }
}
