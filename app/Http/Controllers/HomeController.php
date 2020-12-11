<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUser;
use App\Costomers;
use App\CustomerUser;
use App\Imports\ItemsImport;
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
        // $excel = Importer::make('Excel');
        // $excel->load('item.xlsx');
        // $collection = $excel->getCollection();
        // return $collection;
        
        $user = User::where('id',Auth::id())->with('roles')->first();
        
        $role = $user->roles[0]->name;
        // session()->put('role',$role);

        switch($role){
            case 'superadmin':
                return view('v1.colorpro.admin.home',compact('user'));
            break;
            case 'admin':
                
                $user = User::where('id',Auth::id())->with('company')->first();
                $company = CompanyUser::where('user_id',Auth::id())->first();
                session()->put('user_name',$company->company->name);

                return view('v1.colorpro.company.home',compact('user','company'));
            break;
            case 'costomer':
                $user = User::where('id',Auth::id())->with('company')->first();
                $company = CustomerUser::where('user_id',Auth::id())->first();
                // return redirect('/customer/order');
                return view('v1.colorpro.customer.home',compact('user','company'));
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
