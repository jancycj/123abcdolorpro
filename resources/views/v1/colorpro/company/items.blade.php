@extends('layouts.colorpro.app')
@section('style')


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
                    <li class="breadcrumb-item active" aria-current="page">Items</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Company Items</h4>
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
                <strong class="card-title">Company Item List</strong>
                <a href="#" class="btn btn-sm btn-outline-secondary float-right" @click="create_item()"><i class="fa fa-plus"></i>create</a>
            </div>
            <div class="card-body">
                <table id="neww" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($stocks as $item)
                        <tr>
                            <td>{{$item->item}}</td>
                            <td>{{$item->unit}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->location}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm"
                                  @click="get_item_by('{{$item->id}}')"><i class="fa fa-pencil-square-o" ></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#itemModal"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!--/ card body -->
        </div><!-- /card -->
        </div><!-- col -->
        
      </div><!-- row -->


      <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
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
                                <select data-placeholder="Select Item" class="standardSelect form-control" tabindex="1" name="item" v-model="item.item">
                                    @foreach ($items as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Quantity</label>
                            <div class="input-group">
                                <input class="form-control" name="quantity" v-model="item.quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Unit</label>
                            <div class="input-group">
                                <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" name="unit" v-model="item.unit">
                                    <option value="1">Kg</option>
                                    <option value="2">No</option>
                                    <option value="3">Chees</option>
                                    <option value="4">Packet</option>
                                    <option value="5">Box</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">location</label>
                            <div class="input-group">
                                <input class="form-control" name="location" v-model="item.location">
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

      <div class="modal fade " id="itemModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-md " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="mediumModalLabel">Item Details</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                                <div class="default-tab" v-if="item">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Stock Details</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Item details</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content  pt-2" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="row">
                                
                                                    <div class="col-xs-12 col-sm-12">
                                                        <div class="card" style="margin-top:15px;">
                                                            <div class="card-body card-block custom-card">
                                                                
                                                                <div class="form-group">
                                                                    <label class=" form-control-label">Iem name</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="item" v-model="item.name" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" v-if="stock.quantity">
                                                                    <label class=" form-control-label">Quantity</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="quantity"
                                                                        v-model="stock.quantity" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" v-if="!stock.quantity">
                                                                    <label class=" form-control-label">Opening Stock</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="quantity"
                                                                        v-model="opening.stock" >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class=" form-control-label">Unit</label>
                                                                    <div class="input-group">
                                                                        <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" name="unit" v-model="stock.unit_id" disabled>
                                                                        <option  v-for="unit in units" :value="unit.id">@{{unit.lookup_value}}</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                    
                                                                <div class="form-group" v-if="stock.location">
                                                                    <label class=" form-control-label">Warehouse</label>
                                                                    <div class="input-group">
                                                                        <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" name="unit" v-model="stock.location_id" disabled>
                                                                            <option  v-for="unit in units" :value="unit.id">@{{unit.lookup_value}}</option>
                                                                                
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" v-if="!stock.location">
                                                                    <label class=" form-control-label">Warehouse</label>
                                                                    <div class="input-group">
                                                                        <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" name="unit" v-model="opening.warehouse_id">
                                                                            <option  v-for="location in locations" :value="location.id">@{{location.lookup_value}}</option>
                                                                                
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" >
                                                                    <label class=" form-control-label">Location</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="quantity"
                                                                            v-model="opening.location" >
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
                                                        <div class="card" style="margin-top:15px;">
                                                            <div class="card-body card-block custom-card">
                                                                
                                                                <div class="form-group">
                                                                    <label class=" form-control-label">Iem name</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="item" v-model="item.name" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class=" form-control-label">Part No</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="quantity"
                                                                        v-model="item.part_no" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class=" form-control-label">Unit</label>
                                                                    <div class="input-group">
                                                                        <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" name="unit" v-model="stock.unit_id">
                                                                        <option  v-for="unit in units" :value="unit.id">@{{unit.lookup_value}}</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                
                                                                <div class="form-group">
                                                                    <label class=" form-control-label">Catelog/Drawing No</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="location" v-model="item.catelog_drwaing_no" disabled>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class=" form-control-label">HSN Code</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="hsn" v-model="item.hsn_code" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class=" form-control-label">Part type</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="hsn" v-model="item.part_type" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class=" form-control-label">Sourcing code</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="sourcing" v-model="item.sourcing_code" disabled>
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
                            <button type="button" class="btn btn-outline-primary" @click="update_stock()">Update Changes</button>
                        </div>
                    </div>
                </div>
            </div>
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
      stock:{},
      units:[],
      locations:[],
      opening : {},
      stock_id:'',
    },
    methods: {

        get_item_by:function(id){

            var vm = this;
            vm.stock_id = id;
            axios.get('/company/stocks/'+vm.stock_id).then((response) => {
            vm.stock = response.data;
            vm.item = response.data.item_ob;
            vm.opening.location = vm.stock.location;
            vm.opening.warehouse_id = vm.stock.warehouse_id;
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
      
        create_item: function(){
                     $("#addItem").modal('toggle');
           
         },
        save_item:function() {
           console.log(this.item);

            axios.post('/company/stocks',this.item)
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
        get taxes
        **/
        get_store:function(){

            var vm = this;
            axios.get('/general/lookup?json=true&&key=STORE').then((response) => {
            vm.locations = response.data;

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        /*
        update stock **/
        update_stock:function() {
           console.log(this.opening);

            axios.put('/company/stocks/'+this.stock_id,this.opening)
            .then(response => {
                location.reload();
                $("#itemModal").modal('toggle');
                $(".modal-backdrop").remove();
                alert('successfully created!');
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
      },
      computed: {
      },
      mounted() {

        this.get_unit();
        this.get_store();
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