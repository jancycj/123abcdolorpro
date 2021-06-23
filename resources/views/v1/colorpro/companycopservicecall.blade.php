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
                        <h5 class="hd">#Machine Service Call Registration </h5> 
                    </div> 
                </div>
                
            </div>
        </div>
      <div class="row row-xs">
        <div class="col-lg-12 col-md-12 ">
            <div class="card mg-b-2">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getServiceNoPopUp($event)" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Service Call No</label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control"  v-model="cop_itm.service_no" >
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Service Date </label>
                                <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="cop_itm.service_date" :value="get_service_date()" disabled>
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
                        <div class="col-md-4 col-lg-4 col-sm-6" 
                        @keydown="getCustomerPopup($event)" 
                        
                        >
                            <div class="form-group row">
                                <label class=" col-5 form-control-label">Customer</label>
                                <div class=" col-7 input-group">
                                    <input autocomplete="off" class="form-control" v-model="cop_itm.customer_id">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-6">
                            <div class="form-group row">
                                <div class="col-12 input-group">
                                    <input autocomplete="off" class="form-control" name="unit" v-model="cop_itm.customer_name" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6" >
                        <div class="form-group row">
                                <label class="col-5 form-control-label">Mode of Call* </label>
                                <select  class="standardSelect col-7 form-control"  name="enq_mode"  v-model="cop_itm.enq_mode">
                                        @foreach ($enquiry as $item)
<option value='{{$item->lookup_value}}'  >{{$item->lookup_description}}</option>
                                                 @endforeach    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">M/C SLNo </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="machine_slno" v-model="cop_itm.machine_slno" >
                                </div>
                            </div>
                        </div>
                        </div>
                    
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Commisioned Date </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="commissioned_date" type="date" v-model="cop_itm.commissioned_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Warranty Date </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="warrenty_date" type="date" v-model="cop_itm.warrenty_date" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Report No</label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="service_report_no" v-model="cop_itm.service_report_no" >
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Customer Rep* </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="contact_person" v-model="cop_itm.contact_person">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Phone* </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="contact_no" v-model="cop_itm.contact_no" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Tax Invoice No/Dt </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="gst_invoice_no" v-model="cop_itm.gst_invoice_no" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Complaints </label>
                                <div class="col-7 input-group">
                                <textarea  autocomplete="off" class="form-control" name="cop_itm.complaints" v-model="cop_itm.complaints" cols="25" rows="3"></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Replacement Reason </label>
                                <div class="col-7 input-group">
                                <select  class="standardSelect col-7 form-control"  name="replacement_reason"  v-model="cop_itm.replacement_reason">
                                   
                                   @foreach ($replacemt as $item)
<option value='{{$item->lookup_value}}'  >{{$item->lookup_description}}</option>
                                                @endforeach 
                               </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Amount Paid </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="invoice_total_amount" v-model="cop_itm.invoice_total_amount" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Type of Service </label>
                                <div class="col-7 input-group">
                                <select  class="standardSelect col-7 form-control"  v-model="cop_itm.service_type" name="service_type">
                                                @foreach ($service_type as $item)
<option value='{{$item->lookup_value}}'>{{$item->lookup_description}}</option>
                                                 @endforeach
                                            </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getEmpPopUp($event)">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Assigned Enginner </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="assigned_engineer" v-model="cop_itm.assigned_engineer" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Engineer Name</label>
                                <div class="col-7 input-group">
                                <input autocomplete="off" class="form-control" name="assigned_engineer_name" v-model="cop_itm.assigned_engineer_name" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Assigned Date*  </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="assigned_date" type="date" v-model="cop_itm.assigned_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Attend Date *</label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="attend_date"   type="date" v-model="cop_itm.attend_date" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Mode of Service * </label>
                                <div class="col-7 input-group">
                                <select  class="standardSelect col-7 form-control"  v-model="cop_itm.mode_of_service" name="mode_of_service">
                                                @foreach ($mode_service as $item)
<option value='{{$item->lookup_value}}'>{{$item->lookup_description}}</option>
                                                 @endforeach
                                            </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label"> Completed Date </label>
                                <div class="col-7 input-group">
                                    <input autocomplete="off" class="form-control" name="closed_date" type="date" v-model="cop_itm.closed_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Service Completed </label>
                                <div class="col-7 input-group">
                                    <input type="checkbox" autocomplete="off"   v-model="cop_itm.status" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Mode of Payment </label>
                                <div class="col-7 input-group">
                                <select  class="standardSelect col-7 form-control"  v-model="cop_itm.mode_of_payment" name="mode_of_payment">
                                         <option value=''>--select--</option>
                                                @foreach ($mode_payment as $item)
