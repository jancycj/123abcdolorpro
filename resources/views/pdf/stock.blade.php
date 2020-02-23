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
        <table  bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="1250">

                <tr>
                    <td></td>
                    <td>
                            <h3 style="font-family:Helvetica,Arial,sans-serif;font-weight:100;margin-top:0;margin-bottom:3px;">Stock Report</h3>
                            <p>
                                Date:{{$date}}
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
        
        <table class="table table-bordered" bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0"  width="100%">
            
                          <thead>
                                <tr>
                                    <th>Part NO</th>
                                    <th>Item Name</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Location</th>
                                    <th>Rate</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
        
                                @foreach ($stocks as $item)
                                <tr>
                                    <td>{{$item->item_ob->part_no}}</td>
                                    <td>{{$item->item}}</td>
                                    <td>{{$item->unit}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->location}}</td>
                                    <td>{{$item->item_ob->list_price}}</td>
                                    <td >{{$item->item_ob->list_price * $item->quantity}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center">Total</td>
                                    <td class="tx-center">RS.</td>
                                    <td class="tx-center"><span><span>{{$total}}</span></span></td>
                                </tr>
                            </tbody>
                        
        </table>
    </center>
</body></html>
