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
                        <h5 class="hd">#BOM - Bill of Material Entry </h5> 
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
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getParentItemPopup($event)" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Parent Part No*</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="bom.parent_item" name="parent_item" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <div class="form-group row">
                                    <div class="col-12 input-group">
                                    <input autocomplete="off" class="form-control"  v-model="bom.parent_name" name="parent_name" disabled>
                                </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6"  >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">Parent Part Quantity</label>
                                        <div class=" col-7 input-group">
                                        <input autocomplete="off" class="form-control" v-model="bom.parent_qty" name="parent_qty">
                                            <input autocomplete="off" class="form-control" v-model="bom.parent_type" type="hidden" name="parent_type">
                                            <input autocomplete="off" class="form-control" v-model="bom.parent_item_id" type="hidden" name="parent_item_id">
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
                                    <th scope="col">Child Part No *</th>
                                    <th scope="col">Child Part Name</th>
                                    <th scope="col">UOM</th>
                                    <th scope="col">Child Qty</th>
                                    <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(d,index) in items">
                                        <td scope="row">@{{index+1}}</td>
                                        <td>
                                            @{{d.child_item}}
                                        </td>
                                        <td>
                                         
                                        </td>
                                        
                                        <td>
                                           
                                        </td>
                                        <td>
                                            @{{d.child_qty}} 
                                        </td>
                                        <td>
                                            <a  class="action-icon " @click="deleteRow(index)"><i class="fa fa-trash-o tx-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">#</td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.child_item" name="item_ob.child_item" @keydown="getItemPopup($event)">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.child_name" disabled>
                                        </td>
                                        
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.child_uom" @keydown="getUnitPopup($event)">
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.child_type" type="hidden" @keydown="getUnitPopup($event)">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.child_qty" @keydown="add_ob($event)">
                                        </td>
                                        <td>
                                            #
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
                                <button class="btn btn-primary btn-block " @click="save_indent()">Save</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-6 mg-t-5" v-if="!print_flag && update_flag">
                                <button class="btn btn-primary btn-block " @click="update_indent()">Update</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5" >
                                <button class="btn btn-secondary btn-block " @click="clear_indent()">Cancel</button>
                        </div>
                    </div>
                    
                </div>

            </div><!-- card-->
        </div><!-- col -->
        
      </div><!-- row row-xs -->

        <div class="modal fade" id="chooseCustomer" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-customer @customer="getCostomerEvent($event)"></choose-customer>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- modal end -->

        <div class="modal fade" id="sectionPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
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
                            :where_value="'DEPARTMENT'"
                            @selected="getSection($event)"
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
        <div class="modal fade" id="familyPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :id ="'family'"
                            :table="'lookup_masters'" 
                            :fields="['id','lookup_value','lookup_description']" 
                            :search_filed="'lookup_value'" 
                            :where_field="'lookup_key'"
                            :where_value="'PRODUCT FAMILY'"
                            @selected="getFamily($event)"
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

  
<div class="modal fade" id="ParentItemPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">

                        <div class="card-body card-block">
                        <choose-component :id="'items'" :table="'items'" :fields="['id','part_no','name','part_type']" :search_filed="'name'" @selected="getParentByNum($event)"></choose-component>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                    </div>
            </div>
        </div>
