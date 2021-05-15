@extends('layouts.colorpro.customer.app')
@section('style')

<style type="text/css">
  .fade:not(.show) {
      opacity: 5;
  }
  .modal-body {
      padding-bottom: 0 !important;
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
</style>
@endsection
@section('content')
<div class="content content-fixed">
    <div class="container pd-20">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><a href="#" >Supplier</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
              </nav>
        </div>
        
      </div>

      

      <div class="row">
        <div class="col-2"></div>
        <div class="col-7">
            <div class="row no-gutters mg-t-10">
                <div class="col-3 col-sm-5 col-md-6 col-lg-5 bg-primary rounded-left">
                  <div class="wd-150p ht-100p">
                  <img src="{{asset('images/ERP_logo.png')}}" class="wd-100p  img-object-top rounded-left" alt="">
                  </div>
                </div><!-- col -->
                <div class="col-9 col-sm-7 col-md-6 col-lg-7 bg-white rounded-right">
                  <div class="ht-100p d-flex flex-column justify-content-center pd-20 pd-sm-30 pd-md-40">
                    <span class="tx-color-04"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2 wd-40 ht-40 stroke-wd-3 mg-b-20"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg></span>
                    <h3 class="tx-16 tx-sm-20 tx-md-24 mg-b-15 mg-md-b-20">Supplier Profile</h3>
                    <h5 class="tx-16 tx-sm-17 tx-md-17 mg-b-10 mg-md-b-10">{{$company->customer->name}}</h5>
                    <p class="tx-12 tx-md-13 tx-color-03 mg-b-25">{{$company->customer->email}}</p>
                  <p class="tx-14 tx-md-16 tx-color-02">{{$company->customer->address_line1}}</p>
                    <p class="tx-12 tx-md-13 tx-color-03 mg-b-25">{{$company->customer->address_line2}}</p>
                    <p class="tx-12 tx-md-13 tx-color-03 mg-b-25">{{$company->customer->address_line3}}</p>
                    @if($company->customer->website)
                      <p><a href="{{$company->customer->website}}" target="_blank" >Website</a></p>
                    @endif
                    <!-- <a href="#" class="btn btn-primary btn-block btn-uppercase" @click="get_company_profile({{$company->customer->id}})">Edit</a> -->
                  </div>
                </div><!-- col -->
              </div>
        </div>
      </div>
    </div><!-- container -->
  </div><!-- content -->
  
  <!-- company edit -->
  <div class="modal fade " id="company_edit" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content card">
            <div class="card-header ">
                    <div class="row">
                        <div class="col-8">
                                <div class="pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                                    <div>
                                        <h4 class=" tx-teal mg-b-10">#Profile</h4> 
                                    </div> 
                                </div>
                        </div>
                        <div class="col-4">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    

            </div>
            <div class="modal-body">
                    <div class="default-tab" >
                            <ul class="nav nav-line" id="myTab5" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab5" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Basic Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Address</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#nav-media" role="tab" aria-controls="nav-profile" aria-selected="false">Media</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" id="profile-terms" data-toggle="tab" href="#nav-terms" role="tab" aria-controls="nav-profile" aria-selected="false">Terms&conditions</a>
                              </li>
                                
                            </ul>
                            <div class="tab-content  pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">
                    
                                        <div class="col-xs-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class=" form-control-label">Company name</label>
                                                        <div class="input-group">
                                                            <input class="form-control" name="item" v-model="profile.name" >
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class=" form-control-label">short_name</label>
                                                        <div class="input-group">
                                                            <input class="form-control" name="quantity"
                                                            v-model="profile.short_name" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class=" form-control-label">autherized_person</label>
                                                        <div class="input-group">
                                                          <input class="form-control" name="quantity"
                                                          v-model="profile.autherized_person" >
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class=" form-control-label">autherized_person_phone</label>
                                                        <div class="input-group">
                                                          <input class="form-control" name="quantity"
                                                          v-model="profile.autherized_person_phone" >
                                                      </div>
                                                    </div>
                                                  </div>
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-6">
                                                  <div class="form-group">
                                                      <label class=" form-control-label">cash_cr_bank</label>
                                                      <div class="input-group">
                                                        <input class="form-control" name="quantity"
                                                        v-model="profile.cash_cr_bank" >
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class=" form-control-label">cash_cr_bank_ifsc</label>
                                                        <div class="input-group">
                                                          <input class="form-control" name="quantity"
                                                          v-model="profile.cash_cr_bank_ifsc" >
                                                      </div>
                                                    </div>
                                                </div>
                                               
                                            </div>

                                            <div class="row">
                                              <div class="col-6">
                                                <div class="form-group">
                                                    <label class=" form-control-label">cash_cr_acc_no</label>
                                                    <div class="input-group">
                                                      <input class="form-control" name="quantity"
                                                      v-model="profile.cash_cr_acc_no" >
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-group">
                                                    <label class=" form-control-label">pan_gir_no</label>
                                                    <div class="input-group">
                                                      <input class="form-control" name="quantity"
                                                      v-model="profile.pan_gir_no" >
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-6">
                                                <div class="form-group">
                                                    <label class=" form-control-label">gst_no</label>
                                                    <div class="input-group">
                                                      <input class="form-control" name="quantity"
                                                      v-model="profile.gst_no" >
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-group">
                                                    <label class=" form-control-label">gst_date</label>
                                                    <div class="input-group">
                                                      <input type="date" class="form-control" name="quantity"
                                                      v-model="profile.gst_date" >
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                                    
                                        </div>
                    
                                    </div><!-- /div row -->
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">
                        
                                        <div class="col-xs-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-6" >
                                                    <div class="form-group">
                                                        <label class=" form-control-label">Addres 1</label>
                                                        <div class="input-group">
                                                            <input class="form-control" name="location" v-model="profile.address_line1" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class=" form-control-label">Address 2</label>
                                                        <div class="input-group">
                                                            <input class="form-control" name="hsn" v-model="profile.hsn_code" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class=" form-control-label">place</label>
                                                        <div class="input-group">
                                                            <input class="form-control" name="hsn" v-model="profile.place" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class=" form-control-label">Post code</label>
                                                        <div class="input-group">
                                                            <input class="form-control" name="hsn" v-model="profile.post_code" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                        <div class="form-group">
                                                              <label class=" form-control-label">District</label>
                                                                <div class="input-group">
                                                                  <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" name="unit" v-model="profile.district_id" >
                                                                  <option  v-for="district in districts" :value="district.id">@{{district.lookup_value}}</option>
                                                                      
                                                                  </select>
                                                            </div>
                                                      </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class=" form-control-label">State </label>
                                                          <div class="input-group">
                                                              <select data-placeholder="Select unit" class="form-control" tabindex="1" name="unit" v-model="profile.state_id" >
                                                              <option  v-for="state in states" :value="state.id">@{{state.lookup_value}}</option>
                                                                  
                                                              </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class=" form-control-label"> Country</label>
                                                        <div class="input-group">
                                                            <select data-placeholder="Select unit" class=" form-control" tabindex="1" name="unit" v-model="profile.country_id" >
                                                              <option  v-for="country in countries" :value="country.id">@{{country.lookup_value}}</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    
                                    </div><!-- /div row -->
                                </div>
                                <div class="tab-pane fade" id="nav-media" role="tabpanel" aria-labelledby="nav-media-tab">
                                  <div class="row">
                      
                                      <div class="col-xs-12 col-sm-12">
                                          <div class="row">
                                              <div class="col-6" >
                                                  <div class="form-group">
                                                      <label class=" form-control-label">Phone Number</label>
                                                      <div class="input-group">
                                                          <input class="form-control" name="location" v-model="profile.phone_number" >
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-6">
                                                  <div class="form-group">
                                                      <label class=" form-control-label"> Mobile Number</label>
                                                      <div class="input-group">
                                                          <input class="form-control" name="hsn" v-model="profile.mobile_number" >
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          
                                          <div class="row">
                                              <div class="col-6">
                                                  <div class="form-group">
                                                      <label class=" form-control-label">Company Email</label>
                                                      <div class="input-group">
                                                          <input class="form-control" name="hsn" v-model="profile.email" >
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-6">
                                                  <div class="form-group">
                                                      <label class=" form-control-label">Website</label>
                                                      <div class="input-group">
                                                          <input class="form-control" name="hsn" v-model="profile.website" >
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          
                                      </div>
                  
                                  </div><!-- /div row -->
                              </div>
                              <div class="tab-pane fade" id="nav-terms" role="tabpanel" aria-labelledby="nav-media-tab">
                                  <div class="row">
                      
                                      <div class="col-xs-12 col-sm-12">
                                          <div class="row">
                                              <div class="col-12" >
                                                  <div class="form-group">
                                                      <label class=" form-control-label">terms & conditions</label>
                                                      <div class="input-group">
                                                          <textarea id="w3mission" rows="4" class="form-control" v-model="profile.terms_n_condition">
                                                              
                                                          </textarea>
                                                      </div>
                                                  </div>
                                              </div>
                                              
                                          </div>
                                          
                                      </div>
                  
                                  </div><!-- /div row -->
                              </div>
                            </div>

                        </div><!-- /tab default -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary" @click="update_profile()">Update Changes</button>
            </div>
        </div>
    </div>
</div>
  
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
      profile : {},
      countries : [],
      districts : [],
      states    : [],
    },
    methods: {

      get_company_profile:function(id){

            var vm = this;
            axios.get('/admin/customers/'+id).then((response) => {
            vm.profile = response.data;
            console.log(vm.profile);
             $("#company_edit").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });
           
        },

      /**
       * [get_candidates availability]
       * @return {[type]} [description]
       */
       update_profile: function() {
        var vm = this;
        axios.put('/admin/customers/'+vm.profile.id,vm.profile).then((response) => {
          $("#company_edit").modal('toggle');
          alert('profile updated successfully..!');
          location.reload();
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

        $('.collapse').collapse();
        $('.dropdown-toggle').dropdown();
        // this.getWeekStartAndEnd();
        // this.get_candidate_availability();
        
      }






  });
</script>
@endsection