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
                              <th>Item code</th>
                              <th>Catelog/Drwaing No</th>
                              <th>Category</th>
                              <th>Unit</th>
                              <th>HSN Code</th>
                              <th>Part Type</th>
                              <th>Sourcing Code</th>
                          </tr>
                      </thead>
                      <tbody>

                          @foreach ($items as $item)
                          <tr>
                              <td>{{$item->name}}</td>
                              <td>{{$item->part_no}}</td>
                              <td>{{$item->catelog_drwaing_no}}</td>
                              <td>{{$item->category}}</td>
                              <td>{{$item->unit}}</td>
                              <td>{{$item->hsn_code}}</td>
                              <td>{{$item->part_type}}</td>
                              <td>{{$item->sourcing_code}}</td>
                            </tr>
                          @endforeach
                          
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

          <!-- <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel4">Add new Item</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  -->

          <div class="modal-body">
                  <div class="card-header">
                      <h4>
                            <strong class="text-primary">Item Details</strong> 

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
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">Part Number</label>
                                <div class="input-group">
                                    <input class="form-control" name="part_no" v-model="item.part_no">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">Name</label>
                                <div class="input-group">
                                    <input class="form-control" name="name" v-model="item.name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">UOM </label>
                                <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1" name="unit"  v-model="item.unit">
                                        @foreach ($units as $item)
                                            <option value="{{$item->id}}">{{$item->lookup_value}}</option>
                                        @endforeach
                                        
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">Category</label>
                                <div class="input-group">
                                    <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1" name="unit"  v-model="item.category">
                                        @foreach ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->lookup_value}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">Drwaing/Catelog NO </label>
                                <div class="input-group">
                                    <input class="form-control" name="unit" v-model="item.catelog_drwaing_no">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">HSN code </label>
                                <div class="input-group">
                                    <input class="form-control" name="hsn" v-model="item.hsn_code">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">Part type</label>
                                <div class="input-group">
                                    <select data-placeholder="Choose a Category..." class="standardSelect form-control" tabindex="1" name="category" v-model="item.part_type">
                                        <option value="V">V(Variant)</option>
                                        <option value="A">A(Assembly)</option>
                                        <option value="C">C(Component) </option>
                                        <option value="R">R(Raw MAterial)</option>
                                        <option value="T">T(Tool)</option>
                                        <option value="O">O(Consumable)</option>
                                        <option value="W">W(Semi finished)</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">Sourcing code</label>
                                <div class="input-group">
                                    <select data-placeholder="Choose a Category..." class="standardSelect form-control" tabindex="1" name="category" v-model="item.sourcing_code">
                                        <option value="MFG">MFG(Manufacturing)</option>
                                        <option value="PUR">PUR(Standard Purchase)</option>
                                        <option value="SUB">SUB(Sub Contract Purchase) </option>
                                        <option value="OSV">OSV(Outside Processing)</option>
                                        <option value="PHT">PHT(Phantom)</option>
                                        <option value="IMP">IMP(Import)</option>
                                    </select>
                                </div>
                            </div>
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
          $('#bootstrap-data-table').DataTable();
      } );
  </script>
<script>
    var app = new Vue({
       el: '#app',
       data: {
           showMenu: false,
           item:{},
           errors:[],
       },
   methods: {
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         create_item: function(){
                     $("#addItem").modal('toggle');
           
         },
         save_item:function() {
           console.log(this.item);

            axios.post('/admin/items',this.item)
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
     mounted(){
     }
    });
</script>
@endsection