@extends('layouts.admin.app')
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
                              <th>Description</th>
                              <th>End date</th>
                          </tr>
                      </thead>
                      <tbody>

                          @foreach ($lookup as $item)
                          <tr>
                              <td>{{$item->lookup_value}}</td>
                              <td>{{$item->lookup_description}}</td>
                              <td>{{$item->end_date}}</td>
                          </tr>
                          @endforeach
                          
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

          <!-- <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel4">Add new Item</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  -->

          <div class="modal-body">
                  
                  <div class="card-body card-block">
                    <div class="form-group">
                        <label class=" form-control-label">Key Name</label>
                        <div class="input-group">
                            <input class="form-control" name="name" v-model="item.name" onkeyup="this.value = this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Description</label>
                        <div class="input-group">
                            <input class="form-control" name="name" v-model="item.desc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">End date</label>
                        <div class="input-group">
                            <input class="form-control" type="date" name="name" v-model="item.date">
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
                     $("#create_master").modal('toggle');
           
         },
         save_item:function() {
           console.log(this.item);

            axios.post('/admin/lookup',this.item)
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
         }
     
     },
     mounted(){
     }
    });
</script>
@endsection