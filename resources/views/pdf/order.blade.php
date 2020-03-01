<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no" />
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<title>Report pdf</title>
<style type="text/css">
  body{
  font-family: "IBM Plex Sans", sans-serif;
  font-weight: normal;
  background: white;
  }
  @page {
    /* margin: 4em 1em 4em 1em; */
    margin-left: 1em;
  }
  .table{
  border-collapse: collapse !important;
  }
  th, td {
  padding:8px;
  }
  th {
  text-align: left;
  }
  .table th, .table td {
  padding: 12px 10px;
  line-height: 1.5;
  }
  .table th, .table td {
  padding: 11px 29px;
  line-height: 1.2;
  font-size: 12px;
  }
  .table th{
  background:#fff;
  color:#000;
  font-weight: normal;
  border-bottom : 1px solid rgba(72, 94, 144, 0.16);
  }
  .table-bordered td {
  border-bottom : 1px solid rgba(72, 94, 144, 0.16);
  font-size:12px;
  }
  .table-bord td {
  border : 1px solid rgba(72, 94, 144, 0.16);
  font-size:12px;
  }
  .table-bord th {
  border : 1px solid rgba(72, 94, 144, 0.16);
  }
</style>
</head>
<body bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    <center id="app" style="background-color:#E1E1E1;">
        <table  bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td style="width:250px;">
                <p style="font-size:13px;font-weight:normal;color:#8392a5;">
                            SHIP TO
                        </p>
                        <h3 style="color:#5F5F5F;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:3px;font-weight:normal;text-align:left;">
                                {{$ship_to->name?$ship_to->name:'--'}}
                        </h3>
                        <p style="font-size:14px;font-weight:normal;color:#8392a5;">{{$ship_to->address_line1?$ship_to->address_line1:'--'}}<br>
                        <p style="font-size:14px;font-weight:normal;color:#8392a5;">{{$ship_to->short_name?$ship_to->short_name:'--'}}<br>
                            Mob No: {{$ship_to->phone_number?$ship_to->phone_number:'--'}}<br>
                            Email: {{$ship_to->email?$ship_to->email:'--'}}
                        </p>
                </td>
                <td  style="width:200px;text-align:center;">
                        <p style="font-size:13px;font-weight:normal;color:#8392a5;">
                            BILL TO
                        </p>
                        <h3 style="color:#5F5F5F;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:3px;font-weight:normal;">
                            {{$bill_to->name?$bill_to->name:'--'}}
                        </h3>
                        <p style="font-size:14px;font-weight:normal;color:#8392a5;">{{$bill_to->address_line1?$bill_to->address_line1:'--'}}<br>
                        <p style="font-size:14px;font-weight:normal;color:#8392a5;">{{$bill_to->short_name? $bill_to->short_name:'--'}}<br>
                            Mob No: {{$bill_to->phone_number?$bill_to->phone_number:'--'}}<br>
                            Email: {{$bill_to->email?$bill_to->email:'--'}}
                        </p>
                </td>
                <td  style="width:250px;text-align:center">
                        <p style="font-size:15px;font-weight:normal;color:#8392a5;">
                                STANDARD PURCHASE ORDER
                            </p>
                        <p style="font-size:12px;color:#8392a5;">
                            NO : #{{$order->order_number}}<br>
                            Date : {{$order->order_date}}<br>
                </td>
            </tr>
            <tr  >
                
                <td style="width:50px; border-top: 1px solid #c1b9b9;">
                    <p style="font-size:13px;font-weight:normal;color:#8392a5;">
                           SUPPLIER
                        </p>
                        <h3 style="color:#5F5F5F;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:3px;font-weight:normal;text-align:left;">
                            {{$supplier->name?$supplier->name:'--'}}
                            </h3>
                            <p style="font-size:14px;font-weight:normal;color:#8392a5;">{{$supplier->address_line1?$supplier->address_line1:'--'}}<br>
                            <p style="font-size:14px;font-weight:normal;color:#8392a5;">{{$supplier->customer_code?$supplier->customer_code:'--'}}<br>
                               Mob No: {{$supplier->phone_number?$supplier->phone_number:'--'}}<br>
                               Email: {{$supplier->email?$supplier->email:'--'}}
                            </p>
                </td>
                <td  style="width:10px; border-top: 1px solid #c1b9b9;">
                    
                </td> 
                <td  style="width:50px;text-align:left;border-top: 1px solid #c1b9b9;">
                    
                </td>
            </tr>
        </table>
        <table class="table table-bordered" bgcolor="#FFFFFF"  border="0" cellpadding="1" cellspacing="0" width="100%">
                <thead>
                    </thead>
                <tbody>
                    <tr>
                        <td align="left" style="font-size:12px;width:500px;word-wrap: break-word;word-break: break-all;border-top: 1px solid #c1b9b9;" >
                                <p style="font-size:14px;font-weight:normal;color:#8392a5;">
                                        Dear Sirs,<br><br>
                                        We are pleased to place a purchase order to supply the following materials as per schedule date.
                                </p>
                            
                        </td>
                    </tr>
                </tbody>
        </table>
        <table class="table table-bordered" bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0"  width="100%">
            
                           <thead>
                          </thead>
                          <tbody>
                                <tr>
                                    <th><b>S.No</b></th>
                                    <th><b>Item</b></th>
                                    <th><b>Part No</b></th>
                                    <th><b>HSN</b></th>
                                    <th><b>Qty</b></th>
                                    <th><b>UOM</b></th>
                                    <th><b>Sched/Date</b></th>
                                    <th><b>Rate</b></th>
                                    <th><b>Disc</b></th>
                                    <th><b>Total</b></th>
                                </tr>
                                @foreach ($order->exact_details as $detail)
                                    
                                
                                    <tr>
                                        <td>1</td>
                                        <td>{{$detail->item}}</td>
                                        <td>{{$detail->item_part_no}}</td>
                                        <td>{{$detail->item_hsn}}</td>
                                        <td>{{$detail->quantity}}</td>
                                        <td>{{$detail->unit}}</td>
                                        <td>
                                            @if(count($detail->schedules) > 0)
                                                <table class="table table-bord" bgcolor="#FFFFFF">
                                                    <tr>
                                                        <th>Sch Qty</th>
                                                        <th>Sch Date</th>
                                                    </tr>
                                                    <tr>
                                                        <td>12</td>
                                                        <td>12/12/20</td>
                                                    </tr>
                                                    <tr>
                                                        <td>12</td>
                                                        <td>12/12/20</td>
                                                    </tr>
                                                    
                                                </table>
                                            @else
                                            {{$detail->delivery_date}}
                                            @endif
                                        </td>
                                        <td>{{$detail->rate}}</td>
                                        <td>{{$detail->discount}}</td>
                                        <td>{{$detail->grant_total}}</td>
                                    </tr>
                                @endforeach

                                
                                <tr>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center">P&F</td>
                                <td class="tx-center"><span>{{$order->pnf_total}}</span></td>
                                </tr>
                                <tr>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center">COURRIER</td>
                                    <td class="tx-center"><span>{{$order->courrier_charge}}</span></td>
                                </tr>
                                <tr>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center">SUB TOTAL</td>
                                    <td class="tx-center">RS.</td>
                                    <td class="tx-center"><span>{{$order->sub_total}}</span></td>
                                </tr>
                                <tr>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"> </td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center">GST:{{$order->tax_percent}}%</td>
                                    <td class="tx-center"><span>{{$order->tax_amount}}</span></td>
                                </tr>
                                <tr>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center">GRAND TOTAL</td>
                                    <td class="tx-center">RS.</td>
                                    <td class="tx-center"><span>{{$order->grant_total}}</span></td>
                                </tr>
                          </tbody>
                        
        </table>
    </center>
</body></html>
