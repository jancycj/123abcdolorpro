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
                    <li class="breadcrumb-item active" aria-current="page">QC Plans</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Item QC plans </h4>
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
                            <label class=" form-control-label">Items</label>
                            <select placeholder="Select item" class="standardSelect form-control" tabindex="1" name="unit" @change="get_rates(selected)" v-model="selected_item">
                                @foreach ($items as $item)
                                    <option value="{{$item->id}}">{{$item->item}}</option>
                                @endforeach
                                
                            </select>
                      </div>
                      <div class="col-9">
                            <a href="#" class="btn btn-sm btn-outline-secondary float-right" @click="create_item()"><i class="fa fa-plus"></i>create</a>
                      </div>
                  </div>
                 
              </div>
              <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Item</th>
                              <th>QC parameter</th>
                              <th>QC Value</th>
                              <th>Tollarence</th>
                          </tr>
                      </thead>
                      <tbody>

                          
                          <tr v-for="item in qc_list">
                              <td>@{{item.item}}</td>
                              <td>@{{item.qc_parameter}}</td>
                              <td>@{{item.qc_value}}</td>
                              <td>@{{item.qc_tollarence}}</td>
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
                </div>
                  <div class="card-body card-block">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">Item</label>
                                <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1" name="unit"  v-model="qc.item">
                                        @foreach ($items as $item)
                                            <option value="{{$item->id}}">{{$item->item}}</option>
                                        @endforeach
                                        
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">QC plan</label>
                                <div class="input-group">
                                    <input class="form-control" name="lookup_value" v-model="qc.plan" >
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">QC Value</label>
                                <div class="input-group">
                                    <input class="form-control" name="lookup_value" v-model="qc.value" >
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" form-control-label">Tollarance</label>
                                <div class="input-group">
                                    <input class="form-control" name="value" v-model="qc.tollarence" >
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                      
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_qc()">Create</button>
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
           qc_list:[],
           qc : {},
       },
   methods: {
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         create_item: function(){
                     $("#create_master").modal('toggle');
           
         },
         save_qc:function() {
           console.log(this.item);
            axios.post('/company/qc',this.qc)
            .then(response => {
                $("#create_master").modal('toggle');
                $(".modal-backdrop").remove();
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

            axios.get('/company/qc?json=true')
            .then(response => {
                this.qc_list = response.data;
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
     
     },
     mounted(){
        // $('#bootstrap-data-table').DataTable();
         this.get_items();
     }
    });
</script>
@endsection