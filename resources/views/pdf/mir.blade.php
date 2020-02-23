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
  padding:2px;
  }
  th {
  text-align: left;
  }
  .table th, .table td {
  padding: 3px 3px;
  line-height: 1;
  }
  .table th, .table td {
  padding: 2px 3px;
  line-height: 1;
  font-size: 15px;
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
</style>
</head>
<body bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    <center id="app" style="background-color:#E1E1E1;">
        <table  bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="100%">

                <tr>
                    <td></td>
                    <td>
                            <h3 style="font-family:Helvetica,Arial,sans-serif;font-weight:100;margin-top:0;margin-bottom:3px;">Goods Inward register</h3>
                            <p>
                                From:{{$from}} - To:{{$to}}
                            </p>
                    </td>
                    <td>
                        
                    </td>

                </tr>
                <tr>
                        <td style="width:250px;">
                        
                         <h3 style="color:#5F5F5F;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:3px;font-weight:normal;text-align:left;">
                                 {{$company->company->name}} ({{$company->company->short_name}})
                                </h3>
                                <p style="font-size:14px;font-weight:normal;color:#8392a5;">{{$company->company->address_line1}}<br>
                                    {{$company->company->phone_number}}<br>
                                   Email:{{$company->company->email}}
                                </p>
                        </td>
                        <td>

                        </td>
                        
                       
                       
                </tr>
           
        </table>
        
        @php($tt = 0)
                @foreach ($orders as $index => $item)
                <table class="table table-bordered" bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0"  width="100%">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td>
                                <h5>
                                        {{$item[0]->supplier_name}}

                                </h5>
                                <p>
                                        {{$item[0]->supplier_name}}
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table  class="table table-bordered" bgcolor="#FFFFFF"  width="100%">
                    <thead>
                        <tr>
                            <th>Order NO</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            @php($r_t = 0)
                        @foreach ($item as $it)
                            @foreach ($it->exact_details as $detail)
                            <tr>
                                <td style="width:20px;">{{$detail->order_no}}</td>
                                <td colspan="4">
                                        <table class="table table-bordered" bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0"  width="100%">
                                            <tr>
                                                <td>DC</td>
                                                <td>DC date</td>
                                                <td>Item</td>
                                                <td>Recived Qty</td>
                                                <td>Acc Qty</td>
                                                <td>Rej Qty</td>
                                                <td>Rw Qty</td>
                                                <td>Unit</td>
                                                <td>Rate</td>
                                                <td>Discount</td>
                                                <td>Amount</td>
                                            </tr>
                                        @foreach ($detail->exact_reciept as $rcpt)
                                            
                                            
                                            <tr>
                                                <td>
                                                        {{$rcpt->dc_no}}
                                                </td>
                                                <td >
                                                        {{$rcpt->dc_date}}
                                                </td>
                                                <td>
                                                        {{$detail->item}}
                                                </td>
                                                
                                                <td>
                                                {{$rcpt->recieved_quantity}}
                                                </td>
                                                <td>
                                                     {{$rcpt->accepted_quantity}}
                                                </td>
                                                <td>
                                                    {{$rcpt->rejected_quantity}}
                                                </td>
                                                <td>
                                                    {{$rcpt->rejected_quantity}}
                                                </td>
                                                <td>
                                                        {{$detail->unit}}
                                                </td>
                                                <td>
                                                        {{$detail->rate}}
                                                </td>
                                                
                                                <td>
                                                        {{$detail->discount}}
                                                </td>
                                                <td>
                                                    {{$detail->discount_rate*$rcpt->recieved_quantity}}
                                                </td>
                                                @php($r_t = $r_t+ ($detail->discount_rate*$rcpt->recieved_quantity))
                                            </tr>
                                        @endforeach
                                        </table>

                                </td>

                            </tr>
                            @endforeach
                        @endforeach
                        <tr>
                            <td colspan="4" style="text-align:right;"> Total </td>
                            <td  style="text-align:right;">  RS.{{$r_t}}</td>
                            @php($tt = $tt+ $r_t)
                        </tr>
                    </tbody>
                </table>
                @endforeach
                <table class="table table-bordered" bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0"  width="100%">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" style="text-align:right;">
                                    grant_total
                                </td>
                                <td  style="text-align:right;">
                                    RS.{{$tt}}
                                </td>
                            </tr>
                        </tbody>
                </table>
    </center>
</body></html>
