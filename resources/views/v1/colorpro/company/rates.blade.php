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
        <div class="import-sec-white">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#" >Company</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rates</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Company Rates</h4>
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
                  <div class="row">
                      <div class="col-3">
                            <label class=" form-control-label">Customers</label>
                            <select data-placeholder="Select Customer" class="standardSelect form-control" tabindex="1" name="unit" @change="get_rates(selected)" v-model="selected_customer">
                                @foreach ($customers as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                
                            </select>
                      </div>
                      <div class="col-3">
                            <label class=" form-control-label">Items</label>
                            <select placeholder="Select item" class="standardSelect form-control" tabindex="1" name="unit" @change="get_rates(selected)" v-model="selected_item">
                                @foreach ($items as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                
                            </select>
                      </div>
                      <div class="col-6">
                            <a href="#" class="btn btn-sm btn-outline-secondary float-right" @click="create_item()"><i class="fa fa-plus"></i>create</a>
                      </div>
                  </div>
                 
              </div>
              <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Item</th>
                              <th>Customer</th>
                              <th>Rate</th>
                              <th>Discount</th>
                              <th>Issue unit</th>
                              <th>Purchase unit</th>
                              <th>C factor</th>
                              <th>Specification</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>

                          
                          <tr v-for="item in rate_list">
                              <td>@{{item.item}}</td>
                              <td>@{{item.customer}}</td>
                              <td>@{{item.rate}}</td>
                              <td>@{{item.discount}}</td>
                              <td>@{{item.pm_unit}}</td>
                              <td>@{{item.pr_unit}}</td>
                              <td>@{{item.conversion_factor}}</td>
                              <td>@{{item.specifications}}</td>
                              <td>
                                <button type="button" class="btn btn-outline-primary btn-sm"
                                @click="get_item_by(item.id)"><i class="fa fa-pencil-square-o" ></i></button>
                                
                            </td>
                          </tr>
                          
                      </tbody>
                  </table>
              </div>
          </div>
        </div><!-- col -->
        
      </div><!-- row -->

      <div class="modal fade" id="create_master" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">

            <div class="modal-content tx-14 card">


                <div class="modal-body">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                                        <div>
                                            <h4 class=" tx-teal mg-b-10">#New Rate</h4> 
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="row" v-if="errors.length != 0">
                                <div class="col-8">
                                    <ul>
                                        <li class="text-danger" v-for="(err,val) in errors">
                                            <small>@{{err[0]}}</small>   
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="close" @click="clear_error()">
                                            <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body card-block">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">Item</label>
                                        <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1" name="unit"  v-model="item.item">
                                                @foreach ($items as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">Cutomer</label>
                                        <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1" name="unit"  v-model="item.customer">
                                                @foreach ($customers as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">rate</label>
                                        <div class="input-group">
                                            <input class="form-control" name="lookup_value" v-model="item.rate" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class=" form-control-label">Discount</label>
                                        <div class="input-group">
                                            <input class="form-control" name="value" v-model="item.discount" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class=" form-control-label">Default Rate</label>
                                        <div class="custom-control custom-checkbox ">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" v-model="item.default">
                                            <label class="custom-control-label" for="customCheck1"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">Primary Unit</label>
                                        <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1" name="unit"  v-model="item.pm_unit">
                                                @foreach ($units as $item)
                                                    <option value="{{$item->id}}">{{$item->lookup_value}}</option>
                                                @endforeach
                                                
                                        </select>
                                    </div>
                                
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">Purchase Unit</label>
                                        <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1" name="unit"  v-model="item.pr_unit">
                                                @foreach ($units as $item)
                                                    <option value="{{$item->id}}">{{$item->lookup_value}}</option>
                                                @endforeach
                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">Conversion factor</label>
                                        <div class="input-group">
                                            <input class="form-control" name="name" v-model="item.c_factor">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label"> Specification</label>
                                        <div class="input-group">
                                            <input class="form-control" name="name" v-model="item.specifications">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_rates()">Create</button>
                </div>
            </div>
        </div>
    </div><!-- modal end -->

    <div class="modal fade" id="update_master" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">

            <div class="modal-content tx-14 card">


                <div class="modal-body">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-8">
                                    <div class="pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                                        <div>
                                            <h4 class=" tx-teal mg-b-10">#Update Rate</h4> 
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
                        <div class="card-body card-block">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">Item</label>
                                        <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1"   v-model="item.item_id" disabled>
                                            <option v-for="item in company_items" :value="item.id">@{{item.item}}</option>
                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">Supplier</label>
                                        <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1" v-model="item.customer_id">
                                                
                                            <option v-for="customer in customers" :value="customer.id">@{{customer.name}}</option>
                                                
                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">rate</label>
                                        <div class="input-group">
                                            <input class="form-control" " v-model="item.rate" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class=" form-control-label">Discount</label>
                                        <div class="input-group">
                                            <input class="form-control"  v-model="item.discount" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class=" form-control-label">Default Rate</label>
                                        <div class="custom-control custom-checkbox ">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" v-model="item.default">
                                            <label class="custom-control-label" for="customCheck1"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">Primary Unit</label>
                                        <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1"   v-model="item.primary_unit" disabled>
                                            <option v-for="unit in units" :value="unit.id">@{{unit.lookup_value}}</option>
                                                
                                        </select>
                                    </div>
                                
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">Purchase Unit</label>
                                        <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1"   v-model="item.purchase_unit">
                                                
                                            <option v-for="unit in units" :value="unit.id">@{{unit.lookup_value}}</option>
                                                
                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label">Conversion factor</label>
                                        <div class="input-group">
                                            <input class="form-control" v-model="item.conversion_factor">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class=" form-control-label"> Specification</label>
                                        <div class="input-group">
                                            <input class="form-control"  v-model="item.specifications">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="update_rates()">Update</button>
                </div>
            </div>
        </div>
        </div><!-- update modal end -->
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


    {{-- <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
      } );
  </script> --}}
<script>
    var app = new Vue({
       el: '#app',
       data: {
           showMenu: false,
           item:{},
           errors:[],
           customer:1,
           selected_customer:1,
           selected_item:1,
           rate_list:[],
           customers : [],
           units :[],
           company_items : [],
       },
   methods: {
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         create_item: function(){
             this.item = {};
            $("#create_master").modal('toggle');
           
         },
         save_rates:function() {
             if(!this.item.item){
                alert('please select an item');
                return;
             }
             if(!this.item.customer){
                alert('please select a supplier');
                return;
             }
             if(this.item.c_factor){
                if(this.check_c_factor(this.item.pm_unit, this.item.pr_unit)){
                
                if(this.item.c_factor != 1){
                    alert('selected units are same Conversion factor should be 1')
                    this.item.c_factor = 1;
                    return ;

                }
                
            }
             }
             var vm = this;
             vm.item.items = vm.rates; 
            axios.post('/company/rates',this.item)
            .then(response => {
                $("#create_master").modal('toggle');
                $(".modal-backdrop").remove();
                alert(response.data);
                document.write(response.data);
                alert('successfully created!');
                location.reload();
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
         get_items:function() {
           console.log(this.item);

            axios.get('/company/rates?json=true')
            .then(response => {
                this.rate_list = response.data;
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
         /* get item
         **/
         get_item_by:function(id){

            var vm = this;
            axios.get('/company/rates/'+id).then((response) => {
                vm.item = response.data;
                $("#update_master").modal('toggle');
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
        get_unit:function(){

            var vm = this;
            axios.get('/general/lookup?json=true&&key=UNIT').then((response) => {
            vm.units = response.data;

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        /*
        get company items
        **/
        get_company_items : function(){
            var vm = this;
            axios.get('/company/get_items?json=true').then((response) => {
            vm.company_items = response.data;

            }, (error) => {
            // vm.errors = error.errors;
            });
        },

        /* update rates
        **/
        update_rates:function() {
            if(this.check_c_factor(this.item.primary_unit, this.item.purchase_unit)){
                
                if(this.item.conversion_factor != 1){
                    alert('selected units are same Conversion factor should be 1')
                    this.item.conversion_factor = 1;
                    return ;

                }
                
            }
            axios.put('/company/rates/'+this.item.id,this.item)
            .then(response => {
                $("#update_master").modal('toggle');
                $(".modal-backdrop").remove();
                alert('successfully created!');
                location.reload();
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
        },

        /* check c factor
         **/
        check_c_factor(pm , pr){
            return pm === pr;
        },
        clear_error(){
            this.errors = [];
        }
     
     },
     mounted(){
        // $('#bootstrap-data-table').DataTable();
         this.get_items();
         this.get_unit();
         this.get_customers();
         this.get_company_items();

     }
    });
</script>
@endsection