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
                    <li class="breadcrumb-item active" aria-current="page">Purchase order</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Purchase order register</h4>
                </div>
                <div class="d-none d-md-block">
                {{-- <a class="btn btn-sm pd-x-15 btn-white btn-uppercase" :href="`{{url('company/report/po_pdf')}}`+'?vendor_id='+vendor_id+'&&from='+from+'&&to='+to" target="_balnk" disable="true"><i data-feather="save" class="wd-10 mg-r-5"></i> PDF</a> --}}
                
                </div>
            </div>
        </div>

      <div class="row row-xs">
       
        <div class="col-lg-12 col-md-12 mg-t-10">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-3">
                    <label class=" form-control-label">From</label>
                    <div class="input-group">
                        <input type="date" class="form-control" v-model="from">
                    </div>
                </div>
                <div class="col-3">
                        <label class=" form-control-label">To</label>
                        <div class="input-group">
                            <input type="date" class="form-control" v-model="to">
                        </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                      <label class=" form-control-label">Select Vendor</label>
                      <div class="input-group">
                          <select data-placeholder="Select master" class="standardSelect form-control" tabindex="1" name="unit" v-model="vendor_id" @change="search_category()" >
                              @foreach ($categories as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                                  
                          </select>
                      </div>
                  </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" style="margin-top: 23px;" @click="search_category()">Search</button>
                    <a class="btn  pd-x-15 btn-white btn-uppercase" style="margin-top: 23px;" :href="`{{url('company/report/po_pdf')}}`+'?vendor_id='+vendor_id+'&&from='+from+'&&to='+to" target="_balnk" disable="true"><i data-feather="save" class="wd-10 mg-r-5"></i> PDF</a>
                </div>
              </div>
               
            </div>
            <div class="card-body">
                @php($tt = 0)
                @foreach ($orders as $index => $item)
                <table>
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td>
                                <h5>
                                        {{$item[0]->supplier_name}}

                                </h5>
                                <p>
                                        {{$item[0]->supplier_name}}
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table  class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Order NO</th>
                            <th>Date</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Rcvd Qty</th>
                            <th>Rate</th>
                            <th>Discount</th>
                            <th>Total</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $it)
                            @foreach ($it->exact_details as $detail)
                            <tr>
                                <td>{{$detail->order_no}}</td>
                                <td>{{$detail->delivery_date}}</td>
                                <td>{{$detail->item}}</td>
                                <td>{{$detail->quantity}}</td>
                                <td>{{$detail->unit}}</td>
                                <td>{{$detail->recieved_quantity}}</td>
                                <td>{{$detail->rate}}</td>
                                <td>{{$detail->discount}}</td>
                                <td  style="text-align:right;">{{$detail->grant_total}}</td>

                            </tr>
                            @endforeach
                        @endforeach
                        <tr>
                            <td colspan="8" style="text-align:right;"> Total </td>
                            <td  style="text-align:right;">  RS.{{$item->sum('basic_total')}}</td>
                            @php($tt = $tt+ $item->sum('basic_total'))
                        </tr>
                    </tbody>
                </table>
                @endforeach
                <table class="table table-striped table-bordered">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align:right;">
                                    grant_total
                                </td>
                                <td  style="text-align:right;">
                                    RS.{{$tt}}
                                </td>
                            </tr>
                        </tbody>
                </table>

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
      vendor_id : '',
      from : '',
      to : '',
    },
    methods: {

      search_category:function(){

          if(this.from == ''){
            alert('please select a from date');
            return;
          }
          if(this.to == ''){
            alert('please select a to date');
            return;
          }

            location.href = '/company/report/po?vendor_id='+this.vendor_id+'&&from='+this.from+'&&to='+this.to;
           
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
        $('.collapse').collapse();
        $('.dropdown-toggle').dropdown();
        // this.getWeekStartAndEnd();
        // this.get_candidate_availability();
        
      }






  });
</script>
@endsection