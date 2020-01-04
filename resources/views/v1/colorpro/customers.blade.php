@extends('layouts.colorpro.app')
@section('content')
<div class="content content-fixed">
    <div class="container pd-20">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#" @click="get_roles()">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Website Analytics</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
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

  <div class="modal fade" id="positionSelect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">

      <div class="modal-content tx-14">

          {{-- <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel4">Select postions</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}

          <div class="modal-body">
              <h6 class="modal-title" id="exampleModalLabel4">Select postions</h6>
              <div class="row">
                 <!--  <div class="col-12" style="border-right: 1px solid #e6e2e2;">
                      <v-select label="name" :options="jobs" :multiple="true" v-model="selected_jobs"></v-select>
                  </div> -->

              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-outline-warning tx-13"
                  @click.prevent="remove_postions()">Remove</button>
              <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="add_postions()">Add</button>
          </div>
      </div>
  </div>
</div>
@endsection
@section('script')
<script>
    var app = new Vue({
       el: '#app',
       data: {
           showMenu: false,
           roles:[
             {role:'Admin',url:'#'},
             {role:'Candidate',url:'#'},
             {role:'User',url:'#'},
           ]
       },
   methods: {
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         get_roles: function(){
                     $("#positionSelect").modal('toggle');
           
         }
     
     },
     mounted(){
       alert('ssss')
     }
    });
</script>
@endsection