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
                        <h5 class="hd">#Maretial Inward Purchase </h5> 
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
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getMir($event)" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">MIR No*</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="mir.mir_no" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">MIR Date* </label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off"  type="date" class="form-control"  v-model="mir.mir_date" disabled>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getOrderPopup($event)" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">PO No*</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="mir.order_no" :disabled="update_flag">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">PO Date </label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="mir.order_date" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getSupplierPopup($event)" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Supplier*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" class="form-control" v-model="mir.vendor_code" :disabled="update_flag">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="mir.vendor_name" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Gate entry No*</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="mir.gate_entry_no" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Gate entry Date </label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" type="date" class="form-control"  v-model="mir.gate_entry_date" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-6" >
                                    <div class="form-group row">
                                        <label class="col-3 form-control-label">Remarks</label>
                                        <div class="col-9 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="mir.remark">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12" >
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">DC No</label>
                                        <div class="col-8 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="mir.vendor_dc_no">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12" >
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">DC Date</label>
                                        <div class="col-8 input-group">
                                            <input autocomplete="off" class="form-control" type="date"  v-model="mir.vendor_dc_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12" >
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Invoice No</label>
                                        <div class="col-8 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="mir.vendor_invoice_no">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12" >
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Invoice Date</label>
                                        <div class="col-8 input-group">
                                            <input autocomplete="off" class="form-control" type="date"  v-model="mir.vendor_invoice_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12" >
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Total Amount</label>
                                        <div class="col-8 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="mir.total_bill_amount">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </div><!-- card-header -->
                <div class="card-body custom-body">
                    <div class="row" v-if="errors.length > 0">
                        <div class="col-12 text-center" v-for="error in errors">
                            <label for="erorr" class="text-danger"> @{{error[0]}}</label>
                        </div>
                    </div>

                    <div class="row" v-if="searched_details.length > 0">
                        <div class="col-3 input-group">
                            <div class="input-group mg-b-10">
                                <input type="text" class="form-control" placeholder="search item" v-model="search_text">
                            </div>
                        </div>
                        <div class="col-3 " v-if="selected_array.length > 0">
                            <button class="btn btn-xs btn-danger" @click="remove_others()"> remove others</button>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0">
                                <thead>
                                    <tr>
                                    <th scope="col"></th>
                                    <th scope="col">SiNo</th>
                                    <th scope="col">PO No</th>
                                    <th scope="col">Po date</th>
                                    <th scope="col">Part No *</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Order Qty</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">UOM</th>
                                    <th scope="col">Rcvd Qty</th>
                                    
                                    <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(d,index) in searched_details">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" :id="d.id" v-model="selected_array"  :value="d.id">
                                                <label class="custom-control-label" :for="d.id"></label>
                                            </div>
                                        </td>
                                        <td scope="row">@{{index+1}}</td>
                                        <td>
                                             @{{d.order_no}} 
                                        </td>
                                        <td>
                                             @{{d.order_date}} 
                                        </td>
                                        <td>
                                            @{{d.part_no}}
                                        </td>
                                        <td>
                                             @{{d.item}} 
                                        </td>
                                        <td>
                                            @{{d.mir_quantity}} 
                                        </td>
                                        <td>
                                            @{{d.sub_total}} 
                                        </td>
                                        <td>
                                             @{{d.uom}} 
                                        </td>
                                        <td>
                                        <input autocomplete="off" class="form-control"  v-model="d.recieved_qty"> 
                                        </td>
                                        

                                        <td>
                                            <a  class="action-icon " @click="deleteRow(index)"><i class="fa fa-trash-o tx-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                    
                                    <!-- <tr>
                                        <td></td>
                                        <td> <input class="form-control"  v-model="assortment.no_of_box_per_box"></td>
                                        <td> <input class="form-control"  v-model="assortment.no_of_box_per_box"></td>
                                    </tr> -->
                                </tbody>
                                </table>
                                
                            </div>
                        </div>
                       
                    </div>
                    
                </div><!-- card-body -->
                <div class="card-footer ">
                    <div class="row mg-b-10">
                        <div class="col-md-3 col-lg-3 col-sm-6"  >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">MIR total*</label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control"  :value="get_mir_total()" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6">
                            <div class="form-group row">
                                <label class="col-4 form-control-label">Other charges* </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" v-model="mir.other_charges" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6">
                            <div class="form-group row">
                                <label class="col-4 form-control-label">Tax Amount* </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control"  :value="get_mir_tax_amount()" disabled>
                                </div>
                                <label class="col-4 form-control-label">TCS%* </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control"  v-model="mir.tcs_percent">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6">
                            <div class="form-group row">
                                <label class="col-4 form-control-label">Grant total* </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control"  v-model="mir.grant_total" disabled>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row order-ft">
                        
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-md-6 mg-t-5" v-if="!print_flag && !update_flag">
                                <button class="btn btn-primary btn-block " @click="save_mir()">Save</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-6 mg-t-5" v-if="!print_flag && update_flag">
                                <button class="btn btn-primary btn-block " @click="update_mir()">Update/Approve</button>
                        </div>
                       
                        <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5" >
                                <button class="btn btn-secondary btn-block " @click="clear_mir()">Cancel</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-6  mg-t-5" v-if="update_flag">
                                <button class="btn btn-outline-danger btn-block " @click="downloadPdf(mir.id)">Print PO</button>
                        </div>
                    </div>
                    
                </div>

            </div><!-- card-->
        </div><!-- col -->
        
      </div><!-- row row-xs -->

        <div class="modal fade" id="chooseCustomer" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-customer @customer="getCostomerEvent($event)"></choose-customer>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- modal end -->

        <div class="modal fade" id="sectionPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
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
                            @selected="getSection($event)"
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
        <div class="modal fade" id="supplierPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                        <raw-component 
                                :id="'polist'"
                                :query="co_qry" 
                                @selected="getSupplier($event)"
                                >
                            </raw-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- yarn popup modal end -->
        <div class="modal fade" id="orderPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <raw-component 
                                :id="'polist'"
                                :query="po_qry" 
                                @selected="getOrder($event)"
                                >
                            </raw-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- yarn popup modal end -->
        <div class="modal fade" id="assortmentPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :table="'assortments'" 
                            :fields="['id','assortment_no','assortment_name']" 
                            :search_filed="'assortment_no'" 
                            @selected="getAssortmentByNumber($event)"
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
        <div class="modal fade" id="mirPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <raw-component 
                                :id="'mir_list'"
                                :query="mir_qry" 
                                @selected="mirEdit($event)"
                                >
                            </raw-component>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- yarn popup modal end -->
    
  </div><!-- container -->
