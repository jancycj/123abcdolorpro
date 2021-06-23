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
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getIndent($event)" >
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
                                <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getIndent($event)" >
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
                        <div class="col-md-4 col-lg-4 col-sm-6"  @keydown="getTaxPopup($event)">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">GST % </label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.gst_perc">
                                </div>
                            </div>
                        </div>

                          <div class="col-md-4 col-lg-4 col-sm-6" >
                            <div class="form-group row">
                            
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.gst_value">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">PF %</label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.pf_perc">
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
                                <label class="col-5 form-control-label">PF Amount </label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.pf_amount">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">Courier Charge</label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.courier_charge">
                                </div>
                            </div>
                        </div>

                         <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label"> GST Amount </label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.gst_amount">
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row">
                     
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 form-control-label">TCS Amount</label>
                                <div class="col-7 input-group">
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.tcs_amount">
                                </div>
                            </div>
                        </div>
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
                                   <input autocomplete="off" class="form-control" v-model="sal_qot.customr_order_no">
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
                                       <option value='active'>active</option>
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
                                    <th scope="col">Nd By date</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Amount</th>
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
                                             <input autocomplete="off" class="form-control"  v-model="d.qty" >
                                        </td>
                                        <td>
                                             @{{d.unit}} 
                                        </td>
                                        <td>
                                             @{{d.need_by_date}} 
                                        </td>
                                        <td>
                                             @{{d.rate}} 
                                        </td>
                                        <td>
                                             @{{d.discount}} 
                                        </td>
                                        <td>
                                             
                                        </td>

                                        <td>
                                            <a  class="action-icon " @click="deleteRow(index)"><i class="fa fa-trash-o tx-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">#</td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.part_no" @keydown="getItemPopup($event)">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.name" disabled>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.qty" @keydown="add_ob($event)">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.unit" disabled>
                                        </td>
                                        <td>
                                            <input autocomplete="off" type="date" class="form-control"  v-model="item_ob.need_by_date" >
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.rate" disabled @keydown="add_ob($event)">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.discount" >
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="form-control"  v-model="item_ob.sub_amt" disabled>
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
                                <button class="btn btn-primary btn-block " @click="save_quote()">Save</button>
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
            vm.item_ob.item_id = val.id;
            vm.item_ob.rate = val.list_price;
       

            console.log('val', vm.item_ob);
            // vm.items.push(vm.item_ob)
            if(this.check_item_in_items(val.id)){
                    alert('duplicate item');
                    return;
                }
            $("#itemPopup").modal('toggle');
        },
        add_ob : function(event){

            var vm = this;

            if(event.code == 'Enter' ){
                console.log(this.check_item_in_items(vm.item_ob.item_id),'trueeee')
                if(this.check_item_in_items(vm.item_ob.item_id)){
                    alert('duplicate item');
                    return;
                }
                if(! vm.item_ob.unit){
                    alert('please provide an item');
                    return;
                }
                if(! vm.item_ob.qty){
                    alert('please provide a quantity');
                    return;
                }
                if(! vm.item_ob.need_by_date){
                    alert('please provide a Need By Date');
                    return;
                }
                vm.items.push(vm.item_ob);
                vm.item_ob = {};
            }
        },
        check_item_in_items(check_item){
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
        save_quote:function() {
            var vm = this;
            vm.sal_qot.items = vm.items; 
          /*  if(vm.items.length <= 0){
                alert('please provide item')
                return;
            }*/
            
            axios.post( '/company/salesquotation',vm.sal_qot).then(response => {
               // this.indent.indent_no = this.indent_details.prefix_string+ (parseInt(this.indent_details.last_value+1));
                alert('Succesfully Saved..!');
                console.log(response.data)
                document.write(response.data);
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