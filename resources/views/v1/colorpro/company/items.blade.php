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
                            <th>Category</th>
                            <th>Stock ref</th>
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
                            <td>{{$item->category}}</td>
                            <td>{{$item->ref_no}}</td>
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
                <div class="modal-dialog modal-lg " role="document">
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
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Item Details</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Stock details</a>
                                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Company Details</a>
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
                                                                                <input class="form-control" name="item" v-model="item.item">
                                                                            </div>
                                                                        </div>
                                                                      <div class="form-group">
                                                                          <label class=" form-control-label">Quantity</label>
                                                                          <div class="input-group">
                                                                              <input class="form-control" name="quantity"
                                                                              v-model="item.quantity">
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group">
                                                                          <label class=" form-control-label">Unit</label>
                                                                          <div class="input-group">
                                                                              <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" name="unit" v-model="item.unit_id">
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
                                                                          <label class=" form-control-label">location</label>
                                                                          <div class="input-group">
                                                                              <input class="form-control" name="location" v-model="item.location">
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
                                                                                  <input class="form-control" name="item" v-model="item.item">
                                                                              </div>
                                                                          </div>
                                                                        <div class="form-group">
                                                                            <label class=" form-control-label">Quantity</label>
                                                                            <div class="input-group">
                                                                                <input class="form-control" name="quantity"
                                                                                v-model="item.quantity">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class=" form-control-label">Unit</label>
                                                                            <div class="input-group">
                                                                                <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" name="unit" v-model="item.unit_id">
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
                                                                            <label class=" form-control-label">location</label>
                                                                            <div class="input-group">
                                                                                <input class="form-control" name="location" v-model="item.location">
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                        
                                                          </div><!-- /div row -->
                                            </div>
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                    <div class="row">
                                      
                                                            <div class="col-xs-12 col-sm-12">
                                                                <div class="card" style="margin-top:15px;">
                                                                    <div class="card-body card-block custom-card">
                                                                        
                                                                          <div class="form-group">
                                                                              <label class=" form-control-label">Iem namessss</label>
                                                                              <div class="input-group">
                                                                                  <input class="form-control" name="item" v-model="item.item">
                                                                              </div>
                                                                          </div>
                                                                        <div class="form-group">
                                                                            <label class=" form-control-label">Quantity</label>
                                                                            <div class="input-group">
                                                                                <input class="form-control" name="quantity"
                                                                                v-model="item.quantity">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class=" form-control-label">Unit</label>
                                                                            <div class="input-group">
                                                                                <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" name="unit" v-model="item.unit_id">
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
                                                                            <label class=" form-control-label">location</label>
                                                                            <div class="input-group">
                                                                                <input class="form-control" name="location" v-model="item.location">
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
                            <button type="button" class="btn btn-outline-primary">Update Changes</button>
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