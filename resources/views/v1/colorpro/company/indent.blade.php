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
                        <h5 class="hd">#Purchase Indent </h5> 
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
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getArticle($event)" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Indent No*</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="indent.indent_no">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Indent Date* </label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="indent.indent_date" disabled>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getSectionPopup($event)" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">section*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" class="form-control" v-model="indent.section">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="indent.section_des" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getfamilyPopup($event)" >
                                    <div class="form-group row">
                                        <label class=" col-5 form-control-label">family*</label>
                                        <div class=" col-7 input-group">
                                            <input autocomplete="off" class="form-control" v-model="indent.family">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-12 input-group">
                                            <input autocomplete="off" class="form-control" name="unit" v-model="indent.family_des" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-6" >
                                    <div class="form-group row">
                                        <label class="col-3 form-control-label">Remarks</label>
                                        <div class="col-9 input-group">
                                            <input autocomplete="off" class="form-control" type="text"  v-model="indent.remarks">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-3">
                                    <div class="form-group row">
                                        <a href="#" class="btn btn-white btn-block">Copy Assortment</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div data-label="Sort By" class="df-example demo-forms">
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
                                </div><!-- row -->
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
                                    <th scope="col">Part No *</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">UOM</th>
                                    <th scope="col">Rq date</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">stat</th>
                                    <th scope="col">mode</th>
                                    <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(d,index) in items">
                                        <td scope="row">@{{index+1}}</td>
                                        <td>
                                            @{{d.part_no}}
                                        </td>
                                        <td>
                                             @{{d.name}} 
                                        </td>
                                        <td>
                                             @{{d.qty}} 
                                        </td>
                                        <td>
                                             @{{d.unit}} 
                                        </td>
                                        <td>
                                             @{{d.date}} 
                                        </td>
                                        <td>
                                             @{{d.remark}} 
                                        </td>
                                        <td>
                                             @{{d.status}} 
                                        </td>
                                        <td>
                                             @{{d.mode}} 
                                        </td>

                                        <td>
                                            <a  class="action-icon " @click="deleteRow(index)"><i class="fa fa-trash-o tx-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">#</td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.part_no" @keydown="getItemPopup($event,d)">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.name" disabled>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.qty" @keydown="add_ob($event,d)">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.unit" disabled>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.date" disabled>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.remark" @keydown="add_ob($event,d)">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.status" disabled>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.mode" disabled>
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
                        <div class="col-md-2 col-lg-2 col-sm-6 offset-8 mg-t-5" v-if="print_flag">
                                <button class="btn btn-outline-danger btn-block " @click="downloadPdf()">Print PO</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-md-6 mg-t-5" v-if="!print_flag && !update_flag">
                                <button class="btn btn-primary btn-block " @click="save_indent()">Save</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-6 mg-t-5" v-if="!print_flag && update_flag">
                                <button class="btn btn-primary btn-block " @click="save_indent()">Update</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5" >
                                <button class="btn btn-warning btn-block " @click="clear_article()">Delete</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5" >
                                <button class="btn btn-secondary btn-block " @click="clear_article()">Cancel</button>
                        </div>
                    </div>
                    
                </div>

            </div><!-- card-->
        </div><!-- col -->
        
      </div><!-- row row-xs -->

        <div class="modal fade" id="chooseCustomer" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
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
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :id="'section'"
                            :table="'lookup_masters'" 
                            :fields="['lookup_value','lookup_description']" 
                            :search_filed="'lookup_value'" 
                            :where_field="'lookup_key'"
                            :where_value="'STORE'"
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
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :id ="'family'"
                            :table="'lookup_masters'" 
                            :fields="['lookup_value','lookup_description']" 
                            :search_filed="'lookup_value'" 
                            :where_field="'lookup_key'"
                            :where_value="'PRODUCT FAMILY'"
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
        <div class="modal fade" id="itemPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-item 
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
        <div class="modal fade" id="assortmentPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :table="'assortments'" 
                            :fields="['id','assortment_no','assortment_name']" 
                            :search_filed="'assortment_no'" 
                            @selected="getAssortmentByNumber($event)"
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
           assortment:{},
           errors:[],
           shades : [],
           selected_customer : {},
           update_flag : false,
           print_flag : false,
           url :'',
           items : [
               
           ],
           indent : {},
           item_ob : {sl_no : 1, shade_code:'', colour: ''},
           no_of_shades : 1,
           selected_obj : {},
           removeFlag : false,
           selected_file : '',
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
         getSectionPopup : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#sectionPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
         
        getSection : function(event){
             console.log(event)
             this.item.section = val.lookup_value;
            this.item.section_des = val.lookup_description;
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
             this.item.family = val.lookup_value;
            this.item.family_des = val.lookup_description;
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
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#itemPopup").modal('toggle');
            // }
        },
        getItem : function(val){
            var vm = this;
            vm.item_ob = val;
            vm.item_ob.item_id = val.id;
            console.log('val', vm.item_ob);
            // vm.items.push(vm.item_ob)

            $("#itemPopup").modal('toggle');
        },
        add_ob : function(event){
            var vm = this;

            if(event.code == 'Enter' ){
                
                if(! vm.item_ob.unit_id){
                    alert('please provide an item');
                    return;
                }
                if(! vm.item_ob.qty){
                    alert('please provide a quantity');
                    return;
                }
                vm.items.push(vm.item_ob);
                vm.item_ob = {};
            }
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
        clear_article : function(){
            this.assortment = {};
            this.url = '';
            this.assortment_shades = [];
            this.no_of_shades = 1;
            this.update_flag = false;
            this.removeFlag = false;
        },
        getArticleByNumber : function(val){
            var vm = this;
            $("#articlePopup").modal('toggle');

            vm.assortment.article_no =val.article_no;
            vm.assortment.billing_name =val.billing_name;
        },
        onFileChange(e) {
            this.selected_file = e.target.files[0];
            this.url = URL.createObjectURL(this.selected_file);
            
        },
        save_indent:function() {
            var vm = this;
            vm.indent.items = vm.items; 
            axios.post( '/company/indent',vm.indent).then(response => {
                alert('Succesfully Saved..!');
                console.log(response.data)

            })
            .catch((error)=>{
                console.log('FAILURE!!');
            });
         },
         update_assortment:function() {
           console.log(this.article);
            axios.put('/company/article/'+this.article.id,this.article)
            .then(response => {
                alert('successfully updated!');
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
         getAssortmentByNumber : function(val){
            var vm = this;
            vm.update_flag = true;
            axios.get('/company/assortment/?assortment_no='+val.assortment_no).then((response) => {
                this.assortment = response.data;
                this.assortment_shades = response.data.assortment_shades;
                console.log(this.assortment.assortment_shades)
                this.url = response.data.image_url;
                $("#assortmentPopup").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });
        }
     
     },
     mounted(){

     },
     created(){
        this.get_colors();
     }
    });
</script>
@endsection