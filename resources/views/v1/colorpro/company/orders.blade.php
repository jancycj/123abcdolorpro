@extends('layouts.colorpro.app')

@section('content')
<div class="content content-fixed">
    <div class="container pd-20">
      <div class="import-sec-white">
      <div class="d-sm-flex align-items-center justify-content-between ">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#" >Customer</a></li>
              <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Order List</h4>
        </div>
        <div class="d-none d-md-block">
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="save" class="wd-10 mg-r-5"></i> Save</button>
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="upload" class="wd-10 mg-r-5"></i> Export</button>
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="share-2" class="wd-10 mg-r-5"></i> Share</button>
          <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="sliders" class="wd-10 mg-r-5"></i> Settings</button>
        </div>
      </div>
    </div>

      <div class="row row-xs">
       
        <div class="col-lg-12 col-md-12 mg-t-10">
                <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Order List</strong>
                            <a href="{{url('company/orders/create')}}" class="btn btn-sm btn-outline-secondary float-right"><i class="fa fa-plus"></i>create</a>
                        </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2" >
                                            <div class="form-group">
                                                <label for="inputAddress"> Search Order NO</label>
                                                <input type="text" class="form-control" v-model='order_search_no' v-on:keyup.enter.exact="search_order_by_no" >
                                            </div>
                                        </div>
                                        {{-- <div class="col-3">
                                            <div class="form-group">
                                                <label for="inputAddress"> Search Supplier</label>
                                                <select class="custom-select form-control" >
                                                    <option value="" disabled="" selected="">select supplier</option>
                                                <option v-for="cst in customers" :value="cst.id">@{{cst.name}}</option>
                                                    
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <table id="table_1" class="table table-striped table-bordered" style="margin-top:10px;">
                                                <thead>
                                                    <tr>
                                                        <th>Order_No</th>
                                                        <th>Date</th>
                                                        <th>Supplier</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                        <th>print</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
            
                                                    @foreach ($orders as $item)
                                                    <tr>
                                                        <td>{{$item->order_number}}</td>
                                                        <td>{{date('d-m-Y', strtotime($item->order_date))}}</td>
                                                        <td>{{$item->supplier_name}}</td>
                                                        <td>{{$item->grant_total}}</td>

                                                        <td>
                                                            <a href="#" @click="view_order({{$item->id}})">

                                                                {{-- <span class="text-warning"></span> --}}
                                                                <i class="fa fa-eye text-primary"></i>
                                                            </a>

                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-danger btn-block " @click="downloadPdf({{$item->id}})">Print PO</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                    </div><!-- card -->
        </div><!-- col -->
        
      </div><!-- row -->

      
    </div><!-- container -->
  </div><!-- content -->
  <div class="modal fade" id="view_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">

            <div class="modal-content tx-14 card">

                <!-- <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel4">Add new Item</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>  -->

                <div class="modal-body">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-4 offset-4">
                                    <div class="pd-t-20    bd-b-0 pd-b-0">
                                        <div class="order-cap">
                                        <h3 class=" tx-teal mg-b-10">#Goods recieved note</h3> 
                                        </div> 
                                        
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="inputAddress">Order No:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" v-model="order.order_number" disabled>
                                </div>
                            </div>
                            
                            
                            <div class="col-2 ">
                                <div class="form-group">
                                    <label for="inputAddress">PO type</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" v-model="order.order_type" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="inputAddress">Quotation No:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Quotation no" v-model="order.quote_ref_no" disabled>
                                </div>   
                            </div>
                            <div class="col-2 float-right" >
                                <div class="form-group">
                                    <label for="inputAddress">Currency:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="INR" disabled>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="inputAddress">Ship To:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="INR" v-model="order.ship_to_company_name" disabled>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="inputAddress">Bill To:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="INR" v-model="order.bill_to_company_name" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="inputAddress">Supplier DC NO:</label>
                                    <input type="text" class="form-control" id="inputAddress"  v-model="order.dc_no" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="inputAddress">Supplier DC Date</label>
                                    <input type="date" class="form-control" id="inputAddress"  v-model="order.dc_date" >
                                </div>
                            </div>
                            
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body card-block">
                            <div class="table-responsive">
                                    <table class="table table-bordered table-dashboard mg-b-0 custom-table">
                                    <thead>
                                        <tr>
                                            <th class="">Item</th>
                                            <th class="">Date</th>
                                            <th class="">Quantity</th>
                                            <th class="">Unit</th>
                                            <th class="">Sched</th>
                                            <th class="">Rate</th>
                                            <th class="">Net Rate</th>
                                            <th class="" >Disc.</th>
                                            <th class="">Amount</th>
                                            <th class="" style="width:70px;">Completed</th>
                                            <th class="">remarks</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr v-for="ord in order.details" v-if="ord.balance > 0 ">
                                            <td class="tx-medium ">@{{ord.item}}</td>
                                            <td class="tx-medium ">
                                                <span v-if="ord.schedules.length > 0"> <small class="tx-teal"> Scheduled</small></span> <span v-if="ord.schedules.length <= 0">@{{ord.delivery_date}}</span>
                                            </td>
                                            <td class="tx-medium ">@{{ord.balance}}</td>
                                            <td class="tx-medium ">@{{ord.purchase_unit_id}}</td>
                                            <td class="tx-medium "> 
                                                
                                                <span v-if="ord.schedule"> <a href="#" ><i class="fa fa-calendar"></i></a></span> <span v-if="!ord.schedule">--</span>
                                            </td>
                                            <td class="tx-medium tx-primary">@{{ord.rate}}</td>
                                            <td class=" tx-pink">@{{ord.sub_total}}</td>
                                            <td class=" tx-teal">- @{{ord.discount}}%</td>
                                            
                                            <td class="tx-medium " >@{{ord.grant_total}}  </td>
                                            
                                            
                                            <td style="width:70px;">
                                                <input class="form-control max-width: 65px;" name="quantity"  v-model="ord.recieved" @input="check_balance(ord.balance,ord.recieved)">
                                            </td> 
                                            <td>
                                                <input class="form-control" name="quantity"  v-model="ord.remarks">
                                            </td> 
                                            
                                        </tr>
                                        
                                    </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                        
                    </div> <!-- /card body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="send_order()" :disabled="disable_flag">Recieve Order</button>
                </div>
            </div>
        </div>
        </div><!-- modal end -->
        <div class="modal fade " id="add_qc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
        aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    
                    <div class="modal-content tx-14 card ">
    
    
                        <div class="modal-body">
                                <div class="card-header ">
                                    <div class="row">
                                        <div class="col-12">
                                                <div class="pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                                                    <div>
                                                        <h4 class=" tx-teal mg-b-10">#Inspect QC</h4> 
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
                                                            
                                                            <th class="">QC plans </th>
                                                            <th class="">Qc value</th>
                                                            <th class="">Tollarance</th>
                                                            <th class="">Inspection</th>
                                                            <th class="">Remarks</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="qc_ob in qc_array ">
                                                        <td class=" tx-teal">@{{qc_ob.qc_parameter}}
                                                        </td>
                                                        <td class=" tx-pink">@{{qc_ob.qc_value}}
                                                        </td>
                                                        <td class=" tx-pink">@{{qc_ob.qc_tollarence}}
                                                        </td>
                                                        <td class="tx-medium "> 
                                                            <div class="input-group">
                                                                <input class="form-control" name="quantity"  v-model="qc_ob.inspection">
                                                            </div>
                                                        </td>
                                                        <td class="tx-medium "> 
                                                            <div class="input-group">
                                                                <input class="form-control" name="quantity"  v-model="qc_ob.remark">
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
    
                                    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="add_qc_to_object()">Create Qc</button>
                        </div>
                    </div>
                </div>
                </div><!-- modal end -->

                <div class="modal fade" id="exact_view_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">

            <div class="modal-content tx-14 card">

                <!-- <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel4">Add new Item</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>  -->

                <div class="modal-body">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-4 offset-4">
                                    <div class="pd-t-20    bd-b-0 pd-b-0">
                                        <div class="order-cap">
                                        <h3 class=" tx-teal mg-b-10">#Order</h3> 
                                        </div> 
                                        
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="inputAddress">Order No:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" v-model="search_order.order_number" disabled>
                                </div>
                            </div>
                            
                            
                            <div class="col-2 ">
                                <div class="form-group">
                                    <label for="inputAddress">PO type</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" v-model="search_order.order_type" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="inputAddress">Quotation No:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Quotation no" v-model="search_order.quote_ref_no" disabled>
                                </div>   
                            </div>
                            <div class="col-2 float-right" >
                                <div class="form-group">
                                    <label for="inputAddress">Currency:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="INR" disabled>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="inputAddress">Ship To:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="INR" v-model="search_order.ship_to_company_name" disabled>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="inputAddress">Bill To:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="INR" v-model="search_order.bill_to_company_name" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="inputAddress">Supplier </label>
                                    <input type="text" class="form-control" id="inputAddress"  v-model="search_order.supplier_name" disabled >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="inputAddress">Order Date</label>
                                    <input type="date" class="form-control" id="inputAddress"  v-model="search_order.order_date" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <button  class="btn btn-success  mg-t-30 " @click="g_r_n(search_order.id)">
                                    +GRN
                                    {{-- <span class="text-warning"></span> --}}
                                </button>
                            </div>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body card-block">
                            <div class="table-responsive">
                                    <table class="table table-bordered table-dashboard mg-b-0 custom-table">
                                    <thead>
                                        <tr>
                                            <th class="">Item</th>
                                            <th class="">Part NO</th>
                                            <th class="">Date</th>
                                            <th class="">Quantity</th>
                                            <th class="">Unit</th>
                                            <th class="">Sched</th>
                                            <th class="">Rate</th>
                                            <th class="">Net Rate</th>
                                            <th class="" >Disc.</th>
                                            <th class="">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr v-for="ord in search_order.exact_details" >
                                            <td class="tx-medium ">@{{ord.item}}</td>
                                            <td class="tx-medium ">@{{ord.item_part_no}}</td>
                                            <td class="tx-medium ">
                                                <span v-if="ord.schedules.length > 0"> <small class="tx-teal"> Scheduled</small></span> <span v-if="ord.schedules.length <= 0">@{{ord.delivery_date}}</span>
                                            </td>
                                            <td class="tx-medium ">@{{ord.quantity}}</td>
                                            <td class="tx-medium ">@{{ord.unit}}</td>
                                            <td class="tx-medium "> 
                                                
                                                <span v-if="ord.schedule"> <a href="#" ><i class="fa fa-calendar"></i></a></span> <span v-if="!ord.schedule">--</span>
                                            </td>
                                            <td class="tx-medium tx-primary">@{{ord.rate}}</td>
                                            <td class=" tx-pink">@{{ord.sub_total}}</td>
                                            <td class=" tx-teal">- @{{ord.discount}}%</td>
                                            
                                            <td class="tx-medium " >@{{ord.grant_total}}  </td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                        
                    </div> <!-- /card body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        </div><!-- Exact view modal end -->
  
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
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
      } );
  </script>
