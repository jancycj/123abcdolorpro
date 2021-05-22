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

tr.clickable:hover{
    cursor: pointer;
    background: #9e9e9e;
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
                        <h5 class="hd">#Purchase Rate </h5> 
                    </div> 
                </div>
                
            </div>
        </div>
      <div class="row row-xs">
        <div class="col-lg-12 col-md-12 ">
            <div class="card mg-b-2">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-8">
                            
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getItemPopup($event)" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Item*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" class="form-control" v-model="rateObj.part_no">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="rateObj.item_name" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getSupplierPopup($event)" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Supplier*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" class="form-control" v-model="rateObj.supplier_code">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="rateObj.supplier_name" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-sm-6" >
                                    <div class="form-group row">
                                        <label class="col-2 form-control-label">Remarks</label>
                                        <div class="col-10 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="rateObj.remarks">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-sm-6" >
                                    <div class="form-group row">
                                        <label class="col-2 form-control-label">Specification</label>
                                        <div class="col-10 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="rateObj.specifications">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-4" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Stock unit</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="rateObj.stock_unit" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Pur.unit</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="rateObj.purchase_unit" @keydown="getUnitPopup($event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">con.factor</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="rateObj.conversion_factor">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-4" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Item weight</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="rateObj.item_weight" @keydown="add_ob($event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Basic rate</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="rateObj.rate" @keydown="add_ob($event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">discount</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="rateObj.discount" @keydown="add_ob($event)">
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-4" @keydown="getCurrencyPopup($event)" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Currency</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="rateObj.currency">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Exch rate</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="rateObj.exchange_rate" disabled>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getTaxPopup($event)" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Tax*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" class="form-control" v-model="rateObj.tax_name">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="rateObj.tax_value" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-6" >
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Qnt No</label>
                                        <div class="col-8 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="rateObj.quatation_no">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-6" >
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Qtn date</label>
                                        <div class="col-8 input-group">
                                            <input autocomplete="off" class="form-control" type="date"  v-model="rateObj.quatation_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
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
                                    <th scope="col">supplier Name</th>
                                    <th scope="col">Part No</th>
                                    <th scope="col">Qtn No</th>
                                    <th scope="col">Qtn date</th>
                                    <th scope="col">Stock Unit</th>
                                    <th scope="col">Purchase Unit</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Con.factor</th>
                                    <th scope="col">Item Wieght</th>
                                    <th scope="col">Default rate</th>
                                    <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(d,index) in rates" class="clickable" >
                                        <td scope="row">@{{index+1}}</td>
                                        <td @click="selectOb(d)">
                                            @{{d.supplier_name}}
                                        </td>
                                        <td @click="selectOb(d)">
                                            @{{d.part_no}}
                                        </td>
                                        <td @click="selectOb(d)">
                                             @{{d.quatation_no}} 
                                        </td>
                                        <td @click="selectOb(d)">
                                            @{{d.quatation_date == '0000-00-00' ? '' : d.quatation_date}} 
                                        </td>
                                        <td @click="selectOb(d)">
                                             @{{d.stock_unit}} 
                                        </td>
                                        <td @click="selectOb(d)">
                                             @{{d.purchase_unit}} 
                                        </td>
                                        <td @click="selectOb(d)">
                                             @{{d.rate}} 
                                        </td>
                                        <td @click="selectOb(d)">
                                             @{{d.conversion_factor}} 
                                        </td>
                                        <td @click="selectOb(d)">
                                             @{{d.item_weight}} 
                                        </td>

                                        
                                        <td>
                                            
                                            <input type="checkbox" name="default" id="default_rate" v-model="d.is_default" @change ="checkDefault(d, d.is_default)">
                                        </td>
                                        <td>
                                            <a  class="action-icon " @click="deleteRow(index)"><i class="fa fa-trash-o tx-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                    <!-- <tr>
                                        <td></td>
                                        <td> <input class="form-control"  v-model="assortment.no_of_box_per_box"></td>
                                        <td> <input class="form-control"  v-model="assortment.no_of_box_per_box"></td>
                                    </tr> -->
                                </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                    
                </div><!-- card-body -->
                <div class="card-footer ">
                    <div class="row order-ft">
                       
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-md-6 mg-t-5" v-if="!print_flag && !update_flag">
                                <button class="btn btn-primary btn-block " @click="save_rate()">Save</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-6 mg-t-5" v-if="!print_flag && update_flag">
                                <button class="btn btn-primary btn-block " @click="save_rate()">Update</button>
                        </div>
                        
                        <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5" >
                                <button class="btn btn-secondary btn-block " @click="clear_rate()">Cancel</button>
                        </div>
                    </div>
                    
                </div>

            </div><!-- card-->
        </div><!-- col -->
        
      </div><!-- row row-xs -->

        <div class="modal fade" id="SupplierPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :id="'section'"
                            :table="'costomers'" 
                            :fields="['id','name','customer_code']" 
                            :search_filed="'name'" 
                            :where_field="'type'"
                            :where_value="'vendor'"
                            @selected="getSupplier($event)"
                            ></choose-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- modal end -->

        <div class="modal fade" id="taxPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :id="'section'"
                            :table="'lookup_masters'" 
                            :fields="['id','lookup_value','lookup_description','genaral_value']" 
                            :search_filed="'lookup_value'" 
                            :where_field="'lookup_key'"
                            :where_value="'TAX'"
                            @selected="getTax($event)"
                            ></choose-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- yarn popup modal end -->

        <div class="modal fade" id="currencyPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :id="'section'"
                            :table="'lookup_masters'" 
                            :fields="['id','lookup_value','lookup_description','genaral_value']" 
                            :search_filed="'lookup_value'" 
                            :where_field="'lookup_key'"
                            :where_value="'CURRENCY'"
                            @selected="getCurrency($event)"
                            ></choose-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- yarn popup modal end -->

        <div class="modal fade" id="unitPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :id="'section'"
                            :table="'lookup_masters'" 
                            :fields="['id','lookup_value','lookup_description']" 
                            :search_filed="'lookup_value'" 
                            :where_field="'lookup_key'"
                            :where_value="'UNIT'"
                            @selected="getUnit($event)"
                            ></choose-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- yarn popup modal end -->
       
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
           assortment:{},
           errors:[],
           shades : [],
           selected_customer : {},
           update_flag : false,
           print_flag : false,
           url :'',
           rates : [
                
            ],
           rateObj : {
                part_no : '',
                item_name:'',
                supplier_code :'',
                supplier_name : '',
                tax_code: '',
                tax_value: '',
                tax_name: '',
                currency: '',
                exchange_rate: '',
                stock_unit : '',
                purchase_unit : '',
            },
           item_ob : {sl_no : 1, shade_code:'', colour: ''},
           no_of_shades : 1,
           selected_obj : {},
           removeFlag : false,
           selected_file : '',
           indent_section : '',
            indent_section_description : '',
            indent_details : {},
            
       },
       watch:{
        no_of_shades(val){
            if(this.removeFlag){
                this.removeFlag = false;
                return;
            }
            this.assortment_shades = [];
            var vm = this;
            var nmbr = parseInt(val);
            if(nmbr == 0){
                return;
            }
            var i =1;
            for( i; i <= nmbr; i++){
                this.assortment_shades.push({sl_no:i,shade_code:'',colour:''})
            }

        }
       },
   methods: {
        deleteRow : function(ind){
            this.removeFlag = true;
            this.assortment_shades.splice(ind, 1);
        },
        addRow : function(ind){
            this.removeFlag = true;
            var last_obj = this.assortment_shades[this.assortment_shades.length - 1]
            this.items.push({id: '' , part_no:'',name:''});
        },
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         create_item: function(){
                     $("#addItem").modal('toggle');
           
         },
         getCostomerEvent(val){
            this.selected_customer = val;
            this.assortment.customer_name = val.name;
            this.assortment.customer_code =val.short_name;
            this.assortment.customer_id =val.id;

            $("#chooseCustomer").modal('toggle');
         },
         getUnitPopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#unitPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
        getUnit : function(event){
             console.log(event)
             this.rateObj.purchase_unit = event.lookup_value;
             this.rateObj.purchase_unit_id = event.id;

            // if(event.code == 'F1' || event.code == 'F2'){
                $("#unitPopup").modal('toggle');
                // this.get_article_by_number();
            // }
        },
        getTaxPopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#taxPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
         
        getTax : function(event){
             console.log(event)
             this.rateObj.tax_code = event.lookup_value;
             this.rateObj.tax_value = event.genaral_value;
             this.rateObj.tax_name = event.lookup_description;

            // if(event.code == 'F1' || event.code == 'F2'){
                $("#taxPopup").modal('toggle');
                // this.get_article_by_number();
            // }
        },
        getCurrencyPopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#currencyPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
         
        getCurrency : function(event){
             console.log(event)
             this.rateObj.currency = event.lookup_value;
             this.rateObj.exchange_rate = event.genaral_value;

            // if(event.code == 'F1' || event.code == 'F2'){
                $("#currencyPopup").modal('toggle');
                // this.get_article_by_number();
            // }
        },
         keyEvent : function(event){
             console.log(event)
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#chooseCustomer").modal('toggle');
            // }
        },
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
            vm.rateObj.part_no = val.part_no;
            vm.rateObj.item_name = val.name;
            vm.rateObj.item_id = val.id;
            vm.rateObj.stock_unit = val.unit;
            vm.rateObj.stock_unit_id = val.unit_id;
            if(this.check_item_in_items(val.id)){
                alert('duplicate item');
                return;
            }
            axios.get('/company/rateByItem/'+val.id).then((response) => {
                vm.rates = response.data;
                $("#itemPopup").modal('toggle');

            }, (error) => {
                // vm.errors = error.errors;
            });
                // vm.items.push(vm.item_ob)
            
        },
        getSupplierPopup : function(event, obj){
            this.selected_obj = obj;
             console.log('selected_obj',this.selected_obj)
             this.$refs.itemPop.$refs.search.focus();
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#SupplierPopup").modal('toggle');
            // }
        },
        getSupplier : function(val){
            var vm = this;
            vm.rateObj.supplier_code = val.customer_code;
            vm.rateObj.supplier_name = val.name;
            vm.rateObj.supplier_id = val.id;
            // vm.items.push(vm.item_ob)
            if(this.check_item_in_items(val.id)){
                    alert('duplicate item');
                    return;
                }
            $("#SupplierPopup").modal('toggle');
        },
        add_ob : function(event){

            var vm = this;

            if(event.code == 'Enter' && !vm.update_flag){
                console.log(this.check_item_in_items(vm.rateObj.item_id, vm.rateObj.supplier_code),'trueeee')
                if(this.check_item_in_items(vm.rateObj.item_id, vm.rateObj.supplier_code)){
                    alert('duplicate rate');
                    return;
                }
                if(! vm.rateObj.tax_value){
                    alert('please provide tax');
                    return;
                }
                if(vm.rateObj.stock_unit != vm.rateObj.purchase_unit){

                    if(! vm.rateObj.conversion_factor){
                        alert('please provide conversion_factor');
                        return;
                    }
                }
                vm.rates.push(vm.rateObj);
                   vm.clearRate();
                    
            } else if(event.code == 'Enter' && vm.update_flag){

                this.rates.forEach(function(rate){
                    if(rate.item_id === vm.rateObj.item_id && rate.supplier_code == vm.rateObj.supplier_code){
                        rate = vm.rateObj;
                    }
                });
            }
        },
        clearRate(){
                    var vm = this;

                    var oldRate = vm.rateObj;
                    vm.rateObj = {
                        part_no : oldRate.part_no,
                        item_name:oldRate.item_name,
                        item_id : oldRate.item_id,
                        supplier_code :'',
                        supplier_name : '',
                        tax_code: '',
                        tax_value: '',
                        tax_name: '',
                        currency: '',
                        exchange_rate: '',
                        stock_unit : oldRate.stock_unit,
                        stock_unit_id : oldRate.stock_unit_id,
                        purchase_unit : '',
                    };
                    
        },
        clear_rate(){
            var vm = this;

            var oldRate = vm.rateObj;
            vm.rateObj = {
                part_no : '',
                item_name:'',
                item_id : '',
                supplier_code :'',
                supplier_name : '',
                tax_code: '',
                tax_value: '',
                tax_name: '',
                currency: '',
                exchange_rate: '',
                stock_unit : '',
                stock_unit_id : '',
                purchase_unit : '',
            };
            vm.rates = [];
        },
        check_item_in_items(check_item, supplier){
            console.log(this.items, check_item)
            var valueArr = [];
            valueArr = this.rates.filter(function(item){ return item.item_id == check_item && item.supplier_code == supplier});
            return valueArr.length > 0;
        
        },

        checkDefault(dd,flag){
            var vm = this;
            if(flag){
                 vm.rates.forEach(function(rate){
                    rate.is_default = false;
                    if(rate.item_id === dd.item_id && rate.supplier_code === dd.supplier_code ){
                        rate.is_default = true;
                    } 
                });
            } else {
                vm.rates.forEach(function(rate){

                    rate.is_default = false;

                });
            }
        },
       
        selectCustomer : function(event){
            if(event.code == 'Enter' ){
                $("#chooseCustomer").modal('toggle');
            }
        },
        selectOb : function(obj){
            this.update_flag = !this.update_flag;
            if(this.update_flag){
                this.rateObj = obj;

            } else{
                this.clearRate();

            }
            
        },
         
         /* get item
         **/
         get_item_by:function(id){

            var vm = this;
            vm.update_flag = true;
            axios.get('/company/shade/'+id).then((response) => {
                vm.shade = response.data;
                vm.shade.program_code = response.data.code;
                vm.shade.priory = response.data.priority;
                vm.shade.code = response.data.name;
                // vm.shade.customer_name
                // code
                // colour
                // priory
                // program_code
                // customer_code

                $("#addItem").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        /*
        get taxes
        **/
        get_colors:function(){

            var vm = this;
            axios.get('/general/lookup?json=true&&key=COLOUR').then((response) => {
            vm.colours = response.data;

            }, (error) => {
            // vm.errors = error.errors;
            });

        },
        clear_indent : function(){
            this.items =  [];
            this.indent =   {
               indent_no : '',
                indent_date:'',
                department :'',
                product_group : '',
                section : '',
                section_des : '',
                family : '',
                family_des : '',
            };
           this.item_ob = {sl_no : 1, shade_code:'', colour: ''},
            this.getIndentNo();

            
        },
        getIndent : function(val){
            if(event.code == 'F1' || event.code == 'F2'){
                $("#IndentPopup").modal('toggle');
                // this.get_article_by_number();
            }
            var vm = this;
            // $("#IndentPopup").modal('toggle');

            // vm.assortment.article_no =val.article_no;
            // vm.assortment.billing_name =val.billing_name;
        },
        onFileChange(e) {
            this.selected_file = e.target.files[0];
            this.url = URL.createObjectURL(this.selected_file);
            
        },
        getIndentNo(){
            axios.get('/company/indent?details=true').then((response) => {
                this.indent_details = response.data;
                var dateObj = new Date();
                var month = dateObj.getUTCMonth() + 1; //months from 1-12
                var day = dateObj.getUTCDate();
                var year = dateObj.getUTCFullYear();

                this.indent.indent_date = day + "-" + month + "-" + year
            }, (error) => {
            // vm.errors = error.errors;
            });
        },
        save_rate:function() {
            var vm = this;
            if(vm.rates.length <= 0){
                alert('please provide any rate')
                return;
            }
            
            axios.post( '/company/rates',vm.rates).then(response => {
                    alert('Succesfully Saved..!');
                console.log(response.data)

            })
            .catch((error)=>{
                console.log('FAILURE!!');
            });
         },
         update_indent:function() {
            axios.put('/company/indent/'+this.indent.id,this.indent)
            .then(response => {
                alert('successfully updated!');
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
         getIndentEdit : function(val){
            var vm = this;
            vm.update_flag = true;
            axios.get('/company/indent/'+val.id).then((response) => {
                this.indent = response.data;
                this.items = response.data.items;
                $("#IndentPopup").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });
        }
     
     },
     
    });
</script>
@endsection