</div>
        
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
        <div class="modal fade" id="unitPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                    <choose-component :id="'units'" :table="'lookup_masters'" :fields="['id','lookup_value','lookup_description']" :search_filed="'lookup_value'" :where_field="'lookup_key'" :where_value="'UNIT'" @selected="getUnit($event)"></choose-component>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
        <div class="modal fade" id="IndentPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :id="'indents'"
                            :table="'indents'" 
                            :fields="['id','indent_no','department']" 
                            :search_filed="'indent_no'" 
                            @selected="getIndentEdit($event)"
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
           bom : {},
           assortment:{},
           errors:[],
           shades : [],
           selected_customer : {},
           update_flag : false,
           print_flag : false,
           url :'',
           items : [ ],
           indent : {
               indent_no : '',
                indent_date:'',
                department :'',
                product_group : '',
                section : '',
                section_des : '',
                family : '',
                family_des : '',
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
            alert('in addrow');
            this.removeFlag = true;
            var last_obj = this.assortment_shades[this.assortment_shades.length - 1]
        //   this.items.push({id: '' , part_no:'',name:''});
          
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
         getSectionPopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#sectionPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
         
        getSection : function(event){
             console.log(event)
             this.indent.section = event.lookup_value;
             this.indent.department = event.id;
            this.indent.section_des = event.lookup_description;
            this.indent_section = event.lookup_value;
            this.indent_section_description = event.lookup_description;

            // if(event.code == 'F1' || event.code == 'F2'){
                $("#sectionPopup").modal('toggle');
                // this.get_article_by_number();
            // }
        },
        getFamilyPopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#familyPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
         
        getFamily : function(event){
             console.log(event)
             this.indent.family = event.lookup_value;
            this.indent.family_des = event.lookup_description;
            this.indent.product_group = event.id;

            // if(event.code == 'F1' || event.code == 'F2'){
                $("#familyPopup").modal('toggle');
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
            vm.item_ob = val;
            vm.item_ob.child_item = val.part_no;
            vm.item_ob.child_name = val.name;
            vm.item_ob.child_type = val.part_type;
            vm.item_ob.child_uom = val.unit;
            vm.item_ob.child_item_id = val.id;
            alert(val.id);
            console.log('val', vm.item_ob);
            // vm.items.push(vm.item_ob)
           /* if(this.check_item_in_items(val.id)){
                    alert('duplicate item');
                    return;
                }*/
            $("#itemPopup").modal('toggle');
            alert('nnnn');
        },
        add_ob : function(event){

            var vm = this;

            if(event.code == 'Enter' ){
                alert("after enter");
             //   console.log(this.check_item_in_items(vm.item_ob.item_id),'trueeee')
                /*if(this.check_item_in_items(vm.item_ob.item_id)){
                    alert('duplicate item');
                    return;
                }
                if(! vm.item_ob.unit_id){
                    alert('please provide an item');
                    return;
                }
                if(! vm.item_ob.child_qty){
                    alert('please provide a quantity');
                    return;
                }*/
                alert(vm.item_ob.child_item);
              vm.items.push(vm.item_ob);
            alert('aaa');
               vm.item_ob = {};
               alert('end enter');
            }
        },
        check_item_in_items(check_item){
            alert('check');
            console.log(this.items, check_item)
            var valueArr = [];
            valueArr = this.items.filter(function(item){ return item.item_id == check_item });
            return valueArr.length > 0;
        
        },
       
        selectCustomer : function(event){
            if(event.code == 'Enter' ){
                $("#chooseCustomer").modal('toggle');
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
            this.update_flag = false;
            this.print_flag = false;
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
       
        getParentItemPopup : function(event, obj){
          
            if(event.code == 'F1' || event.code == 'F2'){
                $("#ParentItemPopup").modal('toggle');
                // this.get_article_by_number();
               // alert(123);
            }
            var vm = this;
            // $("#IndentPopup").modal('toggle');

            // vm.assortment.article_no =val.article_no;
            // vm.assortment.billing_name =val.billing_name;
        },
        
        getParentByNum : function(val){
           // this.selected_customer = val;
          // alert(val.part_no);
           // console.log(event);
           // $("#ParentItemPopup").modal('toggle');


            var vm = this;
           vm.bom.parent_item = val.part_no;
            vm.bom.parent_name = val.name;
            vm.bom.parent_type = val.part_type;
            vm.bom.parent_item_id = val.id;
alert(val.part_no+' '+val.id+'' +vm.bom.parent_item);
           /* axios.get('/company/bomentry/'+val.part_no).then((response) => {
                alert(response.data);
                //document.write(response.data);

             if ($.trim(response.data) != ''){
                 vm.update_flag = true;
                  vm.save_flag = false;

             }
                 console.log(response.data);
              //  vm.bom = response.data;
                this.items = response.data.items;
            
             
             
             // alert(response.data.items);
            }, (error) => {
             vm.errors = error.errors;
            });*/
            //$("#ParentItemPopup").modal('toggle');
         },

         getUnitPopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                    $("#unitPopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },
            getUnit: function(ev) {
                console.log(ev)
                this.item_ob.unit = ev.lookup_value;
                $("#unitPopup").modal('toggle');

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
        save_indent:function() {
            var vm = this;
            vm.bom.items = vm.items; 
            alert(this.bom.items.id);
            axios.post('/company/bomentry',this.bom).then(response => {
              //  this.indent.indent_no = this.indent_details.prefix_string+ (parseInt(this.indent_details.last_value+1));
                alert('Succesfully Saved..!');
                alert(response.data);
                document.write(response.data);
                console.log(response.data);
              
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
     mounted(){
      // this.getIndentNo();
     },
     created(){
        this.get_colors();
     }
    });
</script>
@endsection