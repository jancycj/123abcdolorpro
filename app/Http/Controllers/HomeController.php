<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUser;
use App\Costomers;
use App\CustomerUser;
use App\EmployeeUser;
use App\Imports\ItemsImport;
use App\Page;
use App\Permissions;
use App\Stock;
use App\User;
use App\UserPermissions;
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
        session()->put('role',$role);
        $user->role = $role;

        $pages = $this->getMenus($role);
        session()->put('pages',$pages);

        $permissions = $this->allowed_routes($role);

        session()->put('allowed_routes',$permissions);

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
                 $company = EmployeeUser::where('user_id',Auth::id())->first();
                return view('v1.colorpro.company.home',compact('user','company'));
            break;
            default:
            return redirect('/');
        }

        return view('v1.company.home');
    }


    public  static function getMenus($role)
    {
        $user_id = Auth::id();
        switch($role){

            case 'employee':
                    return Page::employeeMenus($user_id);
                break;

            case 'admin':
                return Page::adminMenus();
                break;
        }
    }

    public  static function allowed_routes($role)
    {
        $user_id = Auth::id();
        switch($role){

            case 'employee':
                    $val = UserPermissions::where('user_id',$user_id)->get();
                    return $permissions = $val->pluck('route');
                break;

            case 'admin':
                $val = Permissions::get();
                return $permissions = $val->pluck('url');
                break;
        }
    }
}
