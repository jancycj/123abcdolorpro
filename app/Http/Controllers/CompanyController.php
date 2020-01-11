<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUser;
use App\Rates;
use App\Stock;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies =  Company::all();
        return view('v1.colorpro.admin.companies',compact('companies'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.colorpro.admin.create_company');
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

        $company = new Company;
        $company->name = $request->name;
        $company->short_name = $request->short_name;
        $company->autherized_person = $request->autherized_person;
        $company->autherized_person_phone = $request->autherized_person_phone;
        $company->phone_number = $request->phone;
        $company->email = $request->email;
        $company->address_line1 = $request->address1;
        $company->address_line2 = $request->address2;
        $company->district_id = $request->district;
        $company->state_id = $request->state;
        $company->country_id = $request->country;
        $company->save();
        $company->company_code = 'CMPNY-'.$company->id;
        $company->save();

        $company_user = new CompanyUser;
        $company_user->user_id = $user->id;
        $company_user->company_id = $company->id;
        $company_user->save();

        $user_role = new UserRole;
        $user_role->user_id = $user->id;
        $user_role->role_id = 2;
        $user_role->save();

        return redirect('/admin/companies')->with(['message' => 'successfully added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
    public function get_items(Request $request)
    {
        if($request->has('json') && $request->has('rates')){
            $items_id = Rates::where('company_id',CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first())->pluck('item_id');

            return Stock::whereIn('id',$items_id)->get();
        }
        if($request->has('json') ){

            return Stock::whereIn('company_id',CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first())->get();
        }
    }
    public function get_rate($stock_id)
    {
        return Rates::where('item_id',$stock_id)->first();
    }
}
