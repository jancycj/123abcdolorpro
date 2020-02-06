@extends('layouts.colorpro.app')
@section('style')
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
            color: #6b6666 !important;
            font-size: 12px !important;
            margin-bottom: 0px !important;
        }
        .custom-body {
            padding: 0 !important;
        }
        .table th, .table td {
            padding: 3px 5px !important;
            line-height: 1.2 !important;
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
                        <div class="col-2">
                            <div class="form-group">
                                <label for="inputAddress">Order No:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" disabled>
                            </div>
                        </div>
                        
                        
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">PO type</label>
                                <select class="custom-select form-control" @change="set_order_type(order.order_type)" v-model="order.order_type">
                                    <option value="" disabled="" selected="">select Type</option>
                                    <option value="L" >(L)&nbsp;Standard</option>
                                    <option value="I" >(I)&nbsp;Import</option>
                                    <option value="O" >(OTR)&nbsp;OTR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="inputAddress">Quotation No:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Quotation no" v-model="order.quotation_no" >
                            </div>   
                        </div>
                        <div class="col-2 " v-if="order_flag">
                            <div class="form-group">
                                <label for="inputAddress">Currency:</label>
                                <select class="custom-select form-control"  v-model="order.currency">
                                    <option value="" disabled="" selected="">select Type</option>
                                    <option v-for="cur in currencies" :value="cur" >@{{cur.lookup_value}}</option>
                                    
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="inputAddress">Supplier:</label>
                                <select class="custom-select form-control" v-model="order.supplier">
                                    <option value="" disabled="" selected="">select supplier</option>
                                <option v-for="cst in customers" :value="cst.id">@{{cst.name}}</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="inputAddress">Ship To:</label>
                                <select class="custom-select form-control" v-model="order.ship_to">
                                    <option value="" disabled="" selected="">select ship to </option>
                                    <option v-for="cmp in companies" :value="cmp.id">@{{cmp.name}}</option>
                                           
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="inputAddress">Department</label>
                                <select class="custom-select form-control" v-model="order.department">
                                    <option value="" disabled="" selected="">select department</option>
                                <option v-for="dpt in departments" :value="dpt.lookup_value">@{{dpt.lookup_value}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div><!-- card-header -->
                <div class="card-body custom-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-dashboard mg-b-0">
                        <thead>
                            <tr>
                                <th class="">Item</th>
                                <th class="">Date</th>
                                <th class="">Quantity</th>
                                <th class="">Unit</th>
                                <th class="">Sched</th>
                                <th class="">Rate</th>
                                <th class="">Disc.</th>
                                <th class="">Net Rate</th>
                                <th class="">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(ord,index) in order_detail_array">
                                <td class="tx-medium ">@{{ord.item}}</td>
                                <td class="tx-medium ">
                                    <span v-if="ord.schedule"> <small class="tx-teal"> Scheduled</small></span> <span v-if="!ord.schedule">@{{ord.date}}</span>
                                </td>
                                <td class="tx-medium ">@{{ord.quantity}}</td>
                                <td class="tx-medium ">@{{ord.pr_unit}}</td>
                                <td class="tx-medium "> 
                                    
                                    <span v-if="ord.schedule"> <a href="#" ><i class="fa fa-calendar"></i></a></span> <span v-if="!ord.schedule">--</span>
                                </td>
                                <td class="tx-medium tx-primary">@{{ord.rate}}</td>
                                <td class=" tx-teal">- @{{ord.discount}}%</td>
                                <td class=" tx-pink">@{{ord.sub_total}}</td>
                                <td class="tx-medium ">@{{ord.grant_total}}  <span class=" order-b mg-l-5 tx-15 tx-normal tx-danger" @click="remove_row(index)"><i class="icon fa fa-minus"></i> </span></td> 
                            </tr>
                            <tr>
                                <td class="tx-medium ">
                                    <label for="item" class="label-t"> <small>item</small> </label>
                                    <select class="custom-select form-control" v-model="order_detail_ob.item_id" @change="get_item_rates(order_detail_ob.item_id)">
                                    
                                    <option  v-for="items in company_items" :value="items.id" > @{{items.item}}</option>
                                        
                                    </select>
                                </td>
                                <td class="tx-medium ">
                                    <label for="date" class="label-t"> <small>Date</small> </label>
                                    <input type="date" class="form-control" id="inputAddress" placeholder="Date" name="date" v-model="order_detail_ob.date">
                                </td>
                                <td class="tx-medium ">
                                    <label for="quantity" class="label-t"> <small>Quantity</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Quantity" name="quantity"  v-model="order_detail_ob.quantity">
                                </td>
                                
                                <td class="tx-medium ">
                                    <label for="unit" class="label-t"> <small>Unit</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Unit" name="unit" v-model="order_detail_ob.pr_unit" disabled>
                                </td>
                                <td class="tx-medium ">
                                    <label for="unit" class="label-t"> <small>Schedule</small> </label>

                                    
                                    <a  class="btn btn-white  btn-block" @click="make_schedule(1)"><i  :class="order_detail_ob.schedule?'fa fa-calendar-check-o tx-teal':'fa fa-calendar tx-teal'"></i>
                                    </a>
                                </td>
                                <td class="tx-medium tx-primary">
                                    <label for="rate" class="label-t"> <small>Rate</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Rate" name="rate" v-model="order_detail_ob.rate" :disabled="!order_flag">
                                </td>
                                <td class=" tx-teal">
                                    <label for="disc" class="label-t"> <small>Desc&nbsp;%</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Discount" name="disc" v-model="order_detail_ob.discount" :disabled="!order_flag">
                                </td>
                                <td class=" tx-pink">
                                    <label for="net" class="label-t"> <small>Net Rate</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Net" name="net" :value="total_amount(order_detail_ob.quantity,order_detail_ob.rate)" disabled>
                                </td>
                                <td class="tx-medium ">
                                    <label for="amount" class="label-t"> <small>total</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Total" name="amount" :value="get_discount(order_detail_ob.discount,total_amount(order_detail_ob.quantity,order_detail_ob.rate))" disabled><span class=" order-m mg-l-5 tx-15 tx-normal tx-success" @click="add_row()"><i class="icon fa fa-plus"></i> </span>
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
                                <label for="inputAddress">P&F:</label>
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
                        <div class="col-2 offset-10 mg-t-5">
                                <button class="btn btn-primary btn-block " @click="save_oreder()">Create Order</button>
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
    </div><!-- container -->
  </div><!-- content -->
  
@endsection
@section('script')

   
<script>
    var app = new Vue({
       el: '#app',
       data: {
           showMenu: false,
           order_flag:false,
           tax_class:{},
           tax_value:0,
           order:{
               ship_to:{{$company_id}},
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
           comapny_id : {{$company_id}},
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
        get_department:function(){

            var vm = this;
            axios.get('/general/department?json=true').then((response) => {
            vm.departments = response.data;
            console.log(vm.item_details);

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        /*
        get taxes
        **/
        get_customers:function(){

            var vm = this;
            axios.get('/company/customer?json=true').then((response) => {
            vm.customers = response.data;
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
        get_item_rates:function(id){
            var vm = this;
            axios.get('/company/get_rate/'+id).then((response) => {
            console.log(response.data);
            vm.order_detail_ob = response.data;
            
            }, (error) => {
            // vm.errors = error.errors;
            });

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
            
            Array.prototype.sum = function (prop) {
                var total = 0
                for ( var i = 0, _len = this.length; i < _len; i++ ) {
                    total += this[i][prop]
                }
                return total
            }
            var amount = this.order_detail_array.sum("grant_total");
            // return this.order_detail_array.sum("grant_total");
            this.final_basic_total = amount;
            return amount;
                
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
            if(!this.order.supplier){
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
               
                alert('successfully created!');
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },

         /* remove row of the table 
         **/
         remove_row(ind){
            this.$delete(this.order_detail_array, ind);
         }
         
         
     
     },
     mounted(){
        this.get_items();
        this.get_taxes();
        this.get_department();
        this.get_customers();
        this.get_companies();
        this.get_currency();

     }
    });
</script>
@endsection