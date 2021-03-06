<?php

namespace App\Http\Controllers;

use App\Costomers;
use App\CustomerUser;
use App\User;
use App\UserRole;
use App\Company;
use App\CompanyUser;
use App\Order;
use App\QCPlan;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use DB;

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
            'username'    => 'required|unique:users',
            'password'            => 'required',
            'address_line1'           => 'required',
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
        $customer->email = $request->company_email;
        $customer->address_line1 = $request->address1;
        $customer->address_line2 = $request->address2;
        $customer->district_id = $request->district_id;
        $customer->state_id = $request->state_id;
        $customer->company_id = $request->comapny;
        $customer->country_id = $request->country_id;
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
        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Costomers  $costomers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return Costomers::find($id);
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'              => 'required',
            'username'          => 'required',
            'address_line1'     => 'required',
        ]);

        $company                        = Costomers::find($id);
        $company->name                  = $request->name;
        $company->short_name            = $request->short_name;
        $company->autherized_person     = $request->autherized_person;
        $company->autherized_person_phone = $request->autherized_person_phone;
        $company->address_line1         = $request->address_line1;
        $company->address_line2         = $request->address_line2;
        $company->district_id           = $request->district_id;
        $company->state_id              = $request->state_id;
        $company->country_id            = $request->country_id;
        $company->post_code             = $request->post_code;
        $company->place                 = $request->place;
        $company->mobile_number         = $request->mobile_number;
        $company->phone_number          = $request->phone_number;
        $company->email                 = $request->email;
        $company->website               = $request->website;
        $company->gst_no                = $request->gst_no;
        $company->gst_date              = $request->gst_date;
        $company->cash_cr_bank          = $request->cash_cr_bank;
        $company->cash_cr_bank_ifsc     = $request->cash_cr_bank_ifsc;
        $company->cash_cr_acc_no        = $request->cash_cr_acc_no;
        $company->pan_gir_no            = $request->pan_gir_no;
        $company->terms_n_condition     = $request->terms_n_condition;
        $company->save();

        $user = User::find($request->user_id);
        if($user->username != $request->username){
            if(User::where('username',$request->username)->first()){
                throw ValidationException::withMessages(['username' => 'duplicate username']);
            } else {
                $user->username = $request->username;
            }
        }
        $user->name = $request->name;
        if($request->has('password') && $request->password != ''){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return 'true';
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
    public function company_customer_index(Request $request)
    {

        if($request->has('json')){
            return Costomers::where('company_id',CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first())->get();
        }
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
            'username'    => 'required|unique:users',
            'password'            => 'required',
            'address_line1'           => 'required',
        ]);
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->company_id = $company_id;
        $user->save();

        $customer = new Costomers;
        $customer->name = $request->name;
        $customer->short_name = $request->short_name;
        $customer->gst_no = $request->gst_no;
        $customer->autherized_person = $request->autherized_person;
        $customer->autherized_person_phone = $request->autherized_person_phone;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->address_line1 = $request->address_line1;
        $customer->address_line2 = $request->address_line2;
        $customer->district_id           = $request->district_id;
        $customer->state_id              = $request->state_id;
        $customer->country_id            = $request->country_id;
        $customer->type            = $request->type;
        $customer->company_id = $company_id;
        $customer->terms_n_condition     = $request->terms_n_condition;

        $customer->save();
        $prefix = $request->type == 'vendor' ? 'VNDR-': 'CSTMR-';
        $customer->customer_code = $prefix.$customer->id;
        $customer->save();

        $customer_user = new CustomerUser;
        $customer_user->user_id = $user->id;
        $customer_user->customer_id = $customer->id;
        $customer_user->save();

        $user_role = new UserRole;
        $user_role->user_id = $user->id;
        $user_role->role_id = 4;
        $user_role->save();
        return 'true';
        // return redirect('/company/customer/');
    }

    public function order(Request $request)
    {

        $customer_id = CustomerUser::where('user_id',Auth::id())->pluck('customer_id')->first();
        $company_id = Costomers::where('id',$customer_id)->pluck('company_id')->first();
        $orders = Order::where('supplier_id',$customer_id)->whereIn('status',['pending','processing'])->get();
        return view('v1.colorpro.customer.order', compact('orders','company_id'));
    }
    public function get_order(Request $request , $id)
    {
       if($request->has('json')){
            // return $id;
            $data = DB::table('order_details as ordd')
            ->join('orders as ord', 'ordd.order_id', '=', 'ord.id')
            ->join('items as ite', 'ordd.item_id', '=', 'ite.id')
            ->join('costomers as co', 'ord.supplier_id', '=', 'co.id')
            ->leftJoin('lookup_masters as lkv', 'ordd.purchase_unit_id', '=', 'lkv.id')
            ->where('ord.id', '=',$id)  
            ->whereRaw('IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) > 0')
            ->select(
                'ordd.*',
                'ordd.id as order_detail_id',
                'ord.order_number as order_no',
                'ord.order_date',
                'ord.tax_percent',
                'ord.tax_name',
                'ord.pnf_total',
                'ord.courrier_charge',
                'ite.part_no',
                'ite.over_reciept_percentage',  
                'ite.name as item',
                'lkv.lookup_value as uom',
                DB::raw(" IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) as mir_quantity"),
                DB::raw(" IFNULL(ordd.recieved_quantity,0) as cumlative_qty")

                );

            $orders = Order::where('id',$id)->first();
            $orders->details =  $data->get();
            return $orders;
       }
    }

    public function customers()
    {
        $customer_id = CustomerUser::where('user_id',Auth::id())->pluck('customer_id')->first();
        $company_id = Costomers::where('id',$customer_id)->pluck('company_id')->first();
        return Costomers::where('company_id',$company_id)->get();

    }
    public function get_qc(Request $request)
    {
        $customer_id = CustomerUser::where('user_id',Auth::id())->pluck('customer_id')->first();
        $company_id = Costomers::where('id',$customer_id)->pluck('company_id')->first();
        if($request->has('item_id')){
            return QCPlan::where('comapny_id',$company_id)->where('item_id',$request->item_id)->get();
        }
    }
}
