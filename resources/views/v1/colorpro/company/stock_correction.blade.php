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
.break {
    border-bottom: 1px solid #00000021;
    margin-top: 15px;
    /* padding: 8px; */
    margin-bottom: 10px;
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
                        <h5 class="hd">#Stock Correction </h5> 
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
                                <div class="col-md-4 col-lg-4 col-sm-6" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Date*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" type="date" class="form-control" v-model="stock.t_date" disabled>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getItemPopup($event)" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Part no*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" class="form-control" v-model="stock.part_no">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="stock.item" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Current Stock</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off"  class="form-control" v-model="stock.quantity" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6"  >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Unit*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off"  class="form-control" v-model="stock.unit" disabled>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getStorePopup($event)" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Store Code</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" class="form-control" v-model="stock.store_code">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="stock.store" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Adjustment Qty</label>
                                        <div class=" col-5 input-group">
                                            <input autocomplete="off"  class="form-control" v-model="stock.increment_qty">
                                        </div>
                                        <div class=" col-2 input-group">
                                            <h3>+</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label"></label>
                                        <div class=" col-5 input-group">
                                            <input autocomplete="off"  class="form-control" v-model="stock.decrement_qty">
                                        </div>
                                        <div class=" col-2 input-group">
                                            <h3>-</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 col-lg-11 col-sm-6" >
                                    <div class="form-group row">
                                        <label class="col-2 form-control-label">Remarks</label>
                                        <div class="col-9 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="stock.remarks">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-3">
                                    <div class="form-group row">
                                        <a href="#" class="btn btn-white btn-block">Copy Assortment</a>
                                    </div>
                                </div> -->
                            </div>
                            <div class="break"></div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label"></label>
                                        <div class=" col-7 input-group">
                                            <button class="btn btn-primary btn-xs btn-block" @click="updateStock()"> Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                       
                    </div>
                    
                    
                </div><!-- card-header -->

            </div><!-- card-->
        </div><!-- col -->
        
      </div><!-- row row-xs -->

        

        
        
        <div class="modal fade" id="itemPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <raw-component 
                                :id="'itemPop'"
                                :query="item_qry" 
                                @selected="getItem($event)"
                                >
                            </raw-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- yarn popup modal end -->

        <div class="modal fade" id="storePopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                        <raw-component 
                                :id="'storeList'"
                                :query="store_qry" 
                                @selected="getStore($event)"
                                >
                            </raw-component>
                                
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
    var store_qry = `SELECT lookup_description as store, lookup_value as code, id
FROM lookup_masters
WHERE lookup_key = 'STORE'
LIMIT 5`;
var item_qry = `SELECT id,part_no,name,list_price
FROM items
where IFNULL(list_price,0) > 0 AND company_id = {{DocNo::companyId()}} AND part_no like "%$vrbl%"
LIMIT 10`;
    var app = new Vue({
       el: '#app',
       data: {
            store_qry : store_qry,
            item_qry : item_qry,
           stocks : [ ],
           stock :{
            item:'',
            part_no :'',
            t_date:'{{$t_date}}',
            quantity : '',
            unit : '',
            store : '',
            store_code : '',
            decrement_qty :0,
            increment_qty : 0
           },
           errors : [],
           removeFlag : false,
           
            
       },
       watch:{
            'stock.increment_qty': function (newVal, oldVal){
                if(newVal != 0){
                    this.stock.decrement_qty = 0;
                }
            },

            'stock.decrement_qty': function (newVal, oldVal){
                if(newVal != 0){
                    this.stock.increment_qty = 0;
                }
            },
        },
   methods: {
        
        getItemPopup : function(event, obj){
            
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#itemPopup").modal('toggle');
            // }
        },
        getItem : function(val){
            var vm = this;
            vm.stock.item = val.name;
            vm.stock.part_no = val.part_no;
            vm.stock.item_id = val.id;
            $("#itemPopup").modal('toggle');
        },
        
        getStorePopup : function(event, obj){
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#storePopup").modal('toggle');
            // }
        },
        getStore : function(val){
            var vm = this;
            vm.stock.store = val.store;
            vm.stock.store_code = val.code;
            vm.stock.store_id = val.id;
            $("#storePopup").modal('toggle');
            console.log(val);
            vm.get_bincards();

        },
         /* get item
         **/
        get_bincards:function(){

            var vm = this;
            vm.update_flag = true;
            axios.get('/company/stock-correction?json=true&&item_id='+vm.stock.item_id+'&&store_id='+vm.stock.store_id).then((response) => {
                if(response.data.length > 0){
                    var dt = response.data[0];
                    vm.stock.id = dt.id;
                    vm.stock.quantity = dt.quantity;
                    vm.stock.unit = dt.unit;
                }
                
            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        updateStock:function() {
            console.log(this.stock)
            if(!this.stock.remarks){
                alert('remarks required');
                return;
            }
            if(!this.stock.increment_qty && !this.stock.decrement_qty){
                alert('Quantity required');
                return;
            }
            if(!this.stock.id ){
                alert('Please select an item');
                return;
            }
            if(!this.stock.store != '' ){
                alert('Please select a store');
                return;
            }
            axios.put('/company/updateStock/'+this.stock.id,this.stock)
            .then(response => {
                alert('successfully updated!');
                this.stock = {
                    item:'',
                    part_no :'',
                    t_date:'{{$t_date}}',
                    quantity : '',
                    unit : '',
                    store : '',
                    store_code : '',
                    decrement_qty :0,
                    increment_qty : 0
                };
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
        
        
        
         
         
     
     },
     mounted(){
        // this.get_bincards(1,'','');
     },
     
    });
</script>
@endsection