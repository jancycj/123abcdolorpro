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
.number-field{
    max-width: 75px;
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
                        <h5 class="hd">#Purchase Stock Update </h5> 
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
                                            <input autocomplete="off" class="form-control"  v-model="mir.order_no" disabled>
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
                                            <input autocomplete="off" class="form-control" v-model="mir.vendor_code" disabled>
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
                                            <input autocomplete="off" class="form-control"  v-model="mir.gate_entry_no" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Gate entry Date </label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" type="date" class="form-control"  v-model="mir.gate_entry_date" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-6" >
                                    <div class="form-group row">
                                        <label class="col-3 form-control-label">Remarks</label>
                                        <div class="col-9 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="mir.remark" disabled>
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
                                            <input autocomplete="off" class="form-control" type="text"  v-model="mir.vendor_dc_no" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12" >
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">DC Date</label>
                                        <div class="col-8 input-group">
                                            <input autocomplete="off" class="form-control" type="date"  v-model="mir.vendor_dc_date" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12" >
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Invoice No</label>
                                        <div class="col-8 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="mir.vendor_invoice_no" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12" >
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Invoice Date</label>
                                        <div class="col-8 input-group">
                                            <input autocomplete="off" class="form-control" type="date"  v-model="mir.vendor_invoice_date" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12" >
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Total Amount</label>
                                        <div class="col-8 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="mir.total_bill_amount" disabled>
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
                                    <th scope="col">SiNo</th>
                                    <th scope="col">PO No</th>
                                    <th scope="col">Po date</th>
                                    <th scope="col">Part No *</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">UOM</th>
                                    <th scope="col">Accpt.Qty</th>
                                    <th scope="col">Cond.Accpt.Qty</th>
                                    <th scope="col">Stock take.Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(d,index) in searched_details">
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
                                            @{{d.sub_total}} 
                                        </td>
                                        <td>
                                             @{{d.uom}} 
                                        </td>
                                        <td class="number-field">
                                            @{{d.mir_accepted_quantity}} 
                                        </td class="number-field">
                                        <td class="number-field">
                                            @{{d.mir_conditionally_accepted_quantity}}  
                                        </td class="number-field">
                                        <td class="number-field">
                                            <input autocomplete="off" class="form-control"  v-model="d.stock_take_qty" > 
                                        </td>
                                        
                                        
                                    </tr>
                                  
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
                                    <input autocomplete="off" class="form-control" v-model="mir.other_charges" disabled>
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
                                    <input autocomplete="off" class="form-control"  v-model="mir.tcs_percent" disabled>
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
                        <div class="col-md-2 col-lg-2 col-sm-6 offset-8 mg-t-5" v-if="print_flag">
                                <button class="btn btn-outline-danger btn-block " @click="downloadPdf()">Print PO</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-md-6 mg-t-5" v-if="!print_flag && !update_flag">
                                <button class="btn btn-primary btn-block " @click="save_mir()">Save</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-6 mg-t-5" v-if="!print_flag && update_flag">
                                <button class="btn btn-primary btn-block " @click="update_mir()">Update</button>
                        </div>
                       
                        <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5" >
                                <button class="btn btn-secondary btn-block " @click="clear_mir()">Cancel</button>
                        </div>
                    </div>
                    
                </div>

            </div><!-- card-->
        </div><!-- col -->
        
      </div><!-- row row-xs -->

        
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
 

    var mir_qry =`SELECT distinct orh.mir_no, co.name, orh.id FROM 
order_receipt_headers orh  
INNER JOIN order_receipt_details orcd ON orcd.order_receipt_header_id = orh.id 
INNER JOIN costomers co ON co.id = orh.vendor_id 
where orh.company_id = {{DocNo::companyId()}} AND IFNULL(orcd.accepted_quantity,0) + IFNULL(orcd.conditionally_accepted_quantity,0)
> IFNULL(orcd.store_accepted_quantity,0) AND co.name like "%$vrbl%"
order by orh.mir_no  DESC limit 10`;
    var app = new Vue({
       el: '#app',
       data: {
           assortment:{},
           errors:[],
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
            rework_qty : '',
            rework_reason : '',
            rejected_qty : '',
            rejected_reason : '',
            selected_id : '',
            
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
            var flag = true;
            this.mir_details.forEach(function(obj){
                
                let total = obj.stock_take_qty;
                let limit = parseFloat(obj.mir_accepted_quantity?obj.mir_accepted_quantity:0) +
                                        parseFloat(obj.mir_conditionally_accepted_quantity?obj.mir_conditionally_accepted_quantity:0);

                if( total > limit ){
                    alert('can not accept more than accepted for '+ obj.part_no)
                    flag =  false;
                }
                

            });
            return flag;

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
        
        
        getMir : function(val){
            if(event.code == 'F1' || event.code == 'F2'){
                $("#mirPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
        mirEdit : function(evnt){
            
            var vm = this;
            vm.update_flag = true;
            axios.get('/company/purchase/getStockUpdateData/'+evnt.id).then((response) => {
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

            if(!vm.isValidMir()){
                // alert(vm.mir_message)
                return;
            }

            axios.post( '/company/purchase/stock/',vm.mir).then(response => {
                // this.mir.mir_no = response.data.mir_no;
                // this.mir.mir_date = response.data.mir_date;
                alert('Succesfully Updated..!');

            })
            .catch((error)=>{
            });
         },
         
     
     },
    
    });
</script>
@endsection