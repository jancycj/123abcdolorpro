<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUser;
use App\Costomers;
use App\Order;
use App\OrderDetails;
use App\OrderReceiptDetails;
use App\Rates;
use App\Stock;
use App\Traits\OrderTrait;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
// use Barryvdh\DomPDF\PDF;
use PDF;

class CompanyController extends Controller
{
    use OrderTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('json')){
            return Company::select('id','name')->get();
        }
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
        $company->email = $request->company_email;
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
    public function show($id)
    {
        return Company::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required|email',
            'short_name'    => 'required',
            'address_line1'      => 'required',
        ]);

        $company                        = Company::find($id);
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
        $company->save();
        return 'true';
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
            $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
            return Stock::where('company_id',$company_id)->get();
        }
    }
    public function get_rate($id, Request $request)
    {
        if($request->has('supplier')){
            if($rates = Rates::where(['item_id' => $id, 'supplier_id' => $request->supplier])->first()){
                return response(['status' => 'success', 'data' => $rates],200);

            }
            else{
                return response(['status' => 'error', 'data' => ['no rates found']],200);
    
            }
        }
        
        if($rates = Rates::where('item_id',$id)->first()){
            return response(['status' => 'success', 'data' => $rates],200);

        } else{
            return response(['status' => 'error', 'data' => ['no rates found']],200);

        }

    }
    
    public function get_order_reciept()
    {

        return view('v1.colorpro.company.materialInward');
        // return OrderDetails::with('completed_reciept')->get();
        
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $pending_orders = Order::where('shipto_customer_id',$company_id)->whereIn('status',['pending','processing'])->get();
        $completed_orders = Order::where('shipto_customer_id',$company_id)->where('status','completed')->get();

        $stock_update   =   Order::where('shipto_customer_id',$company_id)->whereHas('exact_details.completed_reciept')->with('exact_details.completed_reciept')->get();

        $shortclosed_orders = Order::where('shipto_customer_id',$company_id)->where('status','short_closed')->get();
        return view('v1.colorpro.company.order_reciept',compact('pending_orders','completed_orders','shortclosed_orders','company_id','stock_update'));

    }
    
    


    

    public function get_pdf (Request $request , $id)
    {
         $candidateInvoice = Order::where('id',$id)->whereIn('status',['pending','processing'])->with('details')
        ->with('ship_to')
        ->with('bill_to')
        ->with('details.schedules')->with('details.reciept')->with('details.qc_details')->first();
        $bill_to = Costomers::where('id',$candidateInvoice->billto_customer_id)
        ->select('name','customer_code','address_line1','address_line2','address_line3','post_code','place','phone_number','email')->first();
         $ship_to = Costomers::where('id',$candidateInvoice->shipto_customer_id)
        ->select('name','customer_code','address_line1','address_line2','address_line3','post_code','place','phone_number','email')->first();

        $pdf = PDF::loadView('pdf.invoice',compact('candidateInvoice','bill_to' , 'ship_to'));
        $pdf->setPaper('A4', 'landscape'); 
        return $pdf->stream('download.pdf');
        return view('pdf.invoice',compact('candidateInvoice','bill_to' , 'ship_to'));
    }

    

    // public function get_auth_company()
    // {
    //     $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();

    // }
}
