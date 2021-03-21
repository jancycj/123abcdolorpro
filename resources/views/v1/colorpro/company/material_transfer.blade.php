@extends('layouts.colorpro.app')

@section('style')
    <style>
        .tab-content {
            margin-top: 15px !important;
            border: solid 1px #e0dbdb !important;
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
              <li class="breadcrumb-item"><a href="#" >Items</a></li>
              <li class="breadcrumb-item active" aria-current="page">Transactions</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Material transaction</h4>
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
                            {{-- <h4>Out Source processing</h4> --}}
                            <a href="#" class="btn btn-sm btn-outline-secondary float-right" @click="create_transfer()"><i class="fa fa-plus"></i>Make Transaction</a>
                        </div>
                        <div class="card-body">
                            <div class="custom-tab">

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Shipped</a>
                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Recieved</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Inspection</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                        <table id="table_1" class="table table-striped table-bordered" style="margin-top:10px;">
                                            <thead>
                                                <tr>
                                                    <th>Shiped To</th>
                                                    <th>Item</th>
                                                    <th>Ref</th>
                                                    <th>Unit</th>
                                                    <th>Quantity</th>
                                                    <th>date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
        
                                                @foreach ($sent as $item)
                                                <tr>
                                                    <td>{{$item->to_company}}</td>
                                                    <td>{{$item->item}}</td>
                                                    <td>{{$item->ref_no}}</td>
                                                    <td>{{$item->unit}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                        <table id="table_2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Ship From</th>
                                                    <th>Item</th>
                                                    <th>Ref</th>
                                                    <th>Unit</th>
                                                    <th>Quantity</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
        
                                                @foreach ($received as $item)
                                                <tr>
                                                    <td>{{$item->from_company}}</td>
                                                    <td>{{$item->item}}</td>
                                                    <td>{{$item->ref_no}}</td>
                                                    <td>{{$item->unit}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                        <table id="table_3" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Ship from</th>
                                                    <th>Ship to</th>
                                                    <th>Item</th>
                                                    <th>Unit</th>
                                                    <th>Quantity</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
        
                                                @foreach ($items as $item)
                                                <tr>
                                                    <td>{{$item->item}}</td>
                                                    <td>{{$item->category}}</td>
                                                    <td>{{$item->ref_no}}</td>
                                                    <td>{{$item->unit}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>{{$item->location}}</td>
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

      <div class="modal fade" id="create_transfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">

            <div class="modal-content tx-14 card">

                <!-- <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel4">Add new Item</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>  -->

                <div class="modal-body">
                    <div class="card-header">
                        <strong>Item Details</strong> 
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label class=" form-control-label">Item</label>
                            <div class="input-group">
                                <select data-placeholder="Select Item" class="standardSelect form-control" tabindex="1" name="item" v-model="transaction.item">
                                    @foreach ($items as $item)
                                <option value="{{$item->id}}">{{$item->item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Customer</label>
                            <div class="input-group">
                                <select data-placeholder="Select Company" class="standardSelect form-control" tabindex="1" name="customer" v-model="transaction.customer">
                                    <option value="" label="default"></option>
                                    @foreach ($customers as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Quantity</label>
                            <div class="input-group">
                                <input class="form-control" name="quantity" v-model="transaction.quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Unit</label>
                            <div class="input-group">
                                <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" name="unit" v-model="transaction.unit">
                                    <option value="" label="default"></option>
                                    <option value="1">Kg</option>
                                    <option value="2">No</option>
                                    <option value="3">Chees</option>
                                    <option value="4">Packet</option>
                                    <option value="5">Box</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Purpose</label>
                            <div class="input-group">
                                <textarea name="purpose" id="address2" rows="2" placeholder="Spacify the purpose" class="form-control" v-model="transaction.purpose"></textarea>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                </div>
            </div>
        </div>
        </div><!-- modal end -->
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
        $(document).ready(function() {
          $('#table_1').DataTable();
          $('#table_2').DataTable();
          $('#table_3').DataTable();
      } );
  </script>
<script>
    var app = new Vue({
       el: '#app',
       data: {
           showMenu: false,
           transaction:{},
           permissions: window.permissions,

       },
   methods: {
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         create_transfer: function(){
                     $("#create_transfer").modal('toggle');
           
         },
         save_item:function() {
           console.log(this.transaction);

            axios.post('transaction/',this.transaction)
            .then(response => {
                $("#create_transfer").modal('toggle');
                $(".modal-backdrop").remove();
                alert('successfully created!');
                location.reload();
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
         has_permission: function(url) {
            return this.permissions.includes(url);
        },
     
     },
     mounted(){
     }
    });
</script>
@endsection