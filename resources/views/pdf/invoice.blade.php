<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no" />
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<title>Invoices pdf</title>
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
                <td style="width:250px;">
                <p style="font-size:13px;font-weight:normal;color:#8392a5;">
                            BILLED FROM
                        </p>
                 <h3 style="color:#5F5F5F;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:3px;font-weight:normal;text-align:left;">
                         Company
                        </h3>
                        <p style="font-size:14px;font-weight:normal;color:#8392a5;">Address line1<br>
                        987654432<br>
                           Email:email@email.vom
                        </p>
                </td>
                <td  style="width:200px;text-align:center;">
                    <img src="https://ui-avatars.com/api/?background=03a9f4&amp;name=LG&amp;rounded=true&amp;color=aee4fd" alt="" class="rounded-circle">
                </td>
                <td  style="width:250px;text-align:right">
                <p style="font-size:13px;font-weight:normal;color:#8392a5;">ORDER NUMBER</p>
                        <h3 style="color:#5F5F5F;font-family:Helvetica,Arial,sans-serif;font-weight:100;margin-top:0;margin-bottom:3px;">#Ord002</h3>
                </td>
            </tr>
            <tr>
                <td style="width:50px;">
                <p style="font-size:13px;font-weight:normal;color:#8392a5;">
                            SUPPLIER
                        </p>
                <h3 style="color:#5F5F5F;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:3px;font-weight:normal;text-align:left;">
                        {{$bill_to->name?$bill_to->name:'--'}}
                        </h3>
                        <p style="font-size:14px;font-weight:normal;color:#8392a5;">{{$bill_to->address_line1?$bill_to->address_line1:'--'}}<br>
                        <p style="font-size:14px;font-weight:normal;color:#8392a5;">{{$bill_to->customer_code?$bill_to->customer_code:'--'}}<br>
                           Mob No: {{$bill_to->phone_number?$bill_to->phone_number:'--'}}<br>
                           Email: {{$bill_to->email?$bill_to->email:'--'}}
                        </p>
                </td>
                <td style="width:50px;">
                <p style="font-size:13px;font-weight:normal;color:#8392a5;">
                           SHIP TO
                        </p>
                        <h3 style="color:#5F5F5F;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:3px;font-weight:normal;text-align:left;">
                            {{$ship_to->name?$ship_to->name:'--'}}
                            </h3>
                            <p style="font-size:14px;font-weight:normal;color:#8392a5;">{{$ship_to->address_line1?$ship_to->address_line1:'--'}}<br>
                            <p style="font-size:14px;font-weight:normal;color:#8392a5;">{{$ship_to->customer_code?$ship_to->customer_code:'--'}}<br>
                               Mob No: {{$ship_to->phone_number?$ship_to->phone_number:'--'}}<br>
                               Email: {{$ship_to->email?$ship_to->email:'--'}}
                            </p>
                </td>
                <!-- <td  style="width:10px;">
                    
                </td> -->
                <td  style="width:50px;text-align:right">
                    <p style="font-size:13px;font-weight:normal;color:#8392a5;">
                            ORDER INFORMATION
                        </p>
                    <p style="font-size:12px;color:#8392a5;">
                        Date : 12/12/12<br>
                        Due Date : 12/12/12<br>
                        From : 12/12/12<br>
                        To : 12/12/12</p>
                </td>
            </tr>
        </table>
        <table class="table table-bordered" bgcolor="#FFFFFF"  border="0" cellpadding="1" cellspacing="0" width="1250">
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
        <table class="table table-bordered" bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0"  width="1250">
            
                           <thead>
                          </thead>
                          <tbody>
                                <tr>
                                    <th><b>S.No</b></th>
                                    <th><b>Item Code</b></th>
                                    <th><b>Rev Num</b></th>
                                    <th><b>Item Description/DrawingNo</b></th>
                                    <th><b>HSN</b></th>
                                    <th><b>Order Qty</b></th>
                                    <th><b>UOM</b></th>
                                    <th><b>Sch Qty</b></th>
                                    <th><b>Sch Date</b></th>
                                    <th><b>Rate/Unit</b></th>
                                    <th><b>Value</b></th>
                                </tr>
                                
                                    <tr>
                                        <td>1</td>
                                        <td>qsdkd</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12/12/12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                
                                    <tr>
                                        <td>2</td>
                                        <td>ss<br>
                                            
                                            <small>qqq</small><br>
                                            
                                            <small>qqqq</small>
                                           
                                        </td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12/12/12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>

                                <tr>
                                    <td class="tx-center">Total</td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center">12</td>
                                    <td class="tx-center"></td>
                                    <td class="tx-center"><span>£<span>12</span></span></td>
                                </tr>
                          </tbody>
                        
        </table>
       <table  bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="1250">
                <tr>
                <td align="left" style="font-size:12px;width:500px;word-wrap: break-word;word-break: break-all;">
                    <p style="font-size:14px;font-weight:normal;color:#8392a5;">NOTES</p>
                    <p style="font-size:8px;font-weight:normal;color:#000;"></p>
                </td>
                </tr>
        </table> 
    </center>
</body></html>
