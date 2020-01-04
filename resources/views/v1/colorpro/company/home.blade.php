@extends('layouts.colorpro.app')
@section('style')

<style type="text/css">
  .fade:not(.show) {
      opacity: 5;
  }
</style>
@endsection
@section('content')
<div class="content content-fixed">
    <div class="container pd-20">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#" >Company</a></li>
              <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Company Dashboard</h4>
        </div>
        <div class="d-none d-md-block">
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="save" class="wd-10 mg-r-5"></i> Save</button>
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="upload" class="wd-10 mg-r-5"></i> Export</button>
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="share-2" class="wd-10 mg-r-5"></i> Share</button>
          <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="sliders" class="wd-10 mg-r-5"></i> Settings</button>
        </div>
      </div>

      <div class="row row-xs">
         
          <div class="col-lg-3 col-md-6 mg-t-10">
            <div class="card">
              <div class="card-body pd-y-20 pd-x-25">
                <div class="row row-sm">
                  <div class="col-7">
                  <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">{{count($stock)}}</h3>
                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-primary mg-b-5">Items</h6>
                    <p class="tx-11 tx-color-03 mg-b-0">Total item stocked</p>
                  </div>
                  <div class="col-5">
                    <div class="chart-ten">
                      <div id="flotChart3" class="flot-chart"></div>
                    </div>
                  </div>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-lg-3 col-md-6 mg-t-10">
            <div class="card">
              <div class="card-body pd-y-20 pd-x-25">
                <div class="row row-sm">
                  <div class="col-7">
                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">0</h3>
                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-teal mg-b-5">Orders </h6>
                    <p class="tx-11 tx-color-03 mg-b-0">Total orders recieved</p>
                  </div>
                  <div class="col-5">
                    <div class="chart-ten">
                      <div id="flotChart4" class="flot-chart"></div>
                    </div>
                  </div>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-lg-3 col-md-6 mg-t-10">
            <div class="card">
              <div class="card-body pd-y-20 pd-x-25">
                <div class="row row-sm">
                  <div class="col-7">
                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">0</h3>
                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-pink mg-b-5"> Transactions</h6>
                    <p class="tx-11 tx-color-03 mg-b-0">Total transactions made</p>
                  </div>
                  <div class="col-5">
                    <div class="chart-ten">
                      <div id="flotChart5" class="flot-chart"></div>
                    </div>
                  </div>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-lg-3 col-md-6 mg-t-10">
              <div class="card">
                <div class="card-body pd-y-20 pd-x-25">
                  <div class="row row-sm">
                    <div class="col-7">
                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">{{count($customers)}}</h3>
                      <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-pink mg-b-5"> Customers</h6>
                      <p class="tx-11 tx-color-03 mg-b-0">Total Customers</p>
                    </div>
                    <div class="col-5">
                      <div class="chart-ten">
                        <div id="flotChart5" class="flot-chart"></div>
                      </div>
                    </div>
                  </div>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
          
          <div class="col-lg-6 mg-t-10">
            <div class="card">
              <div class="card-header d-flex align-items-start justify-content-between">
                <h6 class="lh-5 mg-b-0">Total Items </h6>
              <a href="#" class="tx-13 link-03">@{{new Date()}}<i class="icon ion-ios-arrow-down"></i></a>
              </div><!-- card-header -->
              <div class="card-body pd-y-15 pd-x-10">
                <div class="table-responsive">
                  <table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0">
                    <thead>
                      <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                        <th>Items</th>
                        <th class="text-right">Location</th>
                        <th class="text-right">Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($items as $item)
                      <tr>
                      <td class="align-middle tx-medium">{{$item->item}}</td>
                      <td class="align-middle text-right">
                          <span class="text-right tx-pink">{{$item->location}}</span>
                      </td>
                      <td class="align-middle text-right">
                          <span class="text-right {{$item->quantity > 5 ?'tx-teal':'tx-pink'}}">{{$item->quantity}}</span>
                      </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-lg-6 mg-t-10">
            <div class="card">
              <div class="card-header d-sm-flex align-items-start justify-content-between">
                <h6 class="lh-5 mg-b-0">Customer list</h6>
                <a href="#" class="tx-13 link-03">Mar 01 - Mar 20, 2019 <i class="icon ion-ios-arrow-down"></i></a>
              </div><!-- card-header -->
              <div class="card-body pd-y-15 pd-x-10">
                <div class="table-responsive">
                  <table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0">
                    <thead>
                      <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                        <th class="text-right">ID</th>
                        <th class="text-right">Name</th>
                        <th class="text-right">Customer code</th>
                        <th class="text-right">Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($customers as $item)
                      <tr>
                        <td class="text-right">#</td>
                        <td class="text-right">{{$item->name}}</td>
                        <td class="text-right">{{$item->customer_code}}</td>
                        <td class="text-right">{{$item->email}}</td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div><!-- table-responsive -->
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
        </div><!-- row -->

      
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
          $('#bootstrap-data-table').DataTable();
      } );
  </script>
 <script type="text/javascript">
  var app = new Vue({
    el: '#app',
    data: {
      items:[],
      item:{},
    },
    methods: {

        get_item_by:function(id){

            var vm = this;
            axios.get('/company/stocks/'+id).then((response) => {
            vm.item = response.data;
            console.log(vm.items);
             $("#itemModal").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });
           
        },

      /**
       * [get_candidates availability]
       * @return {[type]} [description]
       */
       get_items: function() {
        var vm = this;
        axios.get('/company/stocks'+'?json=true').then((response) => {
          vm.items = response.data;
          console.log(vm.items);
        }, (error) => {
          // vm.errors = error.errors;
        }); 

      },

     /**
      * [getWeekStartAndEnd description]
      * @param  {String} dates   [description]
      * @param  {String} dateStr [description]
      * @return {[type]}         [description]
      */
      
        has_permission:function(url){
          return this.permissions.includes(url);
        }
      },
      computed: {
      },
      mounted() {

        this.get_items();
        $('#neww').DataTable();
        $('.collapse').collapse();
        $('.dropdown-toggle').dropdown();
        // this.getWeekStartAndEnd();
        // this.get_candidate_availability();
        
      }






  });
</script>
@endsection