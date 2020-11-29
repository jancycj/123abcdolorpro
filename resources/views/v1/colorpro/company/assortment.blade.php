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
    </style>
@endsection
@section('content')
<div class="content content-fixed">
    <div class="container pd-5">
        <div class="import-sec-white mg-b-5">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <div>
                    <div >
                        <h5 class="hd">#Assortment Master</h5> 
                    </div> 
                </div>
                
            </div>
        </div>
      <div class="row row-xs">
        <div class="col-lg-12 col-md-12 ">
            <div class="card mg-b-2">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-4" @keydown="getArticle($event)" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Article*</label>
                                <div class="col-7 input-group">
                                    <input class="form-control"  v-model="assortment.article_no">
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group row">
                                <label class="col-4 form-control-label">Assortment Name* </label>
                                <div class="col-7 input-group">
                                    <input class="form-control"  v-model="assortment.assortment_name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" @keydown="getAssortment($event)" >
                            <div class="form-group row">
                                <label class=" col-5 form-control-label">Assortment*</label>
                                <div class=" col-7 input-group">
                                    <input class="form-control" v-model="assortment.assortment_no">
                                </div>
                            </div>
                        </div>
                        <div class="col-4" 
                        @keydown="keyEvent($event)" 
                        
                        >
                            <div class="form-group row">
                                <label class=" col-5 form-control-label">Customer</label>
                                <div class=" col-7 input-group">
                                    <input class="form-control" v-model="assortment.customer_code">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <div class="col-12 input-group">
                                    <input class="form-control" name="unit" v-model="assortment.customer_name" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5" >
                            <div class="form-group row">
                                <label class="col-4 form-control-label">Billing name</label>
                                <div class="col-7 input-group">
                                    <input class="form-control"  v-model="assortment.billing_name">
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group row">
                                <label class="col-6 form-control-label">New Assertment To Copy </label>
                                <div class="col-6 input-group">
                                    <input class="form-control"  v-model="assortment.count">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">No Of Shades</label>
                                <div class="col-7 input-group">
                                    <input class="form-control" type="number"  v-model="no_of_shades">
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">No Of Cops Per Box</label>
                                <div class="col-7 input-group">
                                    <input class="form-control"  v-model="assortment.no_of_box_per_box">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-3">
                            <div class="form-group row">
                                <a href="#" class="btn btn-white btn-block">Copy Assortment</a>
                            </div>
                        </div> -->
                    </div>
                    
                </div><!-- card-header -->
                <div class="card-body custom-body">
                    <div class="row" v-if="errors.length > 0">
                        <div class="col-12 text-center" v-for="error in errors">
                            <label for="erorr" class="text-danger"> @{{error[0]}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0">
                                <thead>
                                    <tr>
                                    <th scope="col">SiNo</th>
                                    <th scope="col">Shade Code*</th>
                                    <th scope="col">Colour</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="d in assortment_shades">
                                        <th scope="row">@{{d.sl_no}}</th>
                                        <td>
                                            <input class="form-control"  v-model="d.shade_code" @keydown="getShades($event,d)">
                                        </td>
                                        <td>
                                            <input class="form-control"  v-model="d.colour" disabled>
                                        </td>
                                        <td>
                                            <a  class="action-icon " ><i class="fa fa-trash-o tx-danger"></i>
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
                        <div class="col-3">
                            <input type="file" ref="file" @change="onFileChange" style="display: none;"/>
                            <img :src="url == '' ?'/images/upload.png' : url" @click="$refs.file.click()" class="img-thumbnail wd-100p wd-sm-200" alt="Responsive image">
                        </div>
                    </div>
                    
                </div><!-- card-body -->
                <div class="card-footer ">
                    <div class="row order-ft">
                        <div class="col-2 offset-8 mg-t-5" v-if="print_flag">
                                <button class="btn btn-outline-danger btn-block " @click="downloadPdf()">Print PO</button>
                        </div>
                        <div class="col-2 offset-6 mg-t-5" v-if="!print_flag && !update_flag">
                                <button class="btn btn-primary btn-block " @click="save_assortment()">Save</button>
                        </div>
                        <div class="col-2 offset-6 mg-t-5" v-if="!print_flag && update_flag">
                                <button class="btn btn-primary btn-block " @click="update_assortment()">Update</button>
                        </div>
                        <div class="col-2  mg-t-5" >
                                <button class="btn btn-warning btn-block " @click="clear_article()">Delete</button>
                        </div>
                        <div class="col-2  mg-t-5" >
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

        <div class="modal fade" id="articlePopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :table="'articles'" 
                            :fields="['article_no','billing_name']" 
                            :search_filed="'article_no'" 
                            @selected="getArticleByNumber($event)"
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
        <div class="modal fade" id="shadePopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :table="'shades'" 
                            :fields="['id','name','colour']" 
                            :search_filed="'name'" 
                            @selected="addShadeToArray($event)"
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
           assortment_shades : [
               {sl_no : 1, shade_code:'', colour: ''}
           ],
           no_of_shades : 1,
           selected_obj : {},
       },
       watch:{
        no_of_shades(val){
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
         getAssortment : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#assortmentPopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
         
         getArticle : function(event){
             console.log(event)
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#articlePopup").modal('toggle');
                // this.get_article_by_number();
            // }
        },
         keyEvent : function(event){
             console.log(event)
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#chooseCustomer").modal('toggle');
            // }
        },
        getShades : function(event, obj){
            this.selected_obj = obj;
             console.log('selected_obj',this.selected_obj)
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#shadePopup").modal('toggle');
            // }
        },
        addShadeToArray : function(val){
            console.log(val);
            var vm = this;
            vm.selected_obj.shade_code = val.name;
            vm.selected_obj.colour = val.colour;
            vm.selected_obj.shade_id = val.id;
            var result = vm.assortment_shades.map(function(a) {
                if(a.sl_no === vm.selected_obj.sl_no){
                    a = vm.selected_obj;
                };
            });
            $("#shadePopup").modal('toggle');
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
            this.url = {};
            this.assortment_shades = [];
            vm.update_flag = false;
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
        save_assortment:function() {
            this.assortment.image_url = this.url;
            this.assortment.no_of_shades = this.no_of_shades;
            this.assortment.assortment_shades = this.assortment_shades;
            let formData = new FormData();
            formData.append('file', this.selected_file);
            formData.append('assortment',JSON.stringify(this.assortment));
            axios.post( '/company/assortment',
            formData,
            {
                headers: {
                'Content-Type': 'multipart/form-data'
                },
                onUploadProgress:  progressEvent=> {
                // this.upload_status = true;
               console.log(Math.round(  progressEvent.loaded / progressEvent.total * 100 ));
                }
            }
            ).then(response => {
                console.log(response.data)

            })
            .catch((error)=>{
                console.log('FAILURE!!');
            });
         },
         update_article:function() {
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