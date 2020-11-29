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
                        <h5 class="hd">#Article Master</h5> 
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
                                    <input class="form-control"  v-model="article.article_no">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Billing Name* </label>
                                <div class="col-7 input-group">
                                    <input class="form-control"  v-model="article.billing_name">
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
                        <div class="col-4" 
                        @keydown="keyEvent($event)" 
                        
                        >
                            <div class="form-group row">
                                <label class=" col-5 form-control-label">Customer</label>
                                <div class=" col-7 input-group">
                                    <input class="form-control" v-model="article.customer_code">
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group row">
                                <div class="col-12 input-group">
                                    <input class="form-control" name="unit" v-model="article.customer_name" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" @keydown="chooseCount($event)">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Count 1</label>
                                <div class="col-7 input-group">
                                    <input class="form-control"  v-model="article.count">
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group row">
                                <div class="col-12 input-group">
                                    <input class="form-control" name="unit" v-model="article.count1_value" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">WBC </label>
                                <select data-placeholder="Select master" class="standardSelect col-7 form-control" tabindex="1" name="unit"  v-model="article.wbc">
                                    <option :value="colour.lookup_value" v-for="colour in colours">@{{colour.lookup_value}}</option>
                                        
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"  @keydown="chooseCount2($event)">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Count 2 </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.count1">
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group row">
                                <div class="col-12 input-group">
                                    <input class="form-control" name="unit" v-model="article.count2_value" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Assortment Y/N </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.assortment_yn">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Thread Quality </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.thread_qlty">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Assert Name </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.assert_name" >
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Cops/Trays </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.no_of_cop_per_tray" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Weight Factor* </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.weight_factor">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Length (Mtr) </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.length" >
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Cops/Trays Line </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.no_cops_per_tray_line" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">No of Boxes/ Carton* </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.no_box">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Weight (Gm) </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.weight" >
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Std Prod/8 Hrs </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.std_prod" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">No of Tube Per Box* </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.no_tube_per_box">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Gauge </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.gauge" >
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">No Of Spindles </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.no_of_spindle" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Carton No  </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.carton_no">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Max Length (Mts) </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.max_length" >
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Box/G2Y </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.box_per_g2y" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">CLU/Box </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.clu">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Min Length (Mts) </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.min_length" >
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Color Code </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.color_code" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">CLU/Carton </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.clu_per_carton">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">TKT </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.tkt" >
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Default process </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="hsn" v-model="article.default_process" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" @keydown="threadPopup($event)" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Thread Type </label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.thread_type">
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group row">
                                <div class="col-12 input-group">
                                    <input class="form-control" name="unit" v-model="article.thread_type_value" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5" @keydown="yarnPopup($event)">
                            <div class="form-group row">
                                <label class="col-4 form-control-label">Gray Yarn Code</label>
                                <div class="col-8 input-group">
                                    <input class="form-control" name="unit" v-model="article.grey_yarn_no">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <div class="col-12 input-group">
                                    <input class="form-control" name="unit" v-model="article.gray_yarn_code_value" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">No Of Cops / Chees</label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.no_of_cops_chees">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">New Article No: / Chees</label>
                                <div class="col-7 input-group">
                                    <input class="form-control" name="unit" v-model="article.article_no_chees">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- card-body -->
                <div class="card-footer ">
                    <div class="row order-ft">
                        <div class="col-2 offset-8 mg-t-5" v-if="print_flag">
                                <button class="btn btn-outline-danger btn-block " @click="downloadPdf()">Print PO</button>
                        </div>
                        <div class="col-2 offset-6 mg-t-5" v-if="!print_flag && !update_flag">
                                <button class="btn btn-primary btn-block " @click="save_article()">Save</button>
                        </div>
                        <div class="col-2 offset-6 mg-t-5" v-if="!print_flag && update_flag">
                                <button class="btn btn-primary btn-block " @click="update_article()">Update</button>
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
        <div class="modal fade" id="chooseArticle" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <!-- <choose-article @customer="getCostomerEvent($event)"></choose-article> -->
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- modal end -->

        <div class="modal fade" id="chooseComponent" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :table="'lookup_masters'" 
                            :fields="['lookup_value','lookup_description']" 
                            :search_filed="'lookup_value'" 
                            :where_field="'lookup_key'"
                            :where_value="'COLOUR'"
                            @selected="getCount1($event)"
                            ></choose-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- choose count 1modal end -->

        <div class="modal fade" id="chooseCount2" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :table="'lookup_masters'" 
                            :fields="['lookup_value','lookup_description']" 
                            :search_filed="'lookup_value'" 
                            :where_field="'lookup_key'"
                            :where_value="'COLOUR'"
                            @selected="getCount2($event)"
                            ></choose-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- choose count 2 modal end -->
        <div class="modal fade" id="threadPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :table="'lookup_masters'" 
                            :fields="['lookup_value','lookup_description']" 
                            :search_filed="'lookup_value'" 
                            :where_field="'lookup_key'"
                            :where_value="'COLOUR'"
                            @selected="getThread($event)"
                            ></choose-component>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="save_item()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- thread popup modal end -->
        <div class="modal fade" id="yarnPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :table="'lookup_masters'" 
                            :fields="['lookup_value','lookup_description']" 
                            :search_filed="'lookup_value'" 
                            :where_field="'lookup_key'"
                            :where_value="'COLOUR'"
                            @selected="getYarn($event)"
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
        <div class="modal fade" id="articlePopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :table="'articles'" 
                            :fields="['article_no','assortment_yn']" 
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
           article:{},
           errors:[],
           colours : [],
           shades : [],
           selected_customer : {},
           update_flag : false,
           print_flag : false,
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
            this.article.customer_name = val.name;
            this.article.customer_code =val.short_name;
            this.article.customer_id =val.id;

            $("#chooseCustomer").modal('toggle');
         },
         getCount1(val){
            this.article.count = val.lookup_value;
            this.article.count1_value = val.lookup_value;
            
            $("#chooseComponent").modal('toggle');
         },
         getCount2(val){
            this.article.count1 = val.lookup_value;
            this.article.count2_value = val.lookup_value;

            $("#chooseCount2").modal('toggle');
         },
         getThread(val){
            this.article.thread_type = val.lookup_value;
            this.article.thread_type_value = val.lookup_value;
            $("#threadPopup").modal('toggle');
         },
         getYarn(val){
            this.article.grey_yarn_no = val.lookup_value;
            this.article.gray_yarn_code_value = val.lookup_value;
            $("#yarnPopup").modal('toggle');
         },
         getArticle : function(event){
             console.log(event)
            if(event.code == 'F1' || event.code == 'F2'){
                $("#articlePopup").modal('toggle');
                // this.get_article_by_number();
            }
        },
         keyEvent : function(event){
             console.log(event)
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#chooseCustomer").modal('toggle');
            // }
        },
        chooseCount : function(event){
             console.log(event)
            // if(event.code == 'F2' || event.code == 'F4'){
                $("#chooseComponent").modal('toggle');
            // }
        },
        chooseCount2 : function(event){
             console.log(event)
            // if(event.code == 'F2' || event.code == 'F4'){
                $("#chooseCount2").modal('toggle');
            // }
        },
        threadPopup : function(event){
             console.log(event)
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#threadPopup").modal('toggle');
            // }
        },
        yarnPopup : function(event){
             console.log(event)
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#yarnPopup").modal('toggle');
            // }
        },
        selectCustomer : function(event){
            if(event.code == 'Enter' ){
                $("#chooseCustomer").modal('toggle');
            }
        },
         save_article:function() {
           console.log(this.article);
            axios.post('/company/article',this.article)
            .then(response => {
                alert('saved successfully..!')
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
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
            this.article = {};
            vm.update_flag = false;
        },
        getArticleByNumber : function(val){
            var vm = this;
            vm.update_flag = true;
            axios.get('/company/article/?article_no='+val.article_no).then((response) => {
            vm.article = response.data;
            $("#articlePopup").modal('toggle');
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