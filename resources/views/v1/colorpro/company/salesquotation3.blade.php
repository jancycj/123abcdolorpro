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
                        <h5 class="hd">#Sales Quotation </h5> 
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
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getQuote($event)" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Quote No*</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="sal_qot.quote_no" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Quote Date* </label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="sal_qot.quote_date" disabled>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>


           <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6" 
                        @keydown="getCustomerPopup($event)" 
                        
                        >
                            <div class="form-group row">
                                <label class=" col-5 form-control-label">Customer</label>
                                <div class=" col-7 input-group">
                            <input autocomplete="off" class="form-control" v-model="sal_qot.customer_id">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-6">
                            <div class="form-group row">
                                <div class="col-12 input-group">
                                  <input autocomplete="off" class="form-control" name="unit" v-model="sal_qot.customer_name" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                          <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getEnquiryPopup($event)" >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Enquiry No*</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="sal_qot.enquiry_no" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Enquiry Date* </label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="sal_qot.enquiry_date" disabled>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
  <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Contact Person </label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.contact_person">
                                </div>
                            </div>
                        </div>
                         <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Contact No</label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.contact_no">
                                </div>
                            </div>
                        </div>
                       
                    </div>

                         
                          <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6"  >
                                    <div class="form-group row">
                                        <label class="col-5 form-control-label">Prepared_by</label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="sal_qot.prepared_by" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-4 form-control-label">Authorized by </label>
                                        <div class="col-7 input-group">
                                            <input autocomplete="off" class="form-control"  v-model="sal_qot.authorized_by" >
                                        </div>
                                    </div>
                                </div>
                                
                            </div>


                             <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">GST Tariff </label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.gst_tariff">
                                </div>
                            </div>
                        </div>
                        

                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getCurrencyPopup($event)" >
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Currency </label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.currency">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Exchange Rate</label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.exchange_rate">
                                </div>
                            </div>
                        </div>
                                             
                    </div>

                <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">TCS % </label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.tcs_perc">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">TCS Amount</label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.tcs_amount">
                                </div>
                            </div>
                        </div>
                       
                    </div>


              

                    <div class="row">
                     
                        
                            <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label"> Performa no </label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.performa_no">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Performa Date</label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" type="date"  class="form-control" v-model="sal_qot.performa_date">
                                </div>
                            </div>
                        </div>
                       
                    </div>

               

                       <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Customer order no </label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.customer_order_no">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label"> Customer Order Date </label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" type="date" class="form-control" v-model="sal_qot.customer_order_date">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">status</label>
                                 <select  class="standardSelect col-7 form-control"  name="status"  v-model="sal_qot.status">
                                       <option value='active' selected>active</option>
                                       <option value='pending'>pending</option>
                                       <option value='completed'>completed</option>
                                       <option value='processing'>processing</option>
                                       <option value='accepted'>accepted</option>
                                       <option value='inactive'>inactive</option>
                                       <option value='closed'>closed</option>
                                       <option value='short_closed'>short_closed</option>
                                       
                               </select>
                            </div>
                        </div>
                       
                    </div>

                       
                        </div>
                     
                    </div>
                    
                    
                </div><!-- card-header -->
                <div class="card-body custom-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-dashboard mg-b-0">
                        <thead>
                            <tr>
                                <th class="">Part No</th>
                                <th class="">Name</th>
                                <th class="">Need.Date</th>
                                <th class="">Quantity</th>
                                <th class="">Unit</th>
                                <th class="">Sched</th>
                                <th class="">Rate</th>
                                <th class="">Disc.</th>
                                <th class="">Net Rate</th>
                                <th class="">Amount</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(ord,index) in order_detail_array" :key="ord.id">
                                <td class="tx-medium ">@{{ord.part_no}}</td>
                                <td class="tx-medium ">@{{ord.item}}</td>
                                <td class="tx-medium ">
                                    <span v-if="ord.schedule"> <small class="tx-teal"> Scheduled</small></span> <span v-if="!ord.schedule"><input type="date" class="form-control" v-model="ord.need_by_date"></span>
                            
                                </td>
                                <td class="tx-medium "> <input type="text" class="form-control" v-model="ord.quantity" @keydown="getItemRate($event, ord.item_id,ord.quantity,index)"></td>
                                <td class="tx-medium ">@{{ord.purchase_unit}}</td>
                                <td class="tx-medium "> 
                                    
                                    <span v-if="ord.schedule"> <a href="#" ><i class="fa fa-calendar"></i></a></span> <span v-if="!ord.schedule"></span>
                                </td>
                                <td class="tx-medium tx-primary">@{{ord.rate}}</td>
                                <td class=" tx-teal">- @{{ord.discount}}%</td>
                                <td class=" tx-pink">@{{ord.sub_total}}</td>
                                <td class="tx-medium ">@{{ord.grant_total}}  </td> 
                                <td>
                                    <a  class="action-icon " @click="remove_row(index)"><i class="fa fa-trash-o tx-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tx-medium ">
                                    <input autocomplete="off" class="form-control"  v-model="order_detail_ob.part_no" name="part_no" @keydown="getItemPopup($event)">
                                </td>
                                <td class="tx-medium ">
                                    <input autocomplete="off" class="form-control"  v-model="order_detail_ob.item" disabled>
                                </td>
                                <td class="tx-medium ">
                                    <input type="date" class="form-control" id="inputAddress" placeholder="Date" name="date" v-model="order_detail_ob.need_by_date">
                                </td>
                                <td class="tx-medium ">
                                    <input type="number" class="form-control" id="inputAddress" placeholder="Quantity" name="quantity"  v-model="order_detail_ob.quantity" autocomplete="off" @keydown="add_ob($event)">
                                </td>
                                
                                <td class="tx-medium ">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Unit" name="unit" v-model="order_detail_ob.purchase_unit" disabled>
                                </td>
                                <td class="tx-medium ">
                                    <a  class="btn btn-white  btn-block" @click="make_schedule(1)"><i  :class="order_detail_ob.schedule?'fa fa-calendar-check-o tx-teal':'fa fa-calendar tx-teal'"></i>
                                    </a>
                                </td>
                                <td class="tx-medium tx-primary">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Rate" name="rate" v-model="order_detail_ob.rate" :disabled="!order_flag"  @keydown="add_ob($event)">
                                </td>
                                <td class=" tx-teal">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Discount" name="disc" v-model="order_detail_ob.discount"  @keydown="add_ob($event)">
                                </td>
                                <td class=" tx-pink">
                                    <input type="hidden" :value="add_quantity(order_detail_ob.quantity)"/>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Net" name="net" v-model="order_detail_ob.sub_total" disabled>
                                </td>
                                <td class="tx-medium ">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Total" name="amount" v-model="order_detail_ob.grant_total" disabled>
                                </td> 
                                <td>
                                    #
                                </td>
                            </tr>
                            
                        </tbody>
                        </table>
                    </div><!-- table-responsive -->
                    
                </div><!-- card-body -->
          <div class="card-footer ">
                    <div class="row order-ft">
                 
                      <div class="col-3 ">
                            <div class="form-group">
                                <label for="inputAddress">GST %  &nbsp amount:</label>
                                <div class="input-group">
                                 <input autocomplete="off" class="form-control" v-model="sal_qot.gst_perc" @keydown="getTaxPopup($event)">
                                      <input autocomplete="off" class="form-control" v-model="sal_qot.gst_value">
                                </div>
                            </div>

                        </div>

                       <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">GST Amount:</label>
                                
                                 <input autocomplete="off" class="form-control" v-model="sal_qot.gst_amount">
                            </div>   
                        </div>

   
                      <div class="col-5"></div>
                        <div class="col-2 ">
                            <div class="form-group">
                                    <label for="inputAddress">Basic total:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1222" :value="calculate_basic_total()" disabled>
                            </div>   
                        </div>
                        
                        
                    </div>
                    <div class="row order-ft">
                          
     
                      <div class="col-3 ">
                            <div class="form-group">
                                <label for="inputAddress">P&F %  &nbsp amount:</label>
                                <div class="input-group">
                                    <input type="text" aria-label="First name" class="form-control" v-model="pf_perc" placeholder="0" :disabled="pf_amount != 0">
                                    <input type="text" aria-label="Last name" class="form-control"  v-model="pf_amount"  placeholder="0" :disabled="pf_perc !=0">
                                </div>
                            </div>   
                        </div>
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">Courier Charges:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="amount" v-model="courier_amount">
                            </div>   
                        </div>
                       
                        <div class="col-5"></div>
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">Sub total:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1222" :value="calc_sub_total()" disabled>
                            </div>   
                        </div>
                        
                    </div>
                   
                    <div class="row order-ft">
                       
                        <div class="col-10"></div>
                        <div class="col-2 ">
                            <div class="form-group">
                                <label for="inputAddress">grant total:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="grant_total" :value="get_grant_total()" disabled>
                            </div>   
                        </div>
                    </div>
                    <div class="row order-ft">
                      
                        <div class="col-2  mg-t-5" v-if="!print_flag && update_flag">
                                <button class="btn btn-primary btn-block " @click="update_quote()">Update</button>
                        </div>
                        <div class="col-2 offset-6 mg-t-5" v-if="!print_flag && !update_flag">
                                <button class="btn btn-primary btn-block "  @click="save_quote()">Save</button>
                        </div>
                      
                        <div class="col-2  mg-t-5" >
                                <button class="btn btn-secondary btn-block " @click="clear_order()">Cancel</button>
                        </div>
                    </div>
                    </div>
                    
                </div>

            </div><!-- card-->
        </div><!-- col -->
        
      </div><!-- row row-xs -->
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

  <div class="modal fade" id="QuotePopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                    <choose-component :id="'sales_quotation'" :table="'sales_quotation'" :fields="['id','quote_no']" :search_filed="'name'" @selected="getQuoteByNum($event)"></choose-component>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

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


  
        <div class="modal fade" id="itemPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-item 
                            ref="itemPop"
                            @selected="get_item_rates($event)"
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
  aria-hidden="true" data-backdrop="static">
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
        <div class="modal fade" id="enquiryPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content tx-14 card">

                    <div class="modal-body">
                            
                        <div class="card-body card-block">
                            <choose-component 
                            :id="'sales_enquiry'"
                            :table="'sales_enquiry'" 
                            :fields="['id','enquiry_no','enquiry_date']" 
                            :search_filed="'enquiry_no'" 
                            @selected="getEnquiry($event)"
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
           sal_qot : {},
           order_detail_ob:{},
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
           order_detail_array:[],
           pf_perc : 0,
           pf_amount : 0,
           courier_amount :0,
           final_sub_total:0,
           final_grant_total:0,
           tax_name : '',
           tax_value:0,
           gst_value:0,
            
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

         remove_row(ind){
            this.$delete(this.order_detail_array, ind);
         },
        getItemPopup : function(event, obj){
            this.selected_obj = obj;
             console.log('selected_obj',this.selected_obj)
             this.$refs.itemPop.$refs.search.focus();
            // if(event.code == 'F1' || event.code == 'F2'){
                $("#itemPopup").modal('toggle');
            // }
        },
       
        add_ob : function(event){

            var vm = this;

            if(event.code == 'Enter' ){
                vm.add_row();
            }
        },
        check_item_in_order_details(check_item){

             var valueArr = [];
             valueArr = this.order_detail_array.filter(function(item){ return item.item_id == check_item });
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
        getQuote : function(val){
            if(event.code == 'F1' || event.code == 'F2'){
                $("#QuotePopup").modal('toggle');
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

          getQuoteByNum : function(val){
            var vm = this;
            vm.update_flag = true;
            axios.get('/company/salesquotation/?id='+val.id).then((response) => {
             vm.sal_qot = response.data;

//document.write(response.data.basic_total);

            this.sub_total       = response.data.sub_total;
            this.basic_total     = response.data.basic_total;
            this.grant_total     = response.data.grant_total;
         
            // document.write(response.data);
             vm.order_detail_array = response.data.items;
             $("#QuotePopup").modal('toggle');
            }, (error) => {
            // vm.errors = error.errors;
            });
        },
        save_quote:function() {
            var vm = this;
            
          /*  if(vm.items.length <= 0){
                alert('please provide item')
                return;
            }*/
            this.sal_qot.sub_total       = this.final_sub_total;
            this.sal_qot.basic_total     = this.final_basic_total;
            this.sal_qot.grant_total     = this.final_grant_total;
            this.sal_qot.pf_perc         = this.pf_perc;
            this.sal_qot.pf_amount       = this.pf_amount;
            this.sal_qot.courier_amount  = this.courier_amount;
            vm.sal_qot.items = vm.order_detail_array; 
           
            axios.post( '/company/salesquotation',this.sal_qot).then(response => {
               // this.indent.indent_no = this.indent_details.prefix_string+ (parseInt(this.indent_details.last_value+1));
            /*  axios.post('/company/salesquotation',{
                 qot_header:this.sal_qot,
                 qot_details:this.order_detail_array,
             })
            .then(response => {*/
                alert('Succesfully Saved..!');
                console.log(response.data)
                document.write(response.data);
                  })
            .catch((error)=>{
                console.log('FAILURE!!');
            });
         },
         update_quote:function() {

             var vm = this;
             vm.sal_qot.items = vm.order_detail_array; 
            axios.put('/company/salesquotation/'+this.sal_qot.id,this.sal_qot)
            .then(response => {
                alert('successfully updated!');
                document.write(response.data);
            })
            .catch((err) =>{
                this.errors = err.response.data.errors;
                console.log(this.errors)
            });
         },
         add_row:function(){
             
            if(!this.order_detail_ob.need_by_date && !this.order_detail_ob.schedule){
                alert('please select a date or make scheduled')
                return;
            }
            if(!this.order_detail_ob.quantity){
                alert('please specify the quantity')
                return;
            }
            if(this.check_item_in_order_details(this.order_detail_ob.item_id)){
                alert('Item already selected');
                return;
            }
             if(!this.order_detail_ob.discount){
               this.order_detail_ob.discount = 0;
            }
            
            this.order_detail_array.push(this.order_detail_ob);
            this.order_detail_ob = {};
            this.grant_total = 0;
            this.sub_total = 0;
        },

         get_item_rates:function(evnt){
            
            var vm = this;
      /****** partno  with no rates display on 11-06-2021 ******/
           
            vm.order_detail_ob = evnt;
            vm.order_detail_ob.part_no = evnt.part_no;
            vm.order_detail_ob.item = evnt.name;
            vm.order_detail_ob.rate = evnt.list_price;
            vm.order_detail_ob.purchase_unit = evnt.unit;
            vm.order_detail_ob.item_id = evnt.id;
                  
         $("#itemPopup").modal('toggle');
        },
          add_quantity : function(qty){
            if(qty){
                var vm = this;
                console.log(event)
                vm.order_detail_ob.sub_total = vm.get_subtotal(vm.order_detail_ob.discount, vm.order_detail_ob.rate);
                vm.order_detail_ob.grant_total = vm.get_amount(qty,  vm.order_detail_ob.sub_total);
            }
            
        },

        get_amount:function(quantity,amount){
            
            var t_quantity = quantity ? quantity : 0;
            var t_amount = amount ? amount : 0;
            console.log('get amount',quantity, amount)
            return parseFloat(quantity) * parseFloat(amount);

        },
        get_subtotal:function(discount,amount){
            
            var t_discount = discount ? discount : 0;
            var t_amount = amount ? amount : 0;
            var disc = parseFloat(t_discount/100);
            var disc_amount = parseFloat(t_amount)*disc;
            console.log('get amount',discount, amount)

            return parseFloat(t_amount) - disc_amount;
            
        },
        calculate_basic_total(){
         
            var vm = this;
            var calc_basic_total = 0;
                this.order_detail_array.forEach(function(obj){
                    calc_basic_total = calc_basic_total+parseFloat(obj.grant_total);

                });
            // return this.order_detail_array.sum("grant_total");
            this.final_basic_total = calc_basic_total;
            // return amount;
            return calc_basic_total;

         },

          calc_sub_total(){
          
             if(this.pf_perc !=0 ){
                // var pf_amount = 

                var disc = parseFloat(this.pf_perc/100);
                var pf_amount = parseFloat(this.final_basic_total)*disc;
                this.pf_amount = pf_amount;

                
             } else if(this.pf_amount !=0){
                var pf_amount = parseFloat(this.pf_amount);
                this.pf_amount = pf_amount;
             }
             else{
                
                var pf_amount = 0;
                this.pf_amount = pf_amount;
                
             }
            
            var sub_total = parseFloat(this.final_basic_total + pf_amount);
            if(this.courier_amount > 0){
                sub_total = sub_total + parseFloat(this.courier_amount);
            }
           
            this.final_sub_total = sub_total.toFixed(2);
            
            return sub_total.toFixed(2);
         },

           get_grant_total(){

            //  return this.tax_value;
            if(this.final_sub_total > 0){
                
                 /*   var tax_value = parseFloat(this.tax_value);
                    var disc = parseFloat(tax_value/100);
                    var tax_amount = parseFloat(this.final_sub_total)*disc;
                    this.order.tax_amount = tax_amount.toFixed(2);

                    var grant_total = parseFloat(this.final_sub_total + tax_amount);*/

                     var tax_value = parseFloat(this.sal_qot.gst_value);
                    var disc = parseFloat(tax_value/100);

                    var tax_amount = parseFloat(this.final_sub_total)*disc;
                    this.sal_qot.gst_amount = tax_amount.toFixed(2);

                    var grant_total = parseFloat(this.final_sub_total + tax_amount);

                    this.final_grant_total = grant_total.toFixed(2);
                    return grant_total.toFixed(2);
               
                

            }
            return 0;
         },
           getCustomerPopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                     $("#customerPopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },

        getCustomer : function(val){
               console.log(val)
               
                 var vm = this;
          //  vm.quote = val;
            vm.sal_qot.customer_id = val.id;
            vm.sal_qot.customer_name = val.name;
           $("#customerPopup").modal('toggle');
            },

            getEnquiryPopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                     $("#enquiryPopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },
         getEnquiry : function(val){
            // console.log(val)
               
                 var vm = this;
           // vm.sal_qot = val;
            vm.sal_qot.enquiry_no = val.enquiry_no;
            vm.sal_qot.enquiry_date = val.enquiry_date;
           $("#enquiryPopup").modal('toggle');
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
            // this.rateObj.tax_code = event.lookup_value;
             this.sal_qot.gst_value = event.genaral_value;
             this.sal_qot.gst_perc = event.lookup_description;

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
             this.sal_qot.currency = event.lookup_value;
             this.sal_qot.exchange_rate = event.genaral_value;

            // if(event.code == 'F1' || event.code == 'F2'){
                $("#currencyPopup").modal('toggle');
                // this.get_article_by_number();
            // }
        }
     
     },
     mounted(){
        this.getIndentNo();
     },
     created(){
        this.get_colors();
     }
    });
</script>
@endsection