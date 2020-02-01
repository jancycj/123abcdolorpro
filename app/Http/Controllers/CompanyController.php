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
    public function get_order_reciept()
    {
        
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $pending_orders = Order::where('shipto_customer_id',$company_id)->whereIn('status',['pending','processing'])->get();
        $completed_orders = Order::where('shipto_customer_id',$company_id)->where('status','completed')->get();
        $shortclosed_orders = Order::where('shipto_customer_id',$company_id)->where('status','short_closed')->get();
        return view('v1.colorpro.company.order_reciept',compact('pending_orders','completed_orders','shortclosed_orders','company_id'));

    }
    public function get_order(Request $request , $id)
    {

        
       if($request->has('json')){
            // return OrderReceiptDetails::all();
            return Order::where('id',$id)->whereIn('status',['pending','processing'])->with('details')->with('details.schedules')->with('details.reciept')->with('details.qc_details')->first();
       }
    }

    public function accept_order(Request $request)
    {
       $data            = $request->all();
       $order_details   = $data['details'];
       foreach($order_details as $detail){
           $reciepts    = $detail['reciept'];
           foreach($reciepts as $reciept){
                $ord_reciept                    = OrderReceiptDetails::find( $reciept['id']);
                $ord_reciept->recieved_quantity = $reciept['recieved_quantity'];
                $ord_reciept->accepted_quantity = $reciept['accepted_quantity'];
                $ord_reciept->rejected_quantity = $reciept['rejected_quantity'];
                $ord_reciept->rework_quantity   = $reciept['rework_quantity'];
                $ord_reciept->status            = 'completed';
                $ord_reciept->save();
           }
           $order_detail = OrderDetails::find($detail['id']);
           $order_detail->recieved_quantity = isset($order_detail->recieved_quantity)?$order_detail->recieved_quantity:0 + isset($reciept['recieved_quantity'])? $reciept['recieved_quantity'] : 0;

           $order_detail->accepted_quantity = isset($order_detail->accepted_quantity)?$order_detail->accepted_quantity:0 + isset($reciept['accepted_quantity'])? $reciept['accepted_quantity'] : 0;

           $order_detail->rejected_quantity = isset($order_detail->rejected_quantity)?$order_detail->rejected_quantity:0 + isset($reciept['rejected_quantity'])? $reciept['rejected_quantity'] : 0;

           $order_detail->rework_quantity = isset($order_detail->rework_quantity)?$order_detail->rework_quantity:0 + isset($reciept['rework_quantity'])? $reciept['rework_quantity'] : 0;
           $order_detail->save();

           $stock = Stock::where('id',$detail['item_id'])->first();
           $stock->quantity = $stock->quantity + $order_detail->accepted_quantity;
           $stock->save();

        $finish_details = $this->is_order_details_finished($detail['id']);

       }
       $finish = $this->is_order_finished($data['id']);
       if($finish == 1){
            $ordr = Order::find($data['id']);
            $ordr->status = 'completed';
            $ordr->save();
       }
       return 'true';
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
}