</div><!-- content -->

  
@endsection
@section('script')
<script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <!-- <script src="{{asset('assets/js/init/datatables-init.js')}}"></script> -->


    <script type="text/javascript">
       
  </script>
<script>
    var po_qry = `SELECT ord.order_number as po_no, ord.order_date as date, co.name as supplier, co.customer_code as supplier_code, co.id FROM order_details ordd INNER JOIN orders ord ON ord.id = ordd.order_id INNER JOIN costomers co ON co.id = ord.supplier_id where IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) > 0 AND ord.comapny_id = {{DocNo::companyId()}} AND co.name like "%$vrbl%" group by ord.order_number,ord.order_date,co.name,co.id order by ord.order_number limit 10`;

    var co_qry = `SELECT  co.name as supplier, co.customer_code, co.id FROM order_details ordd INNER JOIN orders ord ON ord.id = ordd.order_id INNER JOIN costomers co ON co.id = ord.supplier_id where IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) > 0 AND ord.comapny_id = {{DocNo::companyId()}} AND co.name like "%$vrbl%" group by co.name,co.id order by 1 limit 10`;

    var mir_qry =`SELECT  orh.mir_no, co.name, orh.id FROM order_receipt_headers orh  INNER JOIN costomers co ON co.id = orh.vendor_id where orh.company_id = {{DocNo::companyId()}} AND co.name like "%$vrbl%" order by orh.mir_no DESC limit 10`;
    var app = new Vue({
       el: '#app',
       data: {
           assortment:{},
           errors:[],
           po_qry : po_qry,
           co_qry : co_qry,
           mir_qry : mir_qry,
           shades : [],
           selected_customer : {},
           update_flag : false,
           print_flag : false,
           url :'',
           items : [ ],
           mir : {
                mir_no : '',
                mir_date:'',
                vendor_code : '',
                vendor_name : '',
                order_no : '',
                order_date : '',
                other_charges:0,
            },
           mir_details : [],
           item_ob : {sl_no : 1, shade_code:'', colour: ''},
           no_of_shades : 1,
           selected_obj : {},
           removeFlag : false,
           selected_file : '',
           indent_section : '',
            indent_section_description : '',
            indent_details : {},
            selected_array : [],
            search_text :'',
            mir_message : '',
            
       },
       computed: {
            searched_details() {
                return this.mir_details.filter(detail => {
                    return detail.item.toLowerCase().includes(this.search_text.toLowerCase()) || detail.part_no.toLowerCase().includes(this.search_text.toLowerCase())
                })
            },
        },
        // watch:{
        //     'mir.other_charges': function (newVal, oldVal){
        //         this.get_mir_tax_amount();
        //     }
        // },
       
   methods: {
        getOrderDetails:function(event){

          
            var vm = this;
            vm.update_flag = true;
            axios.get('/company/order/recieptData?order_no='+event.po_no+'&&party='+event.supplier).then((response) => {
               vm.mir_details = response.data;
                // vm.shade.customer_name
                // code
                // colour
                // priory
                // program_code
                // customer_code
                vm.isTaxSame();
                vm.get_mir_other_charges();
                $("#itemPopup").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        deleteRow : function(ind){
            this.removeFlag = true;
            this.mir_details.splice(ind, 1);
        },
        remove_others : function(){
            var vm = this;
            var res_array = [];
            vm.selected_array.forEach( id => {
                vm.mir_details.map( m => {
                    if(m.id === id){
                        res_array.push(m);
                    }
                })
            })
            vm.mir_details = res_array;
            
            // vm.selected_array.forEach( id =>{
            //     let index = vm.mir_details.findIndex(item => item.id ===id);
            //      vm.mir_details.splice(index, 1);

            // })
            vm.get_mir_other_charges();
            vm.selected_array = [];
        },
        addRow : function(ind){
            this.removeFlag = true;
            var last_obj = this.assortment_shades[this.assortment_shades.length - 1]
            this.items.push({id: '' , part_no:'',name:''});
        },
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         create_item: function(){
                     $("#addItem").modal('toggle');
           
         },
         getCostomerEvent(val){
            this.selected_customer = val;
            this.assortment.customer_name = val.name;
            this.assortment.customer_code =val.short_name;
            this.assortment.customer_id =val.id;

            $("#chooseCustomer").modal('toggle');
         },
         getSectionPopup : function(event){
            if(event.code == 'F1' || event.code == 'F2'){
                $("#sectionPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
         
        getSection : function(event){
            this.indent.section = event.lookup_value;
            this.indent.department = event.id;
            this.indent.section_des = event.lookup_description;
            this.indent_section = event.lookup_value;
            this.indent_section_description = event.lookup_description;

            // if(event.code == 'F1' || event.code == 'F2'){
                $("#sectionPopup").modal('toggle');
                // this.get_article_by_number();
            // }
        },
        getSupplierPopup : function(event){
            if(event.code == 'F1' || event.code == 'F2'){
                $("#supplierPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
        isTaxSame : function(){
            var vm = this;
            var t_array = vm.$uniqArray(vm.mir_details,'tax_percent')
            if(t_array.length > 1){
                    alert('tax missmatch')
                }

            // var uniq_arr = vm.mir_details.filter((itm, idx, arr) => arr.indexOf(itm) === idx);
            //     if(uniq_arr.length > 1){
            //         alert('tax missmatch')
            //     }
        },
        isValidMir : function(){
            this.mir_details.forEach(function(obj){
                    if(obj.recieved_qty == null || obj.recieved_qty == 0){
                        
                        alert('recieved_quantity required for '+ obj.part_no)
                        return false;
                    } 

                    let ovp = obj.over_reciept_percentage ? obj.over_reciept_percentage : 0;
                    let limit = parseFloat(obj.quantity) + (obj.quantity * (ovp/100))
                    let total_qty = parseFloat(obj.cumlative_qty) + parseFloat(obj.recieved_qty)
                    console.log('limit', limit, ovp, total_qty)
                    if(Math.round(limit) < total_qty){
                        alert('can not recieved_quantity greater than allowed for '+ obj.part_no)
                        return false;
                    }
                    

                });
                return true;

        },
        getSupplier : function(event){
             var vm = this;
            vm.mir.vendor_id = event.id;
            vm.mir.vendor_code = event.customer_code;
            vm.mir.vendor_name = event.supplier;
            vm.mir.order_no = "";
            vm.mir.order_date = "";
            axios.get('/company/order/recieptData?party='+event.id).then((response) => {
               vm.mir_details = response.data;
               vm.isTaxSame();
               vm.get_mir_other_charges();
                // vm.shade.customer_name
                // code
                // colour
                // priory
                // program_code
                // customer_code

                $("#supplierPopup").modal('toggle');

            }, (error) => {
            // vm.errors = error.errors;
            });
            // if(event.code == 'F1' || event.code == 'F2'){
                // this.get_article_by_number();
            // }
        },
        get_mir_total(){

            var vm = this;
            var calc_basic_total = 0;
            this.mir_details.forEach(function(obj){
                if(obj.recieved_qty){
                    let ttl = parseFloat(obj.sub_total) * parseFloat(obj.recieved_qty);
                    calc_basic_total = parseFloat(calc_basic_total) + parseFloat(ttl);
                    calc_basic_total = calc_basic_total.toFixed(2);
                }
            });
            // return this.order_detail_array.sum("grant_total");
            // this.final_basic_total = calc_basic_total;
            // return amount;
            vm.mir.mir_total = calc_basic_total;
            
            return calc_basic_total;
        },
        get_mir_other_charges(){

            var vm = this;
            var other_charges = 0;
               
                if(vm.mir_details.length > 0){
                    let mobj = vm.mir_details[0];
                    other_charges = parseFloat(mobj.pnf_total)+parseFloat(mobj.courrier_charge);
                    other_charges = other_charges.toFixed(2);
                    vm.mir.p_and_f = mobj.pnf_total;
                    vm.mir.courrier = mobj.courrier_charge;

                }
            vm.mir.other_charges = other_charges;
            return other_charges;
        },
        get_mir_tax_amount(){

            var vm = this;
            var tax_amount = 0;
            var grant_total = 0;
            
                
                if(vm.mir_details.length > 0){
                    var tax_obj = vm.mir_details[0];
                    

                    var total_amnt = parseFloat(vm.mir.mir_total)+parseFloat(vm.mir.other_charges);

                    var tax_value = parseFloat(tax_obj.tax_percent/100);
                    tax_amount = parseFloat(total_amnt)*tax_value;
                    

                    tax_amount = tax_amount.toFixed(2);
                    
                    grant_total = parseFloat(total_amnt)+ parseFloat(tax_amount);
                    if(vm.mir.tcs_percent){

                        let tcs_percent =  parseFloat(vm.mir.tcs_percent/100);
                        let tcs_amount = tax_amount*tcs_percent;
                        grant_total = parseFloat(grant_total) + parseFloat(tcs_amount);
                    }
                    grant_total = grant_total.toFixed(2);
                }
            // return this.order_detail_array.sum("grant_total");
            // this.final_basic_total = calc_basic_total;
            // return amount;
            vm.mir.tax_amount = tax_amount;
            vm.mir.grant_total = grant_total;
            vm.mir.total_bill_amount = grant_total;

            return tax_amount;
        },
        
         keyEvent : function(event){
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#chooseCustomer").modal('toggle');
            // }
        },
        getOrderPopup : function(event, obj){
            if(event.code == 'F1' || event.code == 'F2'){
                $("#orderPopup").modal('toggle');
            }
        },
        getOrder : function(event){
            var vm = this;
            vm.mir.vendor_id = event.id;
            vm.mir.vendor_code = event.supplier_code;
            vm.mir.vendor_name = event.supplier;
            vm.mir.order_no = event.po_no;
            vm.mir.order_date = event.date;
            axios.get('/company/order/recieptData?order_no='+event.po_no+'&&party='+event.id).then((response) => {
               vm.mir_details = response.data;
                // vm.shade.customer_name
                // code
                // colour
                // priory
                // program_code
                // customer_code

                $("#orderPopup").modal('toggle');

            }, (error) => {
            // vm.errors = error.errors;
            });
            // vm.items.push(vm.item_ob)
        },
        add_ob : function(event){

            var vm = this;

            if(event.code == 'Enter' ){
                if(this.check_item_in_items(vm.item_ob.item_id)){
                    alert('duplicate item');
                    return;
                }
                if(! vm.item_ob.unit_id){
                    alert('please provide an item');
                    return;
                }
                if(! vm.item_ob.qty){
                    alert('please provide a quantity');
                    return;
                }
                vm.items.push(vm.item_ob);
                vm.item_ob = {};
            }
        },
        check_item_in_items(check_item){
            var valueArr = [];
            valueArr = this.items.filter(function(item){ return item.item_id == check_item });
            return valueArr.length > 0;
        
        },
       
        selectCustomer : function(event){
            if(event.code == 'Enter' ){
                $("#chooseCustomer").modal('toggle');
            }
        },
         
         /* get item
         **/
         get_item_by:function(id){

            var vm = this;
            vm.update_flag = true;
            axios.get('/company/shade/'+id).then((response) => {
                vm.shade = response.data;
                vm.shade.program_code = response.data.code;
                vm.shade.priory = response.data.priority;
                vm.shade.code = response.data.name;
                // vm.shade.customer_name
                // code
                // colour
                // priory
                // program_code
                // customer_code

                $("#addItem").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        /*
        get taxes
        **/
        get_colors:function(){

            var vm = this;
            axios.get('/general/lookup?json=true&&key=COLOUR').then((response) => {
            vm.colours = response.data;

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        clear_mir : function(){
            this.mir =  {
                mir_no : '',
                mir_date:'',
                vendor_code : '',
                vendor_name : '',
                order_no : '',
                order_date : '',
                other_charges:0,
            },
            this.mir_details = [],
            this.print_flag = false;
            this.update_flag= false;

            
        },
        clear_indent : function(){
            this.items =  [];
            this.indent =   {
               indent_no : '',
                indent_date:'',
                department :'',
                product_group : '',
                section : '',
                section_des : '',
                family : '',
                family_des : '',
            };
           this.item_ob = {sl_no : 1, shade_code:'', colour: ''},
            this.getIndentNo();

            
        },
        getMir : function(val){
            if(event.code == 'F1' || event.code == 'F2'){
                $("#mirPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
        mirEdit : function(evnt){
            
            var vm = this;
            vm.update_flag = true;
            axios.get('/company/mir_recipt/'+evnt.id).then((response) => {
               vm.mir = response.data.header;
               vm.mir_details = response.data.details;
            //    vm.get_mir_other_charges();

               console.log('vm.mir_details',vm.mir_details)
                // vm.shade.customer_name
                // code
                // colour
                // priory
                // program_code
                // customer_code

                $("#mirPopup").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });
        },
        onFileChange(e) {
            this.selected_file = e.target.files[0];
            this.url = URL.createObjectURL(this.selected_file);
            
        },
        
        save_mir:function() {
            var vm = this;
            vm.mir.details = vm.mir_details; 
            if(vm.mir_details.length <= 0){
                alert('please provide item')
                return;
            }
            if(!vm.isValidMir()){
                // alert(vm.mir_message)
                return;
            }
            
            if((vm.mir.vendor_dc_no && vm.mir.vendor_dc_date) || (vm.mir.vendor_invoice_no && vm.mir.vendor_invoice_date)){

            } else{
                alert('vendor_dc_no and date or vendor_invoice_no and date are required')
                return;
            }
            axios.post( '/company/mir_recipt',vm.mir).then(response => {
                this.mir.mir_no = response.data.mir_no;
                this.mir.mir_date = response.data.mir_date;
                alert('Succesfully Saved..!');

            })
            .catch((error)=>{
            });
         },
         update_mir:function() {
            var vm = this;
            vm.mir.details = vm.mir_details; 
            if(vm.mir_details.length <= 0){
                alert('please provide item')
                return;
            }
            if(!vm.isValidMir()){
                // alert(vm.mir_message)
                return;
            }
            
            if((vm.mir.vendor_dc_no && vm.mir.vendor_dc_date) || (vm.mir.vendor_invoice_no && vm.mir.vendor_invoice_date)){

            } else{
                alert('vendor_dc_no and date or vendor_invoice_no and date are required')
                return;
            }
            axios.put( '/company/mir_recipt/'+vm.mir.id,vm.mir).then(response => {
                // this.mir.mir_no = response.data.mir_no;
                // this.mir.mir_date = response.data.mir_date;
                alert('Succesfully Updated..!');

            })
            .catch((error)=>{
            });
         },
         update_indent:function() {
            axios.put('/company/indent/'+this.indent.id,this.indent)
            .then(response => {
                alert('successfully updated!');
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
            });
         },
         getIndentEdit : function(val){
            var vm = this;
            vm.update_flag = true;
            axios.get('/company/indent/'+val.id).then((response) => {
                this.indent = response.data;
                this.items = response.data.items;
                $("#IndentPopup").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });
        },
        /** download pdf */
        downloadPdf: function(id) {
            
            window.open('/company/report/mir_single_pdf/'+id, '_blank');
            // axios({
            //     url: "/company/mir_recipt/pdf",
            //     method: "POST",
            //     responseType: "blob",
            //     data: {
            //     order_id: id,
            //     }
            // }).then(response => {
            //     const url = window.URL.createObjectURL(new Blob([response.data]));
            //     const link = document.createElement("a");
            //     link.href = url;
            //     link.setAttribute("download","purchase_order.pdf");
            //     document.body.appendChild(link);
            //     link.click();
            // });
        }
     
     },
     mounted(){
        // this.getIndentNo();
     },
     created(){
        this.get_colors();
     }
    });
</script>
@endsection