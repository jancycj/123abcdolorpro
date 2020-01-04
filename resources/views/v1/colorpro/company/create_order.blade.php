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
    </style>
@endsection
@section('content')
<div class="content content-fixed">
    <div class="container pd-20">
        <div class="import-sec-white">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#" >Company</a></li>
                    <li class="breadcrumb-item"><a href="#" >Orders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Create New Order</h4>
                </div>
                
            </div>
        </div>
      <div class="row row-xs">
       
        <div class="col-lg-12 col-md-12 mg-t-10">
            <div class="card mg-b-10">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-12">
                                <div class="pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                                    <div>
                                        <h4 class=" tx-teal mg-b-10">#New Order</h4> 
                                    </div> 
                                    {{-- <div class="d-flex mg-t-20 mg-sm-t-0">
                                        <button class="btn btn-outline-primary btn-sm ">Create</button> 
                                    </div> --}}
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="inputAddress">Order No:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" disabled>
                            </div>
                        </div>
                        <div class="col-2 offset-8">
                            <div class="form-group">
                                <label for="inputAddress">Currency:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" disabled>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">PO type</label>
                                <select class="custom-select form-control" @change="set_order_type(order.order_type)" v-model="order.order_type">
                                    <option value="" disabled="" selected="">select Type</option>
                                    <option value="L" >(L)&nbsp;Local</option>
                                    <option value="I" >(I)&nbsp;Import</option>
                                    <option value="O" >(OTR)&nbsp;OTR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="inputAddress">Quotation No:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" >
                            </div>   
                        </div>
                        <div class="col-2 offset-6">
                            <div class="form-group">
                                <label for="inputAddress">Tax:</label>
                                <select class="custom-select form-control">
                                    <option value="" disabled="" selected="">select Type</option>
                                    <option value="L">(GST)&nbsp;Local</option>
                                    <option value="I">(I)&nbsp;Import</option>
                                    <option value="O">(OTR)&nbsp;OTR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="inputAddress">Ship To:</label>
                                <select class="custom-select form-control">
                                    <option value="" disabled="" selected="">select supplier</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="inputAddress">Department</label>
                                <select class="custom-select form-control">
                                    <option value="" disabled="" selected="">select department</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div><!-- card-header -->
                <div class="card-body pd-y-30">
                    <div class="table-responsive">
                        <table class="table table-dashboard mg-b-0">
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
                            <tr>
                                <td class="tx-medium ">Item A</td>
                                <td class="tx-medium ">12/03/2020</td>
                                <td class="tx-medium ">12</td>
                                <td class="tx-medium ">NO</td>
                                <td class="tx-medium ">-</td>
                                <td class="tx-medium tx-primary">$1,050</td>
                                <td class=" tx-teal">-$32.00</td>
                                <td class=" tx-pink">- $1012.10</td>
                                <td class="tx-medium ">$1012.90 <span class=" order-b mg-l-5 tx-15 tx-normal tx-danger "><i class="icon fa fa-minus"></i> </span></td>
                            </tr>
                            <tr>
                                <td class="tx-medium ">Item A</td>
                                <td class="tx-medium ">12/03/2020</td>
                                <td class="tx-medium ">15</td>
                                <td class="tx-medium ">Kg</td>
                                <td class="tx-medium "> <a href="#" ><i class="fa fa-calendar"></i></a></td>
                                <td class="tx-medium tx-primary">$980</td>
                                <td class=" tx-teal">- $30.10</td>
                                <td class=" tx-pink">- $960.00</td>
                                <td class="tx-medium ">$960.40  <span class=" order-b mg-l-5 tx-15 tx-normal tx-danger"><i class="icon fa fa-minus"></i> </span></td> 
                            </tr>
                            <tr>
                                <td class="tx-medium ">
                                    <label for="item" class="label-t"> <small>item</small> </label>
                                    <select class="custom-select form-control" v-model="order_detail_ob.item" @change="get_item_rates(order_detail_ob.item)">
                                        
                                    <option  v-for="items in company_items" :value="items.id" > @{{items.item}}</option>
                                        
                                    </select>
                                </td>
                                <td class="tx-medium ">
                                    <label for="date" class="label-t"> <small>Date</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" name="date" v-model="order_detail_ob.date">
                                </td>
                                <td class="tx-medium ">
                                    <label for="quantity" class="label-t"> <small>Quantity</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" name="quantity" :disabled="!order_flag" v-model="order_detail_ob.quantity">
                                </td>
                                
                                <td class="tx-medium ">
                                    <label for="unit" class="label-t"> <small>Unit</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" name="unit" v-model="order_detail_ob.pr_unit" disabled>
                                </td>
                                <td class="tx-medium ">
                                    <label for="unit" class="label-t"> <small>Schedule</small> </label>
                                    <a  class="btn btn-white  btn-block"><i class="fa fa-calendar"></i>
                                    </a>
                                </td>
                                <td class="tx-medium tx-primary">
                                    <label for="rate" class="label-t"> <small>Rate</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" name="rate" v-model="order_detail_ob.rate" :disabled="!order_flag">
                                </td>
                                <td class=" tx-teal">
                                    <label for="disc" class="label-t"> <small>Desc</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" name="disc" v-model="order_detail_ob.discount" :disabled="!order_flag">
                                </td>
                                <td class=" tx-pink">
                                    <label for="net" class="label-t"> <small>Rate</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" name="net" disabled>
                                </td>
                                <td class="tx-medium ">
                                    <label for="amount" class="label-t"> <small>Rate</small> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" name="amount" disabled><span class=" order-m mg-l-5 tx-15 tx-normal tx-success"><i class="icon fa fa-plus"></i> </span>
                                </td> 
                            </tr>
                            
                        </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div><!-- card-body -->
                <div class="card-footer pd-y-30">
                    <div class="row">
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">Basic total:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1222" disabled>
                            </div>   
                        </div>
                        <div class="col-3 ">
                            <div class="form-group">
                                <label for="inputAddress">P&F:</label>
                                <div class="input-group">
                                    <input type="text" aria-label="First name" class="form-control" placeholder="%">
                                    <input type="text" aria-label="Last name" class="form-control" placeholder="amount">
                                </div>
                            </div>   
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">Courrier Charges:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="amount" >
                            </div>   
                        </div>
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">Sub total:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1222" disabled>
                            </div>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">Tax</label>
                                <select class="custom-select form-control">
                                    <option value="" disabled="" selected="">select Type</option>
                                    <option value="L">(L)&nbsp;Local</option>
                                    <option value="I">(I)&nbsp;Import</option>
                                    <option value="O">(OTR)&nbsp;OTR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">grant total:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1222" disabled>
                            </div>   
                        </div>
                    </div>
                    </div>
                    <div class="text-right mg-t-20 mg-sm-t-0">
                        <button class="btn btn-outline-primary btn-sm ">Next</button> 
                    </div>
                </div>

            </div><!-- card-->
        </div><!-- col -->
        
      </div><!-- row -->
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
           order:{},
           company_item_details:{},
           company_items:[],
           order_detail_ob:{},
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
        get_item_rates:function(id){
            alert(id);
            var vm = this;
            axios.get('/company/get_rate/'+id).then((response) => {
            vm.order_detail_ob = response.data;
            console.log(vm.order_detail_ob);
            // $("#itemModal").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });

        }
         
     
     },
     mounted(){
        this.get_items();
     }
    });
</script>
@endsection