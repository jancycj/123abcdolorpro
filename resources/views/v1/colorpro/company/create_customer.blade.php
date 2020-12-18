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
    </style>
@endsection
@section('content')
<div class="content content-fixed">
    <div class="container pd-20">
      <div class="import-sec-white mg-b-5">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <div>
                    <div >
                        <h5 class="hd">#Customer Master</h5> 
                    </div> 
                </div>
                
            </div>
        </div>
      <div class="row row-xs">
        <div class="col-lg-12 col-md-12 ">
            <div class="card mg-b-2">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getCustomerPopup($event)" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">name*</label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control"  v-model="client.name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">short_name* </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control"  v-model="client.short_name">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">email</label>
                                <div class="col-7 input-group">
                                    <input type="email"  class="form-control" type="number"  v-model="client.email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">password</label>
                                <div class="col-7 input-group">
                                    <input type="password" autocomplete = 'new-password' class="form-control"  v-model="client.password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">address1</label>
                                <div class="col-7 input-group">
                                    <textarea autocomplete="off" class="form-control" type="number"  v-model="client.address1"> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">address2</label>
                                <div class="col-7 input-group">
                                    <textarea autocomplete="off" class="form-control"  v-model="client.address2"> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">phone</label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" type="number"  v-model="client.phone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">company_email</label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control"  v-model="client.company_email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">autherized_person</label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" type="number"  v-model="client.autherized_person">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Country</label>
                                <div class="col-7 input-group" @keydown="getContryPopup($event)">
                                    <input  class="form-control"  v-model="country">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12">
                            <div class="form-group row">
                                <div class="col-12 input-group">
                                    <input autocomplete="off" class="form-control" name="unit" v-model="country_name" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Type</label>
                                <div class="col-7 input-group">
                                     <select data-placeholder="Choose a company..." class="standardSelect form-control" tabindex="1" name="type">
                                          <option value="1">Vendor</option>
                                          <option value="2">Suplier</option>
                                      </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">State</label>
                                <div class="col-7 input-group" @keydown="getSatePopup($event)">
                                    <input  class="form-control"  v-model="state">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12">
                            <div class="form-group row">
                                <div class="col-12 input-group">
                                    <input autocomplete="off" class="form-control"  v-model="state_name" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">autherized_person_phone</label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control"  v-model="client.autherized_person_phone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">District</label>
                                <div class="col-7 input-group" @keydown="getDistrictPopup($event)">
                                    <input  class="form-control"  v-model="district">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12">
                            <div class="form-group row">
                                <div class="col-12 input-group">
                                    <input autocomplete="off" class="form-control"  v-model="district_name" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div><!-- card-header -->
                
                <div class="card-footer ">
                    <div class="row order-ft">
                        <div class="col-md-2 col-lg-2 col-sm-6 offset-8 mg-t-5" v-if="print_flag">
                                <button class="btn btn-outline-danger btn-block " @click="downloadPdf()">Print PO</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-md-6 mg-t-5" v-if="!print_flag && !update_flag">
                                <button class="btn btn-primary btn-block " @click="save_customer()">Save</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-6 mg-t-5" v-if="!print_flag && update_flag">
                                <button class="btn btn-primary btn-block " >Update</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5" >
                                <button class="btn btn-warning btn-block " @click="clear_customer()">Delete</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5" >
                                <button class="btn btn-secondary btn-block " @click="clear_customer()">Cancel</button>
                        </div>
                    </div>
                    
                </div>

            </div><!-- card-->
        </div><!-- col -->
        
      </div><!-- row row-xs -->

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
<div class="modal fade" id="contryPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">
                    
                <div class="card-body card-block">
                    <choose-component 
                        :table="'lookup_masters'" 
                        :fields="['id','lookup_value','lookup_description']" 
                        :search_filed="'lookup_value'" 
                        :where_field="'lookup_key'"
                        :where_value="'COUNTRY'"
                        @selected="getContry($event)"
                        :id="'countries'"
                        ></choose-component>
                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
            </div>
        </div>
    </div>
</div><!-- choose count 1modal end -->
<div class="modal fade" id="statePopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">
                    
                <div class="card-body card-block">
                    <choose-component 
                        :table="'lookup_masters'" 
                        :fields="['id','lookup_value','lookup_description']" 
                        :search_filed="'lookup_value'" 
                        :where_field="'lookup_key'"
                        :where_value="'STATES'"
                        @selected="getState($event)"
                        :id="'states'"
                        ></choose-component>
                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
            </div>
        </div>
    </div>
</div><!-- choose count 1modal end -->
<div class="modal fade" id="districtPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">
                    
                <div class="card-body card-block">
                    <choose-component 
                        :id="'districts'"
                        :table="'lookup_masters'" 
                        :fields="['id','lookup_value','lookup_description']" 
                        :search_filed="'lookup_value'" 
                        :where_field="'lookup_key'"
                        :where_value="'DISTRICTS'"
                        @selected="getDistrict($event)"
                        ></choose-component>
                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
            </div>
        </div>
    </div>
</div><!-- choose count 1modal end -->
<div class="modal fade" id="customerPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">
                    
                <div class="card-body card-block">
                    <choose-component 
                        :id="'customer'"
                        :table="'costomers'" 
                        :fields="['id','name','short_name']" 
                        :search_filed="'short_name'" 
                        @selected="getCustomer($event)"
                        ></choose-component>
                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
            </div>
        </div>
    </div>
</div><!-- choose count 1modal end -->
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
           ],
           update_flag : false,
           print_flag : false,
           client : {},
           errors :[],
           country_name : '',
            country: '',
            state_name: '',
            state: '',
            district_name: '',
            district: '',
       },
       mounted(){
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
       },
   methods: {
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         get_roles: function(){
                     $("#positionSelect").modal('toggle');
           
         },
         getContry : function(ev){
             console.log(ev)
             this.client.country_id = ev.id;
             this.country_name = ev.lookup_description;
             this.country = ev.lookup_value;
             $("#contryPopup").modal('toggle');

         },
         getContryPopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#contryPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
        getSatePopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#statePopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
        getState : function(ev){
             console.log(ev)
             this.client.state_id = ev.id;
             this.state_name = ev.lookup_description;
             this.state = ev.lookup_value;
             $("#statePopup").modal('toggle');

         },
         getDistrictPopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#districtPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
        getDistrict : function(ev){
             console.log(ev)
             this.client.district_id = ev.id;
             this.district_name = ev.lookup_description;
             this.district = ev.lookup_value;
             $("#districtPopup").modal('toggle');

         },
         save_customer:function() {
           console.log(this.client);
            axios.post('/company/customer',this.client)
            .then(response => {
                alert('saved successfully..!')
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
         getCustomerPopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#customerPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
        getCustomer : function(event){
            var vm = this;
            vm.update_flag = true;
            axios.get('/company/get_customer/'+event.id).then((response) => {
            vm.client = response.data;
            this.country_name  =  vm.client.country_name;
            this.country =  vm.client.country;
            this.state_name =  vm.client.state_name;
            this.state =  vm.client.state;
            this.district_name =  vm.client.district_name;
            this.district =  vm.client.district;
            $("#customerPopup").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });
        },
        clear_customer(){
            this.client  =  {};
            this.country_name  =  '';
            this.country =  '';
            this.state_name =  '';
            this.state =  '';
            this.district_name =  '';
            this.district =  '';
        }
     
     },
     mounted(){
     }
    });
</script>
@endsection