<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUser;
use App\Costomers;
use App\CustomerUser;
use App\Helpers\DocNo;
use App\IndentDetails;
use App\InspectionDetails;
use App\Item;
use App\Mail\OrderCreated;
use App\Order;
use App\OrderDetails;
use App\OrderReceiptDetails;
use App\OrderSchedules;
use App\Stock;
use App\Traits\OrderTrait;
use Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;

class OrderController extends Controller
{

    use OrderTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $orders = Order::where('comapny_id',$company_id)->get();
        return view('v1.colorpro.company.orders',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $company_name = DB::table('companies')->where('id',$company_id)->pluck('name')->first();
        $company_code = DB::table('companies')->where('id',$company_id)->pluck('company_code')->first();
        return view('v1.colorpro.company.create_order',compact('company_id','company_name','company_code'));
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
            'order'     => 'required',
            'order_details'    => 'required',
        ]);
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $order_ob = $request->order;
        $indent_no = isset($order_ob['indent_no'])?$order_ob['indent_no']:0 ;

        // return $order_ob['quotation_no'];
        $order_details_ob = $request->order_details;
        $order = new order;
        $order->comapny_id          = $company_id;
        // $order->order_number        = $company_id . mt_rand(100000,999999);
        $order->order_number        = DocNo::getDocNumberString('po',1);
        $order->order_date          = Carbon::now();
        $order->order_type          = $order_ob['order_type'];
        $order->indent_no           = $indent_no ;
        $order->indent_date         = isset($order_ob['indent_date'])?$order_ob['indent_date']:'';
        $order->shipto_customer_id  = $order_ob['ship_to_id'];
        $order->supplier_id         = $order_ob['supplier_id'];
        $order->billto_customer_id  = $company_id;
        $order->quote_ref_no        = $order_ob['quotation_no'];
        $order->department_id        = $order_ob['department_id'];
        // $order->quote_ref_date      = $order_ob
        $order->created_by          = Auth::id();
        // $order->last_po_rate         = $order_ob
        // $order->last_po_date         = $order_ob
        // $order->last_po_supplier         = $order_ob
        // $order->approved_by         = $order_ob
        // $order->approved_date       = $order_ob
        // $order->currency            = $order_ob
        $order->status              = 'pending';
        $order->basic_total         = $order_ob['basic_total'];
        $order->sub_total           = $order_ob['sub_total'];
        $order->pnf_total           = $order_ob['pf_amount'];
        $order->courrier_charge     = $order_ob['courrier_amount'];
        
        $order->tax_id              = isset($order_ob['tax_ob'])? $order_ob['tax_ob']['id']:''; 
        $order->tax_percent         = $order_ob['tax_value']; 
        $order->tax_amount          = $order_ob['tax_amount'];
        $order->grant_total         = $order_ob['grant_total'];
        $order->save();
        $doc = DocNo::updateDoc('po',1);
        $order_id = $order->id;

        foreach($order_details_ob as $od){

            $order_details                      = new OrderDetails;
            $order_details->order_id            = $order_id;
            $order_details->item_id             = $od['item_id'];
            $order_details->rate                = $od['rate'];
            $order_details->quantity            = $od['quantity'];
            $order_details->discount            = $od['discount'];
            $order_details->grant_total         = $od['grant_total'];
            $order_details->sub_total           = $od['sub_total'];
            $order_details->primary_unit_id     = $od['primary_unit'];
            $order_details->purchase_unit_id    = $od['purchase_unit'];
            $order_details->conversion_factor   = $od['conversion_factor'];
            $order_details->delivery_date       = isset($od['date'])?$od['date']:null;
            $order_details->status              = 'pending';
            $order_details->save();

            $item_update = DB::table('items')
                ->where('id', $od['item_id'])
               ->update([
                        'last_po_rate' =>round($order_details->grant_total / $order_details->quantity,2),
                        'last_po_date' => $order->order_date,
                        'last_po_supplier' => $order->supplier_id
                    ]);
            $this->updateIndentByQuantity($indent_no, $od['item_id'], $od['quantity']);
            $order_details_id = $order_details->id;
            if(isset($od['schedule'])){

                foreach($od['schedule'] as $sched){
                    $ord_sched                   = new OrderSchedules;
                    $ord_sched->order_details_id = $order_details_id;
                    $ord_sched->quantity         = $sched['quantity'];
                    $ord_sched->delivery_date    = $sched['date'];
                    $ord_sched->save();
                    
                }
                $order_details->delivery_date    = $ord_sched->date;
                $order_details->save();

            }
            

        }


        $customer = Costomers::where('id',$order->suppier_id)->first();

        $order_new = Order::where('id',$order->id)->with('exact_details')->first();

        try {
            Mail::to($customer->email)->send(new OrderCreated($order_new));

        }catch(Exception $e){

            return response(['order_no' => $order->order_number],200);
        }


        return response(['order_no' => $order->order_number],200);
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $order = Order::where('id',$id)->with('exact_details')->first();

        Mail::to('sajeervasaleem@gmail.com')->send(new OrderCreated($order));
        return view('Mail.po_order',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

   
    /**
     * @param Request $request
     * @param mixed $id
     * 
     * @return void
     */
    public function get_order_reciept(Request $request , $id)
    {

        
       if($request->has('json')){
            // return OrderReceiptDetails::all();
            return Order::where('id',$id)->whereIn('status',['pending','processing'])->with('details')->with('details.schedules')->with('details.reciept')->with('details.qc_details')->first();
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrders(Request $request)
    {
        $this->validate($request, [
            'order'     => 'required',
            'order_details'    => 'required',
        ]);

        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $order_ob = $request->order;
        // return $order_ob['quotation_no'];
        $order_details_ob = $request->order_details;
        $indent_no = isset($order_ob['indent_no'])?$order_ob['indent_no']:0 ;
        $order = order::where('id',$order_ob['id'])->first();
        
        $order->shipto_customer_id  = $order_ob['shipto_customer_id'];
        $order->supplier_id          = $order_ob['supplier_id'];
        $order->billto_customer_id  = $company_id;
        $order->status              = 'pending';
        $order->basic_total         = $order_ob['basic_total'];
        $order->sub_total           = $order_ob['sub_total'];
        $order->pnf_total           = $order_ob['pf_amount'];
        $order->courrier_charge     = $order_ob['courrier_amount'];
        
        $order->tax_id              = isset($order_ob['tax_ob'])? $order_ob['tax_ob']['id']:''; 
        $order->tax_percent         = $order_ob['tax_value']; 
        $order->tax_amount          = $order_ob['tax_amount'];
        $order->grant_total         = $order_ob['grant_total'];
        $order->save();
        $order_id = $order->id;
        
        OrderDetails::where('order_id',$order_id)->delete();

        foreach($order_details_ob as $od){

            $order_details                      = new OrderDetails;
            $order_details->order_id            = $order_id;
            $order_details->item_id             = $od['item_id'];
            $order_details->rate                = $od['rate'];
            $order_details->quantity            = $od['quantity'];
            $order_details->discount            = $od['discount'];
            $order_details->grant_total         = $od['grant_total'];
            $order_details->sub_total           = $od['sub_total'];
            $order_details->primary_unit_id     = $od['primary_unit'];
            $order_details->purchase_unit_id    = $od['purchase_unit'];
            $order_details->conversion_factor   = $od['conversion_factor'];
            $order_details->delivery_date       = isset($od['date'])?$od['date']:null;
            $order_details->status              = 'pending';
            $order_details->save();
            $this->updateIndentByQuantity($indent_no, $od['item_id'], $od['quantity']);

            $order_details_id = $order_details->id;
            if(isset($od['schedule'])){
                OrderSchedules::where('order_details_id', $order_details_id)->delete();
                foreach($od['schedule'] as $sched){
                    $ord_sched                   = new OrderSchedules;
                    $ord_sched->order_details_id = $order_details_id;
                    $ord_sched->quantity         = $sched['quantity'];
                    $ord_sched->delivery_date    = $sched['date'];
                    $ord_sched->save();
                    
                }
                $order_details->delivery_date    = $ord_sched->date;
                $order_details->save();

            }
            

        }


        $customer = Costomers::where('id',$order->suppier_id)->first();

        $order_new = Order::where('id',$order->id)->with('exact_details')->first();

        try {
            Mail::to($customer->email)->send(new OrderCreated($order_new));

        }catch(Exception $e){

            return response(['order_no' => $order->order_number],200);
        }


        return response(['order_no' => $order->order_number],200);
        
        
        
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function accept_order(Request $request)
    {
       $data            = $request->all();
       $order_details   = $data['details'];
       foreach($order_details as $detail){
           $reciepts    = $detail['reciept'];
           foreach($reciepts as $reciept){
                
                $inspection_details = new InspectionDetails;
                $inspection_details->accepted_quantity = isset($reciept['accepted_quantity'])?$reciept['accepted_quantity']:0;
                $inspection_details->reworked_quantity = isset($reciept['reworked_quantity'])?$reciept['reworked_quantity']:0;
                $inspection_details->rejected_quantity = isset($reciept['rejected_quantity'])?$reciept['rejected_quantity']:0;
                $inspection_details->inspection_date   = Carbon::now();
                $inspection_details->inspected_by   = Auth::id();
                $inspection_details->type   = 'oa';
                $inspection_details->material_transfers_id   = $reciept['id'];


                // OrderReceiptDetails::save_recieved_qty($reciept['id'],$reciept['recieved_quantity']);
                OrderReceiptDetails::save_accepted_qty($reciept['id'],$reciept['accepted_quantity']);
                OrderReceiptDetails::save_rejected_qty($reciept['id'],$reciept['rejected_quantity']);
                OrderReceiptDetails::save_rework_qty($reciept['id'],$reciept['rework_quantity']);

                OrderReceiptDetails::check_completed($reciept['id']);
                
           }

        //    OrderDetails::save_recieved_qty($detail['id'],$reciept['recieved_quantity']);
           OrderDetails::save_accepted_qty($detail['id'],$reciept['accepted_quantity']);
           OrderDetails::save_rejected_qty($detail['id'],$reciept['rejected_quantity']);
           OrderDetails::save_rework_qty($detail['id'],$reciept['rework_quantity']);

        $finish_details = $this->is_order_details_finished($detail['id']);

       }
       $finish = $this->is_order_finished($data['id']);
       if($finish == 1){
            $ordr = Order::find($data['id']);
            $ordr->status = 'completed';
            $ordr->save();
       }
       return $finish_details;
    }

    /**
     * @param Request $request
     * @param mixed $id
     * 
     * @return void
     */
    public function get_order_update(Request $request , $id)
    {

        
       if($request->has('json')){
            // return OrderReceiptDetails::all();
            return Order::where('id',$id)->with('exact_details.completed_reciept')->first();
       }
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function post_order_update(Request $request )
    {

        
        $data            = $request->all();
        $order_details   = $data['exact_details'];
        foreach($order_details as $detail){
            $reciepts    = $detail['completed_reciept'];
            foreach($reciepts as $reciept){
                 $ord_reciept                    = OrderReceiptDetails::find( $reciept['id']);
                 $ord_reciept->status            = 'stocked';
                 $ord_reciept->save();
            }
            
            $order_detail = OrderDetails::find($detail['id']);
            $stock = Stock::where('id',$detail['item_id'])->first();
            $stock->quantity = $stock->quantity + $order_detail->accepted_quantity;
            $stock->save();
 
 
        }
        
        return 'True';
    }

    public function search_order(Request $request)
    {
       

        return  Order::where('order_number','LIKE','%'.$request->search.'%')->with('exact_details')->with('exact_details.schedules')->first();
    }
    
    public function exportPdf(Request $request)
    {
        $this->validate($request, [
            'order_id'     => 'required|numeric',
        ]);
        $id = $request->order_id;
        try {
            
            $order = Order::where('id',$id)->with('exact_details')
            ->with('exact_details.schedules')->with('exact_details.qc_details')->first();

            $bill_to = Company::where('id',$order->billto_customer_id)
            ->select('name','short_name','address_line1','address_line2','address_line3','post_code','place','phone_number','email')->first();

             $ship_to = Company::where('id',$order->shipto_customer_id)
            ->select('name','short_name','address_line1','address_line2','address_line3','post_code','place','phone_number','email')->first();

            $supplier = Costomers::where('id',$order->suppier_id)
            ->select('name','customer_code','address_line1','address_line2','address_line3','post_code','place','phone_number','email')->first();

            $pdf = PDF::loadView('pdf.order',compact('order','bill_to' , 'ship_to', 'supplier'));
            $pdf->setPaper('A4', 'landscape'); 
            // return $pdf->stream('download.pdf');

            return $pdf->download('report.pdf');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  response()->json($ex->getMessage());
        }
    }

    public static function updateIndentByQuantity($indendt_no, $item_id, $quantity )
    {
        $indent_id = DB::table('indents')->where('indent_no',$indendt_no)->pluck('id')->first();
        if($indent = IndentDetails::where(['request_id' => $indent_id,'item_id' => $item_id])->first()){
            $indent->puchased_qty = $indent->puchased_qty + $quantity;
            $indent->save();
        }
        return 'true';
    }
    
    
}
