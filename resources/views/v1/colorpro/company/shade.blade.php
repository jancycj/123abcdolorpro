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
@endsection
@section('content')
<div class="content content-fixed">
    <div class="container pd-20">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#" >Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Items</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Company section</h4>
        </div>
        <div class="d-none d-md-block">
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="save" class="wd-10 mg-r-5"></i> Save</button>
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="upload" class="wd-10 mg-r-5"></i> Export</button>
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="share-2" class="wd-10 mg-r-5"></i> Share</button>
          <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="sliders" class="wd-10 mg-r-5"></i> Settings</button>
        </div>
      </div>

      <div class="row row-xs">
       
        <div class="col-lg-12 col-md-12 mg-t-10">
          <div class="card">
              <div class="card-header">
                  <strong class="card-title">Item List</strong>
                  <a href="#" class="btn btn-sm btn-outline-secondary float-right" @click="create_item()"><i class="fa fa-plus"></i>create</a>
              </div>
              <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Code</th>
                              <th>Colour</th>
                              <th>Priority</th>
                              <th> Action</th>
                          </tr>
                      </thead>
                      <tbody>
                         
                          <tr v-for="shade in shades" v-bind:key="shade.id">
                              <td>@{{shade.name}}</td>
                              <td>@{{shade.code}}</td>
                              <td>@{{shade.colour}}</td>
                              <td>@{{shade.priority}}</td>
                              <td>
                                <button type="button" class="btn btn-outline-primary btn-sm"
                                @click="get_item_by(shade.id)"><i class="fa fa-pencil-square-o" ></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm"
                                @click="delete_shade(shade.id)"><i class="fa fa-trash" ></i></button>
                              
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
        </div><!-- col -->
        
      </div><!-- row -->

      <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            <div class="card-header">
                                <h4>
                                        <strong class="text-primary">Shade Details</strong> 

                                </h4>
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

                                <div class="row">
                                    <div class="col-6" 
                                    @keydown="keyEvent($event)" 
                                    
                                    >
                                        <div class="form-group">
                                            <label class=" form-control-label">Customer</label>
                                            <div class="input-group">
                                                <input class="form-control" v-model="customer_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class=" form-control-label">Shade code</label>
                                            <div class="input-group">
                                                <input class="form-control"  v-model="shade.code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class=" form-control-label">Color </label>
                                            <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1" name="unit"  v-model="shade.colour">
                                                        <option :value="colour.lookup_value" v-for="colour in colours">@{{colour.lookup_value}}</option>
                                                    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                        <div class="form-group">
                                            <label class=" form-control-label">Priority</label>
                                            <div class="input-group">
                                                <input class="form-control" name="unit" v-model="shade.priory">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class=" form-control-label">Program code </label>
                                            <div class="input-group">
                                                <input class="form-control" name="unit" v-model="shade.program_code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class=" form-control-label">Customer code </label>
                                            <div class="input-group">
                                                <input class="form-control" name="hsn" v-model="customer_code" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()" v-if="!update_flag">Create</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="update_item()" v-if="update_flag">Update</button>
                    </div>
                </div>
            </div>
        </div><!-- modal end -->

        <div class="modal fade" id="chooseCustomer" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-customer @customer="getCostomerEvent($event)" :customer="true"></choose-customer>
                                
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
       
  </script>
<script>
    var app = new Vue({
       el: '#app',
       data: {
           showMenu: false,
           shade:{},
           errors:[],
           item_ob : {},
           opening : {},
           colours : [],
           shades : [],
           selected_customer : {},
           update_flag : false,
           customer_code : '',
           customer_name : '',
       },
   methods: {
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         create_item: function(){
                     $("#addItem").modal('toggle');
           
         },
         getCostomerEvent(val){
            this.selected_customer = val;
            this.customer_code = val.short_name;
            this.customer_name = val.name;
            this.shade.customer_name = val.name;
            this.shade.customer_code =val.short_name;
            this.shade.customer_id =val.id;
            console.log(this.shade)

            $("#chooseCustomer").modal('toggle');
         },
         keyEvent : function(event){
             console.log(event)
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#chooseCustomer").modal('toggle');
            // }
        },
        selectCustomer : function(event){
            if(event.code == 'Enter' ){
                $("#chooseCustomer").modal('toggle');
            }
        },
         save_item:function() {
           console.log(this.shade);
            axios.post('/company/shade',this.shade)
            .then(response => {
                $("#addItem").modal('toggle');
                $(".modal-backdrop").remove();
                alert('successfully created!');
                location.reload();
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
         update_item:function() {
          this.update_flag = false;
           console.log(this.shade);
            axios.put('/company/shade/'+this.shade.id,this.shade)
            .then(response => {
                this.shade.customer_code = this.customer_code;
                this.shade.customer_name = this.customer_name;
                $("#addItem").modal('toggle');
                $(".modal-backdrop").remove();
                alert('successfully updated!');
                location.reload();
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
            vm.update_flag = true;
            axios.get('/company/shade/'+id).then((response) => {
                vm.shade = response.data;
                vm.shade.program_code = response.data.code;
                vm.shade.priory = response.data.priority;
                vm.shade.code = response.data.name;
                vm.customer_code = val.customer_code;
                vm.customer_name = val.customer_name;
                // vm.shade.customer_name
                // code
                // colour
                // priory
                // program_code
                // customer_code

                $("#addItem").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        /* get item
         **/
        delete_shade:function(id){

            var vm = this;
            axios.delete('/company/shade/'+id).then((response) => {
                alert('successfully deleted!');
                location.reload();
            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        /*
        get taxes
        **/
        get_unit:function(){

            var vm = this;
            axios.get('/general/lookup?json=true&&key=COLOUR').then((response) => {
            vm.colours = response.data;

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        /*
        get taxes
        **/
        get_shades:function(){

            var vm = this;
            axios.get('/company/shade?json').then((response) => {
            vm.shades = response.data;

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        /*
        update stock **/
        update_item_ob:function() {

            axios.put('/admin/items/'+this.item_ob.id,this.item_ob)
            .then(response => {
                this.item_ob = {};
                $("#itemModal").modal('toggle');
                $(".modal-backdrop").remove();
                alert('successfully updated!');
                location.reload();

            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
        },
     
     },
     mounted(){

     },
     created(){
        this.get_unit();
        this.get_shades();

     }
    });
</script>
@endsection