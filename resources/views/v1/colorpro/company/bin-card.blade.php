@extends('layouts.colorpro.app')
@section('style')

<style type="text/css">
  .fade:not(.show) {
      opacity: 5;
  }
  .tab-content {
        margin-bottom: 0 !important;
    }
</style>
<style>
        .order-b {
            right: 4% !important;
            position: absolute !important;
        }
        .order-m {
            right: 1% !important;
            position: absolute !important;
        }
        .label-t {
            /* margin-bottom: 0rem !important; */
            color: #a09e9e !important;
        }
        input#inputAddress {
            max-width: 145px !important;
        }
        /* .order-ft {
            border: 1px solid #dcd7d7;
            padding: 5px;
            margin: 5px;
        } */
        .order-ft {
            border: none;
            border-bottom: 1px solid #dcd7d7;
        }
        .order-cap{
            justify-content: center;
            text-align: center;
            background: #f7f7fd !important;
            padding: 2px !important;
            border-radius: 10px !important ;
        }
        .hd{
            color: #19a1bf;

        }
        .import-sec-white {
            padding: 0px 13px !important;
        }
        .form-group {
            margin-bottom: 2px !important;
        }
        input {
            max-height: 28px !important;
        }
        select {
            max-height: 28px !important;
            padding: 5px !important;
        }
        label {
            color: #1c273c !important;
            font-size: 12px !important;
            font-weight: bold;
            margin-bottom: 0px !important;
            text-align: end;
            
        }
        .table th, .table td {
            padding: 3px 5px !important;
            line-height: 1.2 !important;
            font-weight: bold;
        }
        .action-icon {
            font-size: 16px;
            cursor: pointer;
        }
        .table thead th {
            background: #00c9ff45;
        }
        .img-thumbnail {
            cursor: pointer;
        }
        .df-example {
    font-size: 0.875rem;
    letter-spacing: normal;
    padding: 10px;
    background-color: #fff;
    border: 1px solid rgba(72, 94, 144, 0.16);
    position: relative;
}
.df-example::before {
    content: attr(data-label);
    display: block;
    position: absolute;
    top: -6px;
    left: 5px;
    font-size: 8px;
    font-weight: 600;
    font-family: -apple-system, BlinkMacSystemFont, "Inter UI", Roboto, sans-serif;
    letter-spacing: 1px;
    text-transform: uppercase;
    background-color: inherit;
    color: #8392a5;
    padding: 0 5px;
}
    </style>
@endsection
@section('content')
<div class="content content-fixed">
    <div class="container pd-5">
        <div class="import-sec-white mg-b-5">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <div>
                    <div >
                        <h5 class="hd">#Bin Card </h5> 
                    </div> 
                </div>
                
            </div>
        </div>
      <div class="row row-xs">
        <div class="col-lg-12 col-md-12 ">
            <div class="card mg-b-2">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getItemPopup($event)" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Part no*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" class="form-control" v-model="bincard.part_no">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="bincard.item" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">from*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" type="date" class="form-control" v-model="bincard.from">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6"  >
                                    <div class="form-group row">
                                        <label class=" col-2 form-control-label">to*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" type="date" class="form-control" v-model="bincard.to">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6"  >
                                    <button class="btn btn-primary btn-xs" @click="get_bincards()"> Show</button>
                                </div>

                            </div>
                            
                        </div>
                        <div class="col-md-3">
                            <!-- <div data-label="Sort By" class="df-example demo-forms">
                                <div class="row row-sm">
                                    <div class="col-sm-12">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="customRadio1">Part No</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="customRadio1">Part name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="customRadio1">Party</label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    
                    
                </div><!-- card-header -->
                <div class="card-body custom-body">
                    <div class="row" v-if="errors.length > 0">
                        <div class="col-12 text-center" v-for="error in errors">
                            <label for="erorr" class="text-danger"> @{{error[0]}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0">
                                <thead>
                                    <tr>
                                    <th scope="col">SiNo</th>
                                    <th scope="col">Date*</th>
                                    <th scope="col">transaction_type</th>
                                    <th scope="col">opening_stock</th>
                                    <th scope="col">opening_value</th>
                                    <th scope="col">transaction_qty</th>
                                    <th scope="col">trasaction_value</th>
                                    <th scope="col">closing_stock</th>
                                    <th scope="col">closing_value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(d,index) in bincards">
                                        <td scope="row">@{{index+1}}</td>
                                        <td>
                                            @{{d.transaction_date}}
                                        </td>
                                        <td>
                                             @{{d.bincard_type}} 
                                        </td>
                                        <td>
                                             @{{d.opening_stock}}
                                        </td>
                                        <td>
                                             @{{d.opening_value}} 
                                        </td>
                                        <td>
                                            @{{d.transanction_type == 'I' ? '-' :''}} @{{d.transaction_qty}} 
                                        </td>
                                        <td>
                                             @{{d.trasaction_value}} 
                                        </td>
                                        <td>
                                             @{{d.closing_stock}} 
                                        </td>
                                        <td>
                                             @{{d.closing_value}} 
                                        </td>

                                        
                                    </tr>
                                   
                                </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                    
                </div><!-- card-body -->
                

            </div><!-- card-->
        </div><!-- col -->
        
      </div><!-- row row-xs -->

        

        
        
        <div class="modal fade" id="itemPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-item 
                            ref="itemPop"
                            @selected="getItem($event)"
                            ></choose-item>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- yarn popup modal end -->
    
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
       
  </script>
<script>
    var app = new Vue({
       el: '#app',
       data: {
           
           bincards : [ ],
           bincard :{
            item:'',
            part_no :'',
            from:'{{$start}}',
            to:'{{$end}}',
           },
           errors : [],
           removeFlag : false,
           
            
       },
       watch:{
        
       },
   methods: {
        
        getItemPopup : function(event, obj){
            this.selected_obj = obj;
             console.log('selected_obj',this.selected_obj)
             this.$refs.itemPop.$refs.search.focus();
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#itemPopup").modal('toggle');
            // }
        },
        getItem : function(val){
            var vm = this;
            vm.bincard.item = val.name;
            vm.bincard.part_no = val.part_no;
            vm.bincard.item_id = val.id;
            $("#itemPopup").modal('toggle');
        },
        
         
         /* get item
         **/
        get_bincards:function(){

            var vm = this;
            vm.update_flag = true;
            axios.get('/company/bin-card?json=true&&item_id='+vm.bincard.item_id+'&&from='+vm.bincard.from+'&&to='+vm.bincard.to).then((response) => {
                vm.bincards = response.data;
            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        
        
        
         
         
     
     },
     mounted(){
        // this.get_bincards(1,'','');
     },
     
    });
</script>
@endsection