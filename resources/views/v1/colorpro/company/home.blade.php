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
              <li class="breadcrumb-item"><a href="#" >Company</a></li>
              <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Company Dashboard</h4>
        </div>
        <div class="d-none d-md-block">
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="save" class="wd-10 mg-r-5"></i> Save</button>
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="upload" class="wd-10 mg-r-5"></i> Export</button>
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="share-2" class="wd-10 mg-r-5"></i> Share</button>
          <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="sliders" class="wd-10 mg-r-5"></i> Settings</button>
        </div>
      </div>

      

      <div class="row">
        <div class="col-2"></div>
        <div class="col-7">
            <div class="row no-gutters mg-t-10">
                <div class="col-3 col-sm-5 col-md-6 col-lg-5 bg-primary rounded-left">
                  <div class="wd-150p ht-100p">
                    <img src="{{asset('new_assets/assets/img/cmpny.jpeg')}}" class="wd-100p img-fit-cover img-object-top rounded-left" alt="">
                  </div>
                </div><!-- col -->
                <div class="col-9 col-sm-7 col-md-6 col-lg-7 bg-white rounded-right">
                  <div class="ht-100p d-flex flex-column justify-content-center pd-20 pd-sm-30 pd-md-40">
                    <span class="tx-color-04"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2 wd-40 ht-40 stroke-wd-3 mg-b-20"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg></span>
                    <h3 class="tx-16 tx-sm-20 tx-md-24 mg-b-15 mg-md-b-20">Company Profile</h3>
                    <p class="tx-14 tx-md-16 tx-color-02">Ei quo quas vocent. Vel libris luptatum ut, ex mel graeci comprehensam, ut doming antiopam tincidunt sed. Quis</p>
                    <p class="tx-12 tx-md-13 tx-color-03 mg-b-25">Ei quo quas vocent. Vel libris luptatum ut, ex mel graeci comprehensam, ut doming antiopam tincidunt sed. Quis efficiantur vix eu, ne eum quas antiopam, ex fugit atqui mel...</p>
                    <a href="" class="btn btn-primary btn-block btn-uppercase">Manage</a>
                  </div>
                </div><!-- col -->
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
      
        has_permission:function(url){
          return this.permissions.includes(url);
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