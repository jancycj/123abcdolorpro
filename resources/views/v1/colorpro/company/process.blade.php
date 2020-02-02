@extends('layouts.colorpro.app')
@section('content')
<div class="content content-fixed">
    <div class="container pd-20">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#" >Company</a></li>
              <li class="breadcrumb-item active" aria-current="page">Process</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Process section</h4>
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
                    <strong class="card-title">Process List</strong>
                    <a href="#"  class="btn btn-sm btn-outline-secondary float-right" @click="create_process()"><i class="fa fa-plus"></i>create</a>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Process NO</th>
                                <th>Item</th>
                                <th>Process code</th>
                                <th>Process mode</th>
                                <th>section</th>
                                <th>Sttings time</th>
                                <th>Operation time</th>
                                <th>person</th>
                                <th>Scarp code</th>
                                <th>Mechine NO</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($process as $item)
                            <tr>
                                <td>{{$item->operation_no}}</td>
                                <td>{{$item->item}}</td>
                                <td>{{$item->process_code}}</td>
                                <td>{{$item->process_mode}}</td>
                                <td>{{$item->section}}</td>
                                <td>{{$item->oprn_ts}}</td>
                                <td>{{$item->oprn_to}}</td>
                                <td>{{$item->responsible_person}}</td>
                                <td>{{$item->scrap_code}}</td>
                                <td>{{$item->mechine_no}}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- col -->
        
      </div><!-- row -->

      <div class="modal fade" id="createProcess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content tx-14">

        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel4">Create process</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6">

                        <div class="form-group">
                            <label class=" form-control-label">Procee code</label>
                            <div class="input-group">
                                <input class="form-control" name="process_code" v-model="item.process_code">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Item</label>
                            <div class="input-group">
                                <select data-placeholder="Choose an item..." class="standardSelect form-control" tabindex="1" name="item" v-model="item.item">
                                    @foreach ($items as $item)
                                <option value="{{$item->id}}" >{{$item->name}} ({{$item->code}})
                                </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Procee mode</label>
                            <div class="input-group">
                                <input class="form-control" name="process_mode" v-model="item.process_mode">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Section</label>
                            <div class="input-group">
                                <input class="form-control" name="section" v-model="item.section">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Operation settings time</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="oprn_ts" v-model="item.oprn_ts">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Operation Time</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="oprn_to" v-model="item.oprn_to">
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-6 col-sm-6">

                        <div class="form-group">
                            <label class=" form-control-label">Responsible person</label>
                            <div class="input-group">
                                <input class="form-control" name="responsible_person" v-model="item.responsible_person">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Scarp code</label>
                            <div class="input-group">
                                <input class="form-control" name="scrap_code" v-model="item.scrap_code">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Scrap percentage</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="scrap_persentage" v-model="item.scrap_persentage">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Procee Item ID</label>
                            <div class="input-group">
                                <input class="form-control" name="process_item_id" v-model="item.process_item_id">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Mechine No</label>
                            <div class="input-group">
                                <input class="form-control" name="mechine_no" v-model="item.mechine_no">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label">Procee Description</label>
                            <div class="input-group">
                                <textarea name="process_description" id="address1" rows="1" placeholder="Building,Street" class="form-control" v-model="item.process_description"></textarea>
                            </div>
                        </div>

                    </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_process()">Create</button>
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
         create_process: function(){
            $("#createProcess").modal('toggle');
           
         },
         save_process:function() {
           console.log(this.item);

            axios.post('/admin/process',this.item)
            .then(response => {
                $("#createProcess").modal('toggle');
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