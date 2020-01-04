@extends('layouts.admin.app')
@section('style')


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
         
          <div class="col-lg-4 col-md-6 mg-t-10">
            <div class="card">
              <div class="card-body pd-y-20 pd-x-25">
                <div class="row row-sm">
                  <div class="col-7">
                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">3,605</h3>
                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-primary mg-b-5">Click Through</h6>
                    <p class="tx-11 tx-color-03 mg-b-0">No. of clicks to ad that consist of a single impression.</p>
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
          <div class="col-lg-4 col-md-6 mg-t-10">
            <div class="card">
              <div class="card-body pd-y-20 pd-x-25">
                <div class="row row-sm">
                  <div class="col-7">
                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">3,266</h3>
                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-teal mg-b-5">View Through</h6>
                    <p class="tx-11 tx-color-03 mg-b-0">Estimated daily unique views per visitor on the ads.</p>
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
          <div class="col-lg-4 col-md-6 mg-t-10">
            <div class="card">
              <div class="card-body pd-y-20 pd-x-25">
                <div class="row row-sm">
                  <div class="col-7">
                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">8,765</h3>
                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-pink mg-b-5">Total Conversions</h6>
                    <p class="tx-11 tx-color-03 mg-b-0">Estimated total conversions on ads per impressions to ads.</p>
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
                <h6 class="lh-5 mg-b-0">Total Orders</h6>
                <a href="#" class="tx-13 link-03">Mar 01 - Mar 20, 2019 <i class="icon ion-ios-arrow-down"></i></a>
              </div><!-- card-header -->
              <div class="card-body pd-y-15 pd-x-10">
                <div class="table-responsive">
                  <table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0">
                    <thead>
                      <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                        <th class="wd-5p">Link</th>
                        <th>Page Title</th>
                        <th class="text-right">Percentage (%)</th>
                        <th class="text-right">Value</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="align-middle text-center"><a href="#"><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                        <td class="align-middle tx-medium">Homepage</td>
                        <td class="align-middle text-right">
                          <div class="wd-150 d-inline-block">
                            <div class="progress ht-4 mg-b-0">
                              <div class="progress-bar bg-teal wd-65p" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-right"><span class="tx-medium">65.35%</span></td>
                      </tr>
                      <tr>
                        <td class="align-middle text-center"><a href="#"><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                        <td class="align-middle tx-medium">Our Services</td>
                        <td class="align-middle text-right">
                          <div class="wd-150 d-inline-block">
                            <div class="progress ht-4 mg-b-0">
                              <div class="progress-bar bg-primary wd-85p" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="text-right"><span class="tx-medium">84.97%</span></td>
                      </tr>
                      <tr>
                        <td class="align-middle text-center"><a href="#"><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                        <td class="align-middle tx-medium">List of Products</td>
                        <td class="align-middle text-right">
                          <div class="wd-150 d-inline-block">
                            <div class="progress ht-4 mg-b-0">
                              <div class="progress-bar bg-warning wd-45p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="text-right"><span class="tx-medium">38.66%</span></td>
                      </tr>
                      <tr>
                        <td class="align-middle text-center"><a href="#"><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                        <td class="align-middle tx-medium">Contact Us</td>
                        <td class="align-middle text-right">
                          <div class="wd-150 d-inline-block">
                            <div class="progress ht-4 mg-b-0">
                              <div class="progress-bar bg-pink wd-15p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="text-right"><span class="tx-medium">16.11%</span></td>
                      </tr>
                      <tr>
                        <td class="align-middle text-center"><a href="#"><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                        <td class="align-middle tx-medium">Product 50% Sale</td>
                        <td class="align-middle text-right">
                          <div class="wd-150 d-inline-block">
                            <div class="progress ht-4 mg-b-0">
                              <div class="progress-bar bg-teal wd-60p" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="text-right"><span class="tx-medium">59.34%</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-lg-6 mg-t-10">
            <div class="card">
              <div class="card-header d-sm-flex align-items-start justify-content-between">
                <h6 class="lh-5 mg-b-0">User Consumption</h6>
                <a href="#" class="tx-13 link-03">Mar 01 - Mar 20, 2019 <i class="icon ion-ios-arrow-down"></i></a>
              </div><!-- card-header -->
              <div class="card-body pd-y-15 pd-x-10">
                <div class="table-responsive">
                  <table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0">
                    <thead>
                      <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                        <th class="wd-5p">&nbsp;</th>
                        <th>Browser</th>
                        <th class="text-right">Sessions</th>
                        <th class="text-right">Bounce Rate</th>
                        <th class="text-right">Conversion Rate</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><i class="fab fa-chrome tx-primary op-6"></i></td>
                        <td class="tx-medium">Google Chrome</td>
                        <td class="text-right">13,410</td>
                        <td class="text-right">40.95%</td>
                        <td class="text-right">19.45%</td>
                      </tr>
                      <tr>
                        <td><i class="fab fa-firefox tx-orange"></i></td>
                        <td class="tx-medium">Mozilla Firefox</td>
                        <td class="text-right">1,710</td>
                        <td class="text-right">47.58%</td>
                        <td class="text-right">19.99%</td>
                      </tr>
                      <tr>
                        <td><i class="fab fa-safari tx-primary"></i></td>
                        <td class="tx-medium">Apple Safari</td>
                        <td class="text-right">1,340</td>
                        <td class="text-right">56.50%</td>
                        <td class="text-right">11.00%</td>
                      </tr>
                      <tr>
                        <td><i class="fab fa-edge tx-primary"></i></td>
                        <td class="tx-medium">Microsoft Edge</td>
                        <td class="text-right">713</td>
                        <td class="text-right">59.62%</td>
                        <td class="text-right">4.69%</td>
                      </tr>
                      <tr>
                        <td><i class="fab fa-opera tx-danger"></i></td>
                        <td class="tx-medium">Opera</td>
                        <td class="text-right">380</td>
                        <td class="text-right">52.50%</td>
                        <td class="text-right">8.75%</td>
                      </tr>
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