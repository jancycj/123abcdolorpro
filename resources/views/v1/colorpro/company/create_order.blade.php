@extends('layouts.colorpro.app')
@section('style')
<style type="text/css">
  .fade:not(.show) {
      opacity: 5;
  }
  .tab-content {
        margin-bottom: 0 !important;
    }
</style>
<style>
        .order-b {
            right: 4% !important;
            position: absolute !important;
        }
        .order-m {
            right: 1% !important;
            position: absolute !important;
        }
        .label-t {
            /* margin-bottom: 0rem !important; */
            color: #a09e9e !important;
        }
        input#inputAddress {
            max-width: 145px !important;
        }
        /* .order-ft {
            border: 1px solid #dcd7d7;
            padding: 5px;
            margin: 5px;
        } */
        .order-ft {
            border: none;
            border-bottom: 1px solid #dcd7d7;
        }
        .order-cap{
            justify-content: center;
            text-align: center;
            background: #f7f7fd !important;
            padding: 2px !important;
            border-radius: 10px !important ;
        }
        .hd{
            color: #19a1bf;

        }
        .import-sec-white {
            padding: 0px 13px !important;
        }
        .form-group {
            margin-bottom: 2px !important;
        }
        input {
            max-height: 28px !important;
        }
        select {
            max-height: 28px !important;
            padding: 5px !important;
        }
        label {
            color: #1c273c !important;
            font-size: 12px !important;
            font-weight: bold;
            margin-bottom: 0px !important;
            text-align: end;
            
        }
        .table th, .table td {
            padding: 3px 5px !important;
            line-height: 1.2 !important;
            font-weight: bold;
        }
        .action-icon {
            font-size: 16px;
            cursor: pointer;
        }
        .table thead th {
            background: #00c9ff45;
        }
        .img-thumbnail {
            cursor: pointer;
        }
        .df-example {
    font-size: 0.875rem;
    letter-spacing: normal;
    padding: 10px;
    background-color: #fff;
    border: 1px solid rgba(72, 94, 144, 0.16);
    position: relative;
}
.df-example::before {
    content: attr(data-label);
    display: block;
    position: absolute;
    top: -6px;
    left: 5px;
    font-size: 8px;
    font-weight: 600;
    font-family: -apple-system, BlinkMacSystemFont, "Inter UI", Roboto, sans-serif;
    letter-spacing: 1px;
    text-transform: uppercase;
    background-color: inherit;
    color: #8392a5;
    padding: 0 5px;
}
    </style>
