<?php

namespace App\Http\Controllers;

use App\Costomers;
use App\CustomerUser;
use App\User;
use App\UserRole;
use App\Company;
use App\CompanyUser;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CostomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return User::where('id',5)->with('roles')->get();
        $customers =  Costomers::all();
        return view('v1.colorpro.admin.customers',compact('customers'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies =  Company::all();
        return view('v1.colorpro.admin.create_customers',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password'            => 'required',
            'address1'           => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $customer = new Costomers;
        $customer->name = $request->name;
        $customer->short_name = $request->short_name;
        $customer->autherized_person = $request->autherized_person;
        $customer->autherized_person_phone = $request->autherized_person_phone;
        $customer->phone_number = $request->phone;
        $customer->email = $request->email;
        $customer->address_line1 = $request->address1;
        $customer->address_line2 = $request->address2;
        $customer->district_id = $request->district;
        $customer->state_id = $request->state;
        $customer->company_id = $request->comapny;
        $customer->country_id = $request->country;
        $customer->save();
        $customer->customer_code = 'CSTMR-'.$customer->id;
        $customer->save();

        $customer_user = new CustomerUser;
        $customer_user->user_id = $user->id;
        $customer_user->customer_id = $customer->id;
        $customer_user->save();

        $user_role = new UserRole;
        $user_role->user_id = $user->id;
        $user_role->role_id = 4;
        $user_role->save();
        return redirect('/admin/customers/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Costomers  $costomers
     * @return \Illuminate\Http\Response
     */
    public function show(Costomers $costomers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Costomers  $costomers
     * @return \Illuminate\Http\Response
     */
    public function edit(Costomers $costomers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Costomers  $costomers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costomers $costomers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Costomers  $costomers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costomers $costomers)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function company_customer_index()
    {
        $user = User::where('id',Auth::id())->with('roles')->get();
        // return User::where('id',5)->with('roles')->get();
        $customers =  Costomers::where('company_id',CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first())->get();
        return view('v1.colorpro.company.customers',compact('customers'));//
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function company_customer_create()
    {
        $user = User::where('id',Auth::id())->with('roles')->get();
        // return User::where('id',5)->with('roles')->get();
        $customers =  Costomers::where('company_id',CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first())->get();
        return view('v1.colorpro.company.create_customer',compact('customers'));//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_company_customer(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password'            => 'required',
            'address1'           => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $customer = new Costomers;
        $customer->name = $request->name;
        $customer->short_name = $request->short_name;
        $customer->autherized_person = $request->autherized_person;
        $customer->autherized_person_phone = $request->autherized_person_phone;
        $customer->phone_number = $request->phone;
        $customer->email = $request->email;
        $customer->address_line1 = $request->address1;
        $customer->address_line2 = $request->address2;
        $customer->district_id = $request->district;
        $customer->state_id = $request->state;
        $customer->company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $customer->country_id = $request->country;
        $customer->save();
        $customer->customer_code = 'CSTMR-'.$customer->id;
        $customer->save();

        $customer_user = new CustomerUser;
        $customer_user->user_id = $user->id;
        $customer_user->customer_id = $customer->id;
        $customer_user->save();

        $user_role = new UserRole;
        $user_role->user_id = $user->id;
        $user_role->role_id = 4;
        $user_role->save();
        return redirect('/company/customer/');
    }
}