<script>
    var app = new Vue({
       el: '#app',
       data: {
           showMenu: false,
           roles:[
             {role:'Admin',url:'#'},
             {role:'Candidate',url:'#'},
             {role:'User',url:'#'},
           ],
           item:{},
            order : {},
            customers : [],
            company_id : '',
            qc_array: [],
            reciept : [],
            disable_flag : false,
            item_detail_id : '',
            order_search_no : '',
            search_order : {},
        },
   methods: {
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         get_roles: function(){
                     $("#positionSelect").modal('toggle');
           
         },
         search_order_by_no : function(){
            // alert(this.order_search_no);
            if(this.order_search_no == ''){
                alert('please enter oreder number');
            }
            var vm = this;
            axios.get('/company/search_order?search='+this.order_search_no).then((response) => {
            vm.search_order = response.data;
            // vm.reciept = vm.order.details.reciept;
            console.log(vm.search_order.exact_details)
             $("#exact_view_order").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });
         },
         g_r_n : function(id){
            $("#exact_view_order").modal('toggle');
            this.view_order(id);
         },
         /*
        view order
        **/
        view_order: function(id){
            // alert(id)
            var vm = this;
            axios.get('/customer/order/'+id+'?json=true').then((response) => {
            vm.order = response.data;
            // vm.reciept = vm.order.details.reciept;
            console.log(vm.order.details)
             $("#view_order").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });
        },
        check_balance(balance,val){
            this.disable_flag = false;
            if(balance < val){
                alert('the quantity is exeeded');
                this.disable_flag = true;
            }
        },
        add_qc : function(id){
            // alert(id);  
            var vm = this;
            vm.item_detail_id = id;
            // vm.qc_array = qc;
            // $("#add_qc").modal('toggle');
            axios.get('/customer/qc?item_id='+vm.item_detail_id).then((response) => {
            vm.qc_array = response.data;
            console.log(vm.qc_array);
            $("#add_qc").modal('toggle');

            }, (error) => {
            // vm.errors = error.errors;
            });
        },
        add_qc_to_object : function(){
            var vm = this;

            vm.order.details.map(function(e){
                if(e.id === vm.item_detail_id){
                    e.qc_details = vm.qc_array;
                }
            });
             vm.qc_array = [];
             vm.item_detail_id = '';
             console.log(vm.order);
            $("#add_qc").modal('toggle');
        },
        send_order : function(){
            var vm = this;

            if(!vm.order.dc_no){
                alert('please enter dc number');
                return;
            }
            if(!vm.order.dc_date){
                alert('please enter dc date');
                return;
            }
            axios.post('/customer/OrderReceiptDetails',vm.order)
            .then(response => {
                vm.order = {};
                $("#view_order").modal('toggle');
               
                location.reload();
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
            
        },

        /** download pdf */
        downloadPdf: function(id) {
            
            axios({
                url: "/company/order/pdf",
                method: "POST",
                responseType: "blob",
                data: {
                order_id: id,
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
     }
    });
</script>
@endsection