<option value='{{$item->lookup_value}}'>{{$item->lookup_description}}</option>
                                                 @endforeach
                                            </select>
                                </div>
                            </div>
                        </div>
                    </div>
                            

                </div><!-- card-body -->
                <div class="card-footer ">
                    <div class="row order-ft">
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-md-6 mg-t-5" v-if="!print_flag && !update_flag">
                                <button class="btn btn-primary btn-block " @click="save_copservicecall()">Save</button>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 offset-md-6 mg-t-5" v-if="!print_flag && update_flag">
                                <button class="btn btn-primary btn-block " @click="update_copservicecall()">Update</button>
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

  <div class="modal fade" id="customerPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                    <choose-component :id="'costomers'" :table="'costomers'" :fields="['id','name']" :search_filed="'name'" @selected="getCustomer($event)"></choose-component>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="itemPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                    <choose-component :id="'items'" :table="'items'" :fields="['part_no','name']" :search_filed="'name'" @selected="getItem($event)"></choose-component>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="servicePopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                    <choose-component :id="'items'" :table="'c_o_p_service_calls'" :fields="['service_no']" :search_filed="'service_no'" @selected="getServiceByNum($event)"></choose-component>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EmpPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                    <choose-component :id="'items'" :table="'employees'" :fields="['employee_code','employee_name']" :search_filed="'employee_code'" @selected="getEmpByNum($event)"></choose-component>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

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
           cop_itm:{},
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
            this.article.grey_yarn_no = val.part_no;
            this.article.gray_yarn_code_value = val.name;
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
         save_copservicecall:function() {
         
           
/*
           if(! this.cop_itm.enq_mode){
                    alert('please select Mode of Enquiry');
                    return;
                }

                 if(! this.cop_itm.item_code){
                    alert('please select Itemr');
                    return;
                }
               
                if(! this.cop_itm.customer_id){
                    alert('please select Customer');
                    return;
                }
                if(! this.cop_itm.contact_person){
                    alert('please enter Contact Person');
                    return;
                }
                if(! this.cop_itm.contact_no){
                    alert('please enter Contact No.');
                    return;
                }

                if(! this.cop_itm.complaints){
                    alert('please enter Complaints');
                    return;
                }
                if(! this.cop_itm.assigned_engineer){
                    alert('please enter Assigned Engineer');
                    return;
                }
                if(! this.cop_itm.assigned_date){
                    alert('please enter Assigned Date');
                    return;
                }
                if(! this.cop_itm.attend_date){
                    alert('please enter Attend Date');
                    return;
                }
                if(! this.cop_itm.replacement_reason){
                    alert('please select Replacement Reason');
                    return;
                }
                if(! this.cop_itm.service_type){
                    alert('please select Service Type');
                    return;
                }
                */

              
           axios.post('/company/copservicecall',this.cop_itm).then(response => {
               // this.mir.mir_no = response.data.mir_no;
               // this.mir.mir_date = response.data.mir_date;
                alert('Succesfully Saved..!');
              

            })
            .catch((error)=>{
                 console.log('FAILURE!!');
            });
         },
         update_copservicecall:function() {
           console.log(this.cop_itm);
         
            axios.put('/company/copservicecall/'+this.cop_itm.id,this.cop_itm)
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

        getCustomerPopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                     $("#customerPopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },

            getItemPopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                     $("#itemPopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },

            getServiceNoPopUp: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                     $("#servicePopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },

            getEmpPopUp: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                     $("#EmpPopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },

              getCustomer : function(val){
               console.log(event)
                $("#customerPopup").modal('toggle');
                 var vm = this;
           // vm.cop = val;
            vm.cop_itm.customer_id = val.id;
            vm.cop_itm.customer_name = val.name;
          
            },

            getItem : function(val){
               console.log(event)
                $("#itemPopup").modal('toggle');
                 var vm = this;
           // vm.cop = val;
            vm.cop_itm.item_code = val.part_no;
            vm.cop_itm.item_desc = val.name;
          
            },
            getEmpByNum : function(val){
               console.log(event)
                $("#EmpPopup").modal('toggle');
                 var vm = this;
          
            vm.cop_itm.assigned_engineer = val.employee_code;
            vm.cop_itm.assigned_engineer_name = val.employee_name;
          
            },
        get_service_date:function(){
               
               var dateObj = new Date();
               var month = dateObj.getUTCMonth() + 1; //months from 1-12
               var day = dateObj.getUTCDate();
               var year = dateObj.getUTCFullYear();

               this.cop_itm.service_date = day + "-" + month + "-" + year
           },
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
        getServiceByNum : function(val){
            var vm = this;
            vm.update_flag = true;
            alert(val.service_no);
            axios.get('/company/copservicecall/?service_no='+val.service_no).then((response) => {
            vm.cop_itm = response.data;
            alert(response.data);
            $("#servicePopup").modal('toggle');
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