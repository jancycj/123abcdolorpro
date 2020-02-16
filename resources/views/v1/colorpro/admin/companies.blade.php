@extends('layouts.admin.app')
@section('content')
<div class="content content-fixed">
    <div class="container pd-20">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#" >Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Company</li>
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
                  <strong class="card-title">Company List</strong>
                  <a href="{{url('admin/companies/create')}}" class="btn btn-sm btn-outline-secondary float-right"><i class="fa fa-plus"></i>create</a>
              </div>
              <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>email</th>
                              <th>Code</th>
                              <th>Address</th>
                              <th>Phone</th>
                          </tr>
                      </thead>
                      <tbody>

                          @foreach ($companies as $company)
                          <tr>
                              <td>{{$company->name}}</td>
                              <td>{{$company->email}}</td>
                              <td>{{$company->company_code}}</td>
                              <td>{{$company->address_line1}}</td>
                              <td>{{$company->phone_number}}</td>
                          </tr>
                          @endforeach
                          
                      </tbody>
                  </table>
              </div>
          </div> <!-- card -->
        </div><!-- col -->
        
      </div><!-- row -->
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
           roles:[
             {role:'Admin',url:'#'},
             {role:'Candidate',url:'#'},
             {role:'User',url:'#'},
           ]
       },
   methods: {
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         get_roles: function(){
                     $("#positionSelect").modal('toggle');
           
         }
     
     },
     mounted(){
     }
    });
</script>
@endsection