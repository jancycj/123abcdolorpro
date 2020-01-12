@extends('layouts.colorpro.customer.app')
@section('style')

<style type="text/css">
  .fade:not(.show) {
      opacity: 5;
  }
  .order-ft {
        border: 1px solid #dcd7d7;
        padding: 5px;
        margin: 5px;
    }
    .order-cap{
        justify-content: center;
        text-align: center;
        background: #f7f7fd !important;
        padding: 10px !important;
        border-radius: 10px !important ;
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
                        
                        <div class="card-body">
                            <div class="custom-tab">

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">New Orders</a>
                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Recieved</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Inspection</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                        <table id="table_1" class="table table-striped table-bordered" style="margin-top:10px;">
                                            <thead>
                                                <tr>
                                                    <th>Order_No</th>
                                                    <th>Quotation ref no</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
        
                                                @foreach ($orders as $item)
                                                <tr>
                                                    <td>{{$item->order_number}}</td>
                                                    <td>{{$item->quote_ref_no}}</td>
                                                    <td>{{$item->grant_total}}</td>
                                                    <td>{{date('d-m-Y', strtotime($item->order_date))}}</td>
                                                    <td>
                                                        <a href="#" @click="view_order({{$item->id}})">
                                                            <i class="fa fa-eye text-primary"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                            <table id="table_1" class="table table-striped table-bordered" style="margin-top:10px;">
                                                <thead>
                                                    <tr>
                                                        <th>Order_No</th>
                                                        <th>Quotation ref no</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
            
                                                    @foreach ($orders as $item)
                                                    <tr>
                                                        <td>{{$item->order_number}}</td>
                                                        <td>{{$item->quote_ref_no}}</td>
                                                        <td>{{$item->grant_total}}</td>
                                                        <td>{{date('d-m-Y', strtotime($item->order_date))}}</td>
                                                        <td>
                                                            <a href="#">
                                                                <i class="fa fa-eye text-primary"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                            <table id="table_1" class="table table-striped table-bordered" style="margin-top:10px;">
                                                <thead>
                                                    <tr>
                                                        <th>Order_No</th>
                                                        <th>Quotation ref no</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
            
                                                    @foreach ($orders as $item)
                                                    <tr>
                                                        <td>{{$item->order_number}}</td>
                                                        <td>{{$item->quote_ref_no}}</td>
                                                        <td>{{$item->grant_total}}</td>
                                                        <td>{{date('d-m-Y', strtotime($item->order_date))}}</td>
                                                        
                                                        <td>
                                                            <a href="#">
                                                                <i class="fa fa-eye text-primary"></i>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- card -->
        </div><!-- col -->
        
      </div><!-- row -->

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
                                        <h3 class=" tx-teal mg-b-10">#@{{order.order_number}}</h3> 
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
                            <div class="col-2 offset-8" >
                                <div class="form-group">
                                    <label for="inputAddress">Currency:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="INR" disabled>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-2 ">
                                <div class="form-group">
                                    <label for="inputAddress">PO type</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" v-model="order.order_type" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="inputAddress">Quotation No:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Quotation no" v-model="order.quote_ref_no" >
                                </div>   
                            </div>
                            {{-- <div class="col-2 offset-6">
                                <div class="form-group">
                                    <label for="inputAddress">Quotation No:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ORD1234" >
                                </div> 
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="inputAddress">Ship To:</label>
                                    <select class="custom-select form-control" v-model="order.shipto_customer_id">
                                        <option value="" disabled="" selected="">select supplier</option>
                                    <option v-for="cst in customers" :value="cst.id">@{{cst.name}}</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="inputAddress">Bill To:</label>
                                    <select class="custom-select form-control" v-model="order.billto_customer_id">
                                        <option value="" disabled="" selected="">select supplier</option>
                                        <option v-for="cst in customers" :value="cst.id">@{{cst.name}}</option>
                                                
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body card-block">
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
                                            <th class="">Completed</th>
                                            <th class="">QC entry</th>
                                            <th class="">remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr v-for="ord in order.details">
                                            <td class="tx-medium ">@{{ord.item}}</td>
                                            <td class="tx-medium ">
                                                <span v-if="ord.schedules.length > 0"> <small class="tx-teal"> Scheduled</small></span> <span v-if="ord.schedules.length <= 0">@{{ord.delivery_date}}</span>
                                            </td>
                                            <td class="tx-medium ">@{{ord.quantity}}</td>
                                            <td class="tx-medium ">@{{ord.purchase_unit_id}}</td>
                                            <td class="tx-medium "> 
                                                
                                                <span v-if="ord.schedule"> <a href="#" ><i class="fa fa-calendar"></i></a></span> <span v-if="!ord.schedule">--</span>
                                            </td>
                                            <td class="tx-medium tx-primary">@{{ord.rate}}</td>
                                            <td class=" tx-teal">- @{{ord.rate}}%</td>
                                            <td class=" tx-pink">@{{ord.rate}}</td>
                                            <td class="tx-medium ">@{{ord.rate}}  </td>
                                            
                                            
                                            <td>
                                                <input class="form-control" name="quantity"  v-model="ord.recieved">
                                            </td> 
                                            <td class="tx-medium "> 
                                                <span > <a href="#" class="btn btn-sm btn-success" @click="add_qc(ord.item_id)">QC </a></span> 
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
                    <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Send Order</button>
                </div>
            </div>
        </div>
        </div><!-- modal end -->

        
    </div><!-- container -->
  </div><!-- content -->
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
 <script type="text/javascript">
  var app = new Vue({
    el: '#app',
    data: {
      items:[],
      item:{},
      order : {},
      customers : [],
      company_id : {{$company_id}},
      qc_array: [],
    },
    methods: {

        

     /**
      * [getWeekStartAndEnd description]
      * @param  {String} dates   [description]
      * @param  {String} dateStr [description]
      * @return {[type]}         [description]
      */
      
        has_permission:function(url){
          return this.permissions.includes(url);
        },

        /*
        view order
        **/
        view_order: function(id){
            // alert(id)
            var vm = this;
            axios.get('/customer/order/'+id+'?json=true').then((response) => {
            vm.order = response.data;
            console.log(vm.order.details)
             $("#view_order").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });
        },

        /*
        get customers
        **/

        get_customers:function(){

            var vm = this;
            axios.get('/customer/customers').then((response) => {
            vm.customers = response.data;
            console.log(vm.customers);

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        add_qc : function(id){
            // alert(id);  
            var vm = this;
            axios.get('/customer/qc?item_id='+id).then((response) => {
            vm.qc_array = response.data;
            console.log(vm.qc_array);
            $("#add_qc").modal('toggle');

            }, (error) => {
            // vm.errors = error.errors;
            });
        },
        add_qc_to_object : function(){

        }


      },
      computed: {
      },
      mounted() {

        $('#neww').DataTable();
        $('.collapse').collapse();
        $('.dropdown-toggle').dropdown();
        this.get_customers();
        // this.get_candidate_availability();
        
      }






  });
</script>
@endsection