@endsection
@section('content')
<div class="content content-fixed">
    <div class="container pd-5">
        <div class="import-sec-white mg-b-5">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <div>
                
                <div >
                        <h5 class="hd">#Purchase order</h5> 
                    </div> 
                </div>
                
            </div>
        </div>
      <div class="row row-xs">
       
        <div class="col-lg-12 col-md-12 ">
            <div class="card mg-b-2">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getPoPopup($event)" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Order No*</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="order.order_no" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Order Date* </label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="order.order_date" disabled>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6"  >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Order Type*</label>
                                        <div class="col-7 input-group">
                                            <select class="custom-select form-control" @change="set_order_type(order.order_type)" v-model="order.order_type">
                                                <option value="" disabled="" selected="">select Type</option>
                                                <option value="L" >(L)&nbsp;Standard</option>
                                                <option value="I" >(I)&nbsp;Import</option>
                                                <option value="O" >(OTR)&nbsp;OTR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Quotation No: </label>
                                        <div class="col-7 input-group">
                                            <input type="text" class="form-control" id="inputAddress" placeholder="Quotation no" v-model="order.quotation_no" >
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>

                            
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getSupplierPopup($event)">
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Supplier</label>
                                        <div class="col-7 input-group">
                                            <input type="text" autocomplete="off" class="form-control" v-model="order.supplier_code">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="order.supplier_name" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Purchase Request:</label>
                                        <div class="col-7 input-group">
                                            <input type="text" autocomplete="off" class="form-control" v-model="order.indent_no" @keydown="getIndentPopup($event)">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getShipPopup($event)">
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Ship To:</label>
                                        <div class="col-7 input-group">
                                            <input type="text" autocomplete="off" class="form-control" v-model="order.ship_to">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="order.ship_to_name" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label"> Request date:</label>
                                        <div class="col-7 input-group" >
                                            <input type="date" autocomplete="off" class="form-control" v-model="order.indent_date" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getDepartmentPopup($event)">
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Department:</label>
                                        <div class="col-7 input-group">
                                            <input type="text" autocomplete="off" class="form-control" v-model="order.department">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="order.department_name" disabled>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div><!-- card-header -->
                <div class="card-body custom-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-dashboard mg-b-0">
                        <thead>
                            <tr>
                                <th class="">Part No</th>
                                <th class="">Name</th>
                                <th class="">Need.Date</th>
                                <th class="">Quantity</th>
                                <th class="">Unit</th>
                                <th class="">Sched</th>
                                <th class="">Rate</th>
                                <th class="">Disc.</th>
                                <th class="">Net Rate</th>
                                <th class="">Amount</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(ord,index) in order_detail_array" :key="ord.id">
                                <td class="tx-medium ">@{{ord.part_no}}</td>
                                <td class="tx-medium ">@{{ord.item}}</td>
                                <td class="tx-medium ">
                                    <span v-if="ord.schedule"> <small class="tx-teal"> Scheduled</small></span> <span v-if="!ord.schedule"><input type="date" class="form-control" v-model="ord.date"></span>
                                </td>
                                <td class="tx-medium "> <input type="text" class="form-control" v-model="ord.quantity" @keydown="getItemRate($event, ord.item_id,ord.quantity,index)"></td>
                                <td class="tx-medium ">@{{ord.pm_unit}}</td>
                                <td class="tx-medium "> 
                                    
                                    <span v-if="ord.schedule"> <a href="#" ><i class="fa fa-calendar"></i></a></span> <span v-if="!ord.schedule">--</span>
                                </td>
                                <td class="tx-medium tx-primary">@{{ord.rate}}</td>
                                <td class=" tx-teal">- @{{ord.discount}}%</td>
                                <td class=" tx-pink">@{{total_amount(ord.quantity,ord.rate)}}</td>
                                <td class="tx-medium ">@{{get_discount(ord.discount,total_amount(ord.quantity,ord.rate))}}  </td> 
                                <td>
                                    <a  class="action-icon " @click="remove_row(index)"><i class="fa fa-trash-o tx-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tx-medium ">
                                    <input autocomplete="off" class="form-control"  v-model="order_detail_ob.part_no" @keydown="getItemPopup($event)">
                                </td>
                                <td class="tx-medium ">
                                    <input autocomplete="off" class="form-control"  v-model="order_detail_ob.item" disabled>
                                </td>
                                <td class="tx-medium ">
                                    <input type="date" class="form-control" id="inputAddress" placeholder="Date" name="date" v-model="order_detail_ob.date">
                                </td>
                                <td class="tx-medium ">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Quantity" name="quantity"  v-model="order_detail_ob.quantity" @keydown="add_ob($event)">
                                </td>
                                
                                <td class="tx-medium ">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Unit" name="unit" v-model="order_detail_ob.pm_unit" disabled>
                                </td>
                                <td class="tx-medium ">
                                    <a  class="btn btn-white  btn-block" @click="make_schedule(1)"><i  :class="order_detail_ob.schedule?'fa fa-calendar-check-o tx-teal':'fa fa-calendar tx-teal'"></i>
                                    </a>
                                </td>
                                <td class="tx-medium tx-primary">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Rate" name="rate" v-model="order_detail_ob.rate" :disabled="!order_flag"  @keydown="add_ob($event)">
                                </td>
                                <td class=" tx-teal">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Discount" name="disc" v-model="order_detail_ob.discount" :disabled="!order_flag"  @keydown="add_ob($event)">
                                </td>
                                <td class=" tx-pink">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Net" name="net" :value="total_amount(order_detail_ob.quantity,order_detail_ob.rate)" disabled>
                                </td>
                                <td class="tx-medium ">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Total" name="amount" :value="get_discount(order_detail_ob.discount,total_amount(order_detail_ob.quantity,order_detail_ob.rate))" disabled>
                                </td> 
                                <td>
                                    #
                                </td>
                            </tr>
                            
                        </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div><!-- card-body -->
                <div class="card-footer ">
                    <div class="row order-ft">
                        
                        <div class="col-3 offset-10">
                            <div class="form-group">
                                    <label for="inputAddress">Basic total:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1222" :value="calculate_basic_total()" disabled>
                            </div>   
                        </div>
                        
                        
                    </div>
                    <div class="row order-ft">
                        <div class="col-3 ">
                            <div class="form-group">
                                <label for="inputAddress">P&F %  &nbsp amount:</label>
                                <div class="input-group">
                                    <input type="text" aria-label="First name" class="form-control" placeholder="%" v-model="pf_percentage" :disabled="pf_amount != 0">
                                    <input type="text" aria-label="Last name" class="form-control" placeholder="amount" v-model="pf_amount" :disabled="pf_percentage !=0">
                                </div>
                            </div>   
                        </div>
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">Courrier Charges:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="amount" v-model="courrier_amount">
                            </div>   
                        </div>
                        <div class="col-5"></div>
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">Sub total:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1222" :value="calc_sub_total()" disabled>
                            </div>   
                        </div>
                        
                    </div>
                   
                    <div class="row order-ft">
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">Tax</label>
                                <select class="custom-select form-control"  v-model="tax_object" @change="get_tax(tax_object)" :disabled="final_sub_total == 0">
                                    <option value="" disabled="" selected="" >select Tax</option>
                                <option v-for="tax in taxes" :value="tax">@{{tax.lookup_value}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-8"></div>
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">grant total:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="grant_total" :value="get_grant_total()" disabled>
                            </div>   
                        </div>
                    </div>
                    <div class="row order-ft">
                        <div class="col-2 offset-6 mg-t-5" v-if="print_flag">
                                <button class="btn btn-outline-danger btn-block " @click="downloadPdf()">Print PO</button>
                        </div>
                        <div class="col-2  mg-t-5" v-if="print_flag">
                                <button class="btn btn-primary btn-block " @click="update_order()">Update Order</button>
                        </div>
                        <div class="col-2 offset-8 mg-t-5" v-if="!print_flag">
                                <button class="btn btn-primary btn-block " @click="save_oreder()">Create Order</button>
                        </div>
                        <div class="col-2  mg-t-5" >
                                <button class="btn btn-secondary btn-block " @click="clear_order()">Cancel</button>
                        </div>
                    </div>
                    </div>
                    
                </div>

            </div><!-- card-->
        </div><!-- col -->
        
      </div><!-- row -->

        <div class="modal fade" id="shcedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
    aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">

                <div class="modal-content tx-14 card">


                    <div class="modal-body">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-12">
                                            <div class="pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                                                <div>
                                                    <h4 class=" tx-teal mg-b-10">#New Schedule</h4> 
                                                </div> 
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-block">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mg-b-0">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th class="">Scheduled On </th>
                                                        <th class="">Quantity</th>
                                                        <th class="">Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="sched in scheduled_array ">
                                                    <td class=" tx-teal">@{{sched.date}}</td>
                                                        <td class=" tx-pink">@{{sched.quantity}}</td>
                                                        <td class="tx-medium "> <span class="tx-normal tx-danger "><i class="icon fa fa-trash"></i> </span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mg-t-10 pd-1">
                                   
                                    
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="date" class="label-t"> <small>Date</small> </label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="date"  v-model="scheduled_obj.date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="quantity" class="label-t"> <small>Qunatity</small> </label>
                                            <div class="input-group">
                                                <input class="form-control" name="quantity"  v-model="scheduled_obj.quantity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class=" mg-t-30 pd-10">
                                            <a href="#" style="font-size: 15px;" @click="add_schedule_row()"><i class="tx-danger fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="add_schedule_to_object()">Create Schedule</button>
                    </div>
                </div>
            </div>
            </div><!-- modal end -->
            <div class="modal fade" id="itemPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-item 
                            ref="itemPop"
                            @selected="get_item_rates($event)"
                            ></choose-item>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- yarn popup modal end -->
        <div class="modal fade" id="supplierPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :id="'section'"
                            :table="'costomers'" 
                            :fields="['id','name','customer_code']" 
                            :search_filed="'name'" 
                            :where_field="'type'"
                            :where_value="'vendor'"
                            @selected="getSupplier($event)"
                            ></choose-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- yarn popup modal end -->
        <div class="modal fade" id="indentPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <raw-component 
                            :id="'indent'"
                            :query="ind_qry" 
                            @selected="getIndent($event)"
                            ></raw-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- yarn popup modal end -->

        <div class="modal fade" id="departmentPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                        <choose-component 
                            :id="'section'"
                            :table="'lookup_masters'" 
                            :fields="['id','lookup_value','lookup_description']" 
                            :search_filed="'lookup_value'" 
                            :where_field="'lookup_key'"
                            :where_value="'DEPARTMENT'"
                            @selected="getDepartment($event)"
                            ></choose-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- department popup modal end -->

        <div class="modal fade" id="poPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <raw-component 
                            :id="'poPopupS'"
                            :query="order_qry" 
                            @selected="getPOdata($event)"
                            ></raw-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- department popup modal end -->

    </div><!-- container -->
  </div><!-- content -->
  
@endsection
@section('script')

   
<script>
var g_company_id = "{{$company_id}}";
var g_company_name = "{{$company_name}}";
var g_company_code = "{{$company_code}}";
var ind_qry = `SELECT ind.indent_no, ind.department as department_id, lk.lookup_value as department,lk.lookup_description as department_name, ind.request_date, ite.default_supplier as supplier_id,co.name as supplier,co.customer_code as supplier_code FROM indent_details indd INNER JOIN items ite ON ite.id = indd.item_id INNER JOIN indents ind ON ind.id = indd.request_id   INNER JOIN costomers co ON co.id = ite.default_supplier LEFT JOIN lookup_masters lk ON lk.id = ind.department where indd.quantity - indd.puchased_qty > 0 AND co.name like "%$vrbl%" group by indd.id,co.id limit 5`;
var order_qry = `SELECT po.id, po.order_number,po.order_date,if(ISNULL(po.approved_by),'NOT APPROVED','APPROVED') as status ,co.name as vendor, co.customer_code FROM orders po LEFT JOIN costomers co on co.id = po.supplier_id  where po.order_number like "%$vrbl%" LIMIT 5`;

    var app = new Vue({
       el: '#app',
       data: {
           showMenu: false,
           order_flag:false,
           tax_class:{},
           tax_value:0,
           order:{
               supplier_code : '',
               supplier_name : '',
               ship_to_id : g_company_id,
                ship_to: g_company_code,
                ship_to_name: g_company_name,
                indent_no : '',
                indent_date : '',
                department : '',
                department_name : '',
                order_date : '',

           },
           company_item_details:{},
           company_items:[],
           departments : [],
           customers : [],
           order_detail_ob:{},
           total_amount_val:0,
           order_detail_array:[],
           garnt_total : 0,
           sub_total : 0,
           scheduled_array :[],
           scheduled_obj : {},
           scheduled_quantity : 0,
           pf_percentage : 0,
           pf_amount : 0,
           courrier_amount :0,
           taxes: [],
           final_sub_total:0,
           final_grant_total:0,
           order_ship_to:'',
           order_bill_to : '',
           order_department : '',
           currencies : [],
           order_currency:{},
           tax_object:{},
           companies : [],
           comapny_id : g_company_id,
           print_flag : false,
           order_id : 19,
           ind_qry : ind_qry,
           order_qry : order_qry,
       },
   methods: {
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         get_roles: function(){
            $("#positionSelect").modal('toggle');
           
         },
         set_order_type:function(flag){
            this.order_detail_ob = {};
             if(flag == 'O'){
                this.order_flag = true;
                var vm = this;
                    axios.get('/company/get_items?json=true').then((response) => {
                    vm.company_items = response.data;
                    console.log(vm.item_details);

                    }, (error) => {
                    // vm.errors = error.errors;
                    });
                return;
             }
             this.order_flag = false;
         },
         get_items:function(){

            var vm = this;
            axios.get('/company/get_items?json=true&&rates=true').then((response) => {
            vm.company_items = response.data;
            console.log(vm.item_details);

            }, (error) => {
            // vm.errors = error.errors;
            });

        },

        /*
        get taxes
        **/
        get_taxes:function(){

            var vm = this;
            axios.get('/general/tax?json=true').then((response) => {
            vm.taxes = response.data;
            console.log(vm.item_details);

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        /*
        get taxes
        **/
        getDepartment : function(event){
             console.log(event)
             this.order.department_id = event.id;
            this.order.department_name = event.lookup_description;
            this.order.department = event.lookup_value;

            // if(event.code == 'F1' || event.code == 'F2'){
                $("#departmentPopup").modal('toggle');
                // this.get_article_by_number();
            // }
        },
        /*
        get taxes
        **/
        get_customers:function(){

            var vm = this;
            axios.get('/company/get_customer/'+g_company_id).then((response) => {
            vm.customers = response.data;
            vm.order.ship_to_id = response.data.customer_code;
            vm.order.ship_to = response.data.customer_code;
            vm.order.ship_to_name = response.data.name;
            console.log(vm.customers);

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        /*
        get taxes
        **/
        get_companies:function(){

            var vm = this;
            axios.get('/admin/companies?json=true').then((response) => {
            vm.companies = response.data;
            console.log(vm.companies);

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        getSupplierPopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#supplierPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
        getIndentPopup : function(event){
            if(event.code == 'F1' || event.code == 'F2'){
                $("#indentPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
        getPoNo(){
            axios.get('/general/docNo?no_id=po').then((response) => {
                this.order.order_date = response.data.sys_date;
            }, (error) => {
            // vm.errors = error.errors;
            });
        },
        getIndent(e){
            console.log(e)
            var vm = this;
            vm.order.supplier_code = e.supplier_code;
            vm.order.supplier_name = e.supplier;
            vm.order.supplier_id = e.supplier_id;
            vm.order.indent_no = e.indent_no;
            vm.order.indent_date = e.request_date;
            vm.order.department_name = e.department_name;
            vm.order.department_id = e.department_id;
            vm.order.department = e.department;

            axios.get('/company/getIndentItem?indent_no='+e.indent_no+'&&party='+e.supplier_id).then((response) => {
            vm.order_detail_array = response.data;
            console.log(vm.order_detail_array);
                $("#indentPopup").modal('toggle');

            }, (error) => {
            // vm.errors = error.errors;
            });
        },
         
        getSupplier : function(event){
            console.log(event)
            var vm = this;
            vm.order.supplier_id = event.id;
            vm.order.supplier_code = event.customer_code;
            vm.order.supplier_name = event.name;
            if(vm.order_detail_array.length > 0){
                var result = vm.order_detail_array.map(function(a) {
                    a.rate = 0;
                    a.discount= 0;
                    a.sub_total= 0;
                    a.grant_total= 0;
                });
            }
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#supplierPopup").modal('toggle');
                // vm.get_article_by_number();
            // }
        },
        getDepartmentPopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#departmentPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
        /*
        get taxes
        **/
        get_currency:function(){

            var vm = this;
            axios.get('/general/currency?json=true').then((response) => {
            vm.currencies = response.data;

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        get_item_rates:function(evnt){
            var vm = this;
            axios.get('/company/get_rate/'+evnt.id).then((response) => {
            console.log(response.data);
            var rateResOb = response.data;

            if(rateResOb.status == 'success'){
                 vm.order_detail_ob = rateResOb.data;
                $("#itemPopup").modal('toggle');
            } else{
                alert('no rates found..!')
            }
                
            
            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        getItemRate(event,item, qty, index){
            if(event.code == 'F1' || event.code == 'F2'){
                var vm = this;
                axios.get('/company/get_rate/'+item+'?supplier='+vm.order.supplier_id).then((response) => {
                var rateResOb = response.data;

                if(rateResOb.status == 'success'){
                    // vm.order_detail_array[index] = rateResOb.data;
                    // var result = vm.order_detail_array.map(function(a) {
                    //     if(a.item_id == item){
                    //         a.rate = rateResOb.data.rate;
                    //         a.discount= rateResOb.data.discount;
                    //         // rateResOb.data.sub_total= vm.total_amount(a.quantity,rateResOb.data.rate);
                    //         // rateResOb.data.grant_total= vm.get_discount(a.discount,a.sub_total);
                            

                    //     }
                       
                    // });
                    rateResOb.data.quantity= qty;
                    var sb_total = vm.total_amount(rateResOb.data.quantity,rateResOb.data.rate);
                    var grnt_total = vm.get_discount(rateResOb.data.discount,sb_total);
                    rateResOb.data.sub_total= sb_total;
                    rateResOb.data.grant_total= grnt_total;
                    vm.$set(vm.order_detail_array, index, rateResOb.data)
                    console.log('response.data',vm.order_detail_array);
                    // $("#itemPopup").modal('toggle');
                } else{
                    alert('no rates found..!')
                }
                    
                
                }, (error) => {
                // vm.errors = error.errors;
                });
            }
        },
        total_amount:function(quantity,amount){
            
            if(quantity&&amount){
                this.total_amount_val = parseFloat(quantity)*parseInt(amount);
                this.sub_total = parseFloat(quantity)*parseInt(amount);
                return parseFloat(quantity)*parseInt(amount);

            }
            return 0.00;
        },
        get_discount:function(discount,amount){
            
            if(discount&&amount){
                var disc = parseFloat(discount/100);
                var disc_amount = parseFloat(amount)*disc;
                this.grant_total = parseFloat(amount) - disc_amount;

                return parseFloat(amount) - disc_amount;

            }else{
                this.grant_total = parseFloat(amount);

            }
            return parseFloat(amount);


        },
        make_schedule:function(id){

            if(!this.order_detail_ob.quantity){
                alert('please select an item or item quantity !');
                return;
            }
            $("#shcedule").modal('toggle');
        },
        getItemPopup : function(event, obj){
            this.selected_obj = obj;
             console.log('selected_obj',this.selected_obj)
             this.$refs.itemPop.$refs.search.focus();
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#itemPopup").modal('toggle');
            // }
        },
        
        add_ob : function(event){

            var vm = this;

            if(event.code == 'Enter' ){
                vm.add_row();
            }
        },
        add_row:function(){
             
            if(!this.order_detail_ob.date && !this.order_detail_ob.schedule){
                alert('please select a date or make scheduled')
                return;
            }
            if(!this.order_detail_ob.quantity){
                alert('please specify the quantity')
                return;
            }
            if(this.check_item_in_order_details(this.order_detail_ob.item_id)){
                alert('Item already selected');
                return;
            }
            
            this.order_detail_ob.grant_total = this.grant_total;
            this.order_detail_ob.sub_total = this.sub_total;
            this.order_detail_array.push(this.order_detail_ob);
            this.order_detail_ob = {};
            this.grant_total = 0;
            this.sub_total = 0;
        },

        /*
        add_schedule_row
        **/
        add_schedule_row : function(){
            if(!this.scheduled_obj.date ){
                alert('please select a date !')
                return;
            }
            if(!this.scheduled_obj.quantity ){
                alert('please add quantity !')
                return;
            }
            var total_qauntity = parseInt(this.scheduled_quantity) + parseInt(this.scheduled_obj.quantity);
            if(total_qauntity > this.order_detail_ob.quantity_total){
                alert('the quantity is exceeded!');
                return;
            } 
            this.scheduled_array.push(this.scheduled_obj);
            this.scheduled_quantity = total_qauntity;
            this.scheduled_obj = {};

        },
         /*
         add_schedule to object
        **/
         add_schedule_to_object : function(){

             if(this.scheduled_array.length <= 0){
                 alert('please add atleast one item');
                 return;
             }
             if(this.scheduled_array){
                var shedule_total = 0;
                this.scheduled_array.forEach(function(obj){
                    shedule_total = parseFloat(shedule_total)+parseFloat(obj.quantity);
                });
                this.order_detail_ob.quantity = shedule_total;

            }
            this.order_detail_ob.schedule = this.scheduled_array;
            alert('schedule created successfully!..');
            $("#shcedule").modal('toggle');
         },

         /* check item in check_item_in_order_details
         **/

         check_item_in_order_details(check_item){

             var valueArr = [];
             valueArr = this.order_detail_array.filter(function(item){ return item.item_id == check_item });
             return valueArr.length > 0;
               
         },
         calculate_basic_total(){
            
            // Array.prototype.sum = function (prop) {
            //     var total = 0
            //     for ( var i = 0, _len = this.length; i < _len; i++ ) {
            //         total += this[i][prop]
            //     }
            //     return total
            // }
            // var amount = this.order_detail_array.sum("grant_total");
            var vm = this;
            var calc_basic_total = 0;
                this.order_detail_array.forEach(function(obj){
                    calc_basic_total = calc_basic_total+vm.get_discount(obj.discount,parseFloat(obj.rate)*parseFloat(obj.quantity));

                });
            // return this.order_detail_array.sum("grant_total");
            this.final_basic_total = calc_basic_total;
            // return amount;
            return calc_basic_total;
                
            // console.log()
            // if(this.order_detail_array.length > 0){

            // }
         },
         calc_sub_total(){
             if(this.pf_percentage !=0 ){
                // var pf_amount = 

                var disc = parseFloat(this.pf_percentage/100);
                var pf_amount = parseFloat(this.final_basic_total)*disc;
                this.order.pf_amount = pf_amount;

                
             } else if(this.pf_amount !=0){
                var pf_amount = parseFloat(this.pf_amount);
                this.order.pf_amount = pf_amount;
             }
             else{
                var pf_amount = 0;
                this.order.pf_amount = pf_amount;
                
             }
            var sub_total = parseFloat(this.final_basic_total + pf_amount);
            if(this.courrier_amount > 0){
                sub_total = sub_total + parseFloat(this.courrier_amount);
            }
            this.final_sub_total = sub_total;
            return sub_total;
         },

         get_tax(tax_ob){
                this.order.tax_ob = tax_ob;
                this.tax_value = tax_ob.genaral_value;
         },

         /*
         tax_selected
         **/
         get_grant_total(){

            //  return this.tax_value;
            if(this.final_sub_total > 0){
                
                    var tax_value = parseFloat(this.tax_value);
                    var disc = parseFloat(tax_value/100);
                    var tax_amount = parseFloat(this.final_sub_total)*disc;
                    this.order.tax_amount = tax_amount;

                    var grant_total = parseFloat(this.final_sub_total + tax_amount);
                    this.final_grant_total = grant_total;
                    return grant_total;
               
                

            }
            return 0;
         },

         /* save order 
         **/
        save_oreder: function(){
           
            if(!this.order.department){
                alert('please select a department');
                return;
            }
            if(!this.order.ship_to){
                alert('please select ship to');
                return;
            }
            if(!this.order.supplier_id){
                alert('please select Supplier');
                return;
            }
            if(!this.order.order_type){
                
                alert('please select order type!');
                return;
            }
            if(this.order.order_type === 'O'){
                if(!this.order.currency){
                    alert('please select the currency!');
                    return;
                }
            }
            if(!this.order.quotation_no){
                
                alert('please provide a quatation no!');
                return;
            }
            if(this.order_detail_array.length <= 0){
                
                alert('please provide order details!');
                return;
            }
            this.order.tax_value = this.tax_value;
            this.order.sub_total = this.final_sub_total;
            this.order.basic_total = this.final_basic_total;
            this.order.grant_total = this.final_grant_total;
            this.order.courrier_amount = this.courrier_amount;
            this.order.order_date = new Date();

             console.log(this.order);
             console.log(this.order_detail_array);
            // var post_data = {};
            // post_data.order = this.order;
            // post_data.order_details = this.order_detail_array;
             axios.post('/company/orders',{
                 order:this.order,
                 order_details:this.order_detail_array,
             })
            .then(response => {
                this.order.order_no = response.data.order_no;
                // location.reload();
                // this.order = {};
                // this.order_detail_array = [];
                // this.order_id = response.data;
                this.print_flag = true;
                alert('successfully created!');
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
        /* Update order 
        **/
        update_order: function(){
            console.log('.supplier_id',this.order.suppier_id);
            if(!this.order.department){
                alert('please select a department');
                return;
            }
            if(!this.order.ship_to){
                alert('please select ship to');
                return;
            }
            if(!this.order.supplier_id){
                alert('please select Supplier');
                return;
            }
            if(!this.order.order_type){
                
                alert('please select order type!');
                return;
            }
            if(this.order.order_type === 'O'){
                if(!this.order.currency){
                    alert('please select the currency!');
                    return;
                }
            }
            if(!this.order.quotation_no){
                
                alert('please provide a quatation no!');
                return;
            }
            if(this.order_detail_array.length <= 0){
                
                alert('please provide order details!');
                return;
            }
            this.order.tax_value = this.tax_value;
            this.order.sub_total = this.final_sub_total;
            this.order.basic_total = this.final_basic_total;
            this.order.grant_total = this.final_grant_total;
            this.order.courrier_amount = this.courrier_amount;

            console.log(this.order);
            console.log(this.order_detail_array);
            // var post_data = {};
            // post_data.order = this.order;
            // post_data.order_details = this.order_detail_array;
            axios.post('/company/updateOrders',{
                order:this.order,
                order_details:this.order_detail_array,
            })
            .then(response => {
                this.order.order_no = response.data.order_no;
                // location.reload();
                // this.order = {};
                // this.order_detail_array = [];
                // this.order_id = response.data;
                this.print_flag = true;
                alert('successfully created!');
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
        },
         getPoPopup : function(event, obj){
            if(event.code == 'F1' || event.code == 'F2'){
                $("#poPopup").modal('toggle');
            }
        },
        getPOdata(e){
            console.log(e)
            var vm = this;

            axios.get('/company/orders/'+e.id).then((response) => {
            vm.order = response.data;
            vm.order_detail_array = response.data.exact_details;
            console.log(vm.order_detail_array);
                $("#poPopup").modal('toggle');
                vm.print_flag = true;
            }, (error) => {
            // vm.errors = error.errors;
            });
        },
         clear_order : function () {
            this.order = {};
            this.order_detail_array = [];
            // this.scheduled_array
            this.print_flag = true;

         },

         /* remove row of the table 
         **/
         remove_row(ind){
            this.$delete(this.order_detail_array, ind);
         },
         downloadPdf: function(id) {
            
            axios({
                url: "/company/order/pdf",
                method: "POST",
                responseType: "blob",
                data: {
                order_id: this.order_id,
                }
            }).then(response => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement("a");
                link.href = url;
                link.setAttribute("download","purchase_order.pdf");
                document.body.appendChild(link);
                link.click();
            });
            }
         
         
     
     },
     mounted(){
        this.get_items();
        this.get_taxes();
        this.getPoNo();
        // this.get_customers();
        this.get_companies();
        this.get_currency();

     }
    });
</script>
@endsection