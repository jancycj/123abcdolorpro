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
                    <li class="breadcrumb-item"><a href="#" >Reports</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Stock</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Company Stock Report</h4>
                </div>
                <div class="d-none d-md-block">
                <a class="btn btn-sm pd-x-15 btn-white btn-uppercase" href="{{url('company/report/stock_pdf')}}" target="_balnk"><i data-feather="save" class="wd-10 mg-r-5"></i> PDF</a>
                
                </div>
            </div>
        </div>

      <div class="row row-xs">
       
        <div class="col-lg-12 col-md-12 mg-t-10">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-6">
                  <strong class="card-title">Stock Report</strong>
                </div>
                <div class="col-6">
                  {{-- <div class="search-form">
                    <input type="search" class="form-control" placeholder="Search Category">
                    <button class="btn" type="button"><i data-feather="search"></i></button>
                  </div> --}}
                  <div class="form-group">
                      <label class=" form-control-label">Select Category</label>
                      <div class="input-group">
                          <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1" name="unit" v-model="category_id" @change="search_category()" >
                              @foreach ($categories as $item)
                                  <option value="{{$item->id}}">{{$item->lookup_value}}</option>
                              @endforeach
                                  
                          </select>
                      </div>
                  </div>
                </div>
              </div>
               
            </div>
            <div class="card-body">
                <table id="neww" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Part NO</th>
                            <th>Item Name</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Location</th>
                            <th>Rate</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($stocks as $item)
                        <tr>
                            <td>{{$item->item_ob->part_no}}</td>
                            <td>{{$item->item}}</td>
                            <td>{{$item->unit}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->location}}</td>
                            <td>{{$item->item_ob->list_price}}</td>
                            <td>{{$item->item_ob->list_price * $item->quantity}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $stocks->links() }}
            </div> <!--/ card body -->
        </div><!-- /card -->
        </div><!-- col -->
        
      </div><!-- row -->

    </div><!-- container -->
  </div><!-- content -->

  
@endsection
@section('script')
{{-- <script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script> --}}
    <script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <!-- <script src="{{asset('assets/js/init/datatables-init.js')}}"></script> -->


    <script type="text/javascript">
        $(document).ready(function() {
        //   $('#bootstrap-data-table').DataTable();
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
      category_id : '',
    },
    methods: {

      search_category:function(){

            location.href = '/company/report/stock?category_id='+this.category_id;
           
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