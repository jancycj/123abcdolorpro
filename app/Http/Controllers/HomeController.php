<?php

namespace App\Http\Controllers;

use App\CompanyUser;
use App\Costomers;
use App\Stock;
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
        // session()->put('role',$role);

        switch($role){
            case 'superadmin':
                return view('v1.colorpro.admin.home',compact('user'));
            break;
            case 'admin':
                $stock= Stock::where('company_id',CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first())->where('quantity','!=',0)->get();
                $items= Stock::where('company_id',CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first())->get();
                $customers =  Costomers::where('company_id',CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first())->get();
                $user = User::where('id',Auth::id())->with('company')->first();
                return view('v1.colorpro.company.home',compact('user','items','stock','customers'));
            break;
            case 'costomer':
                return view('v1.colorpro.customer.home');
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
