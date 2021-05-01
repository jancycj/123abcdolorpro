
<!DOCTYPE html>
<html>
  <head>
    <style>
    html * {
      font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif !important;
    }
    h1 {
        background-color: #00c9ff45;
      color: #001737;
      text-align: center;
      padding: 1px;
    }
    thead {
      display: table-header-group;
    }
    #products {
      font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    #products td, #products th {
      border: 1px solid black;
      padding: 1px;
      font-size:13px !important

    }
    #products thead {
      background-color: #00c9ff45;
      border-bottom: 1px solid black;
    }
    #products tr:hover {
      background-color: #00c9ff45;
    }
    #products th {
      padding-top: 1px;
      padding-bottom: 1px;
      text-align: left;
      background-color: #00c9ff45;
      color: #001737;
      font-size:13px !important;
      border-bottom: 1px solid black;
    }
    #watermark {
    position: fixed;
    top: 35%;
    width: 100%;
    text-align: center;
    font-size: 100px;
    opacity: .6;
    transform: rotate(
10deg
);
    transform-origin: 50% 50%;
    z-index: -1000;
    -webkit-text-stroke: 2px #001737;
    /* font-family: sans; */
    color: #00c9ff45;
}
.underline{
  border-bottom: 1px solid black;
}
    </style>
  </head>

  <body>
  <script type="text/php">
    if (isset($pdf)) {
        $x = 250;
        $y = 10;
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font = null;
        $size = 12;
        $color = array(18,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>
  <!-- <div id="watermark">
    Watermark
  </div> -->
    
    <table style="width: 100%;">
            <tr>
              <td><h3>{{$company->name}}</h3> </td>
              </tr>
              <tr>
              <td style="text-align:center;"><h3>Material recceived / inspection note</h3></td>
              </tr>
    </table>
    <div style="border-bottom: 1px solid black; width:100%"></div>
    
    <table style="width: 100%;">
        <thead>
            <tr>
              <td>MIR NO : {{$header->mir_no}}</td>
              <td>MIR Date : {{$header->mir_date}}</td>
              <td>
                <table style="width: 100%;">
                    <tbody>
                    <tr>
                        <td>Date  : {{$header->t_date}}</td>
                    </tr>
                    </tbody>
                </table>
              </td>
          </tr>
        </thead>
    </table>

    <table style="width: 100%;">
        <thead>
            <tr >
                <td style="border-bottom: 1px solid black;" colspan="3"><h3>Vendor</h3></td>
            </tr>
            <tr>
                <td>
                  <table style="width: 100%;">
                      <tbody>
                      
                      <tr>
                          <td>Name  : {{$header->vendor_name}}</td>
                      </tr>
                      <tr>
                        <td>Address : {!! $header->vendor_address !!}</td>
                      </tr>
                      <tr>
                        <td>Post code : {{$header->vendor_post_code}}</td>
                      </tr>
                      <tr>
                        <td>Place : {{$header->vendor_place}}</td>
                      </tr>
                      <tr>
                        <td>Phone Number : {{$header->vendor_phone_number}}</td>
                      </tr>
                      </tbody>
                  </table>
                </td>
                <td>
                  <table style="width: 100%;">
                      <tbody>
                      @if($header->vendor_dc_no != '')
                      <tr>
                          <td>Vendor DC  : {{$header->vendor_dc_no }}</td>
                      </tr>
                      <tr>
                          <td>Vendor DC Date  : {{$header->vendor_dc_date }}</td>
                      </tr>
                      @else
                      <tr>
                        <td>Vendor Invoice No : {{$header->vendor_invoice_no}}</td>
                      </tr>
                      <tr>
                        <td>Vendor Invoice Date : {{$header->vendor_invoice_date}}</td>
                      </tr>
                      @endif
                      <tr>
                        <td>Gate Entry No : {{$header->gate_entry_no}}</td>
                      </tr>
                      
                      </tbody>
                  </table>
                </td>
            </tr>
            <tr >
                <td style="border-bottom: 1px solid black;" colspan="3"></td>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <table id='products'>
      <thead>
        <tr>
          <td>PoNO</td>
          <td>Pur. &nbsp;&nbsp;&nbsp; date </td>
          <td colspan="6">  </td>
        </tr>
        
      </thead>
      <tbody>
      @php($grant_total = 0)

        @foreach($resArr as $detail)
        <tr>
          <td >{{$detail['order_no']}}</td>
          <td >{{$detail['order_date']}}</td>
          <td colspan="6">
              <table style="width: 100%;">
                <tr style="background:#00c9ff45;">
                  <td>Part No </td>
                  <td>Name</td>
                  <td>PO Qty</td>
                  <td>UOM</td>
                  
                  <td>Rec Qty</td>
                  <td>Acc Qty</td>
                  <td>Con.Acc Qty</td>
                  <td>Rw.Qty</td>
                  <td>Rej.Qty</td>
                  <td>stock.Qty</td>
                  <td>PO.Rate</td>
                  <td>Discount</td>
                  <td>Total</td>
                </tr>
                
                @php($mirs = $detail['detail_data'])
                @foreach($mirs as $mir)
                <tr>
                  <td colspan="6">
                  {{$mir->part_no}}
                  </td>
                  <td colspan="7">
                  {{$mir->item}}
                  </td>
                </tr>

                <tr>
                  <td></td>
                  <td></td>
                  <td>{{$mir->quantity}}</td>
                  <td>{{$mir->uom}}</td>
                  <td>{{$mir->recieved_quantity}}</td>
                  <td>{{$mir->accepted_quantity}}</td>
                  <td>{{$mir->conditionally_accepted_quantity}}</td>
                  <td>{{$mir->rework_quantity}}</td>
                  <td>{{$mir->rejected_quantity}}</td>
                  <td>{{$mir->store_accepted_quantity}}</td>
                  <td>{{$mir->po_rate}}</td>
                  <td>{{$mir->discount}}</td>
                  <td>{{$mir->subtotal}}</td>
                </tr>

                
                
                @php($grant_total = $grant_total+$mir->subtotal)
                @php(
                  [$tax = $mir->tax_percent,
                  $tax_name = $mir->tax_name]
                  )
                  @endforeach

              </table>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <table style="width: 100%;">
        <thead>
                  
            <tr>
                <td colspan="3" align="right">Total : {{$grant_total}} </td>
                
            </tr>
            <tr >
              <td></td>
              <td></td>
                <td style="border-bottom: 1px solid black;" ></td>
            </tr>
            <tr>
                <td colspan="3" align="right">Other Charges : {{ $header->other_charges}}</td>
                
            </tr>
            <!-- <tr >
                  <td style="border-bottom: 1px solid black;" colspan="3"></td>
              </tr> -->
            <tr>
                @php(
                  [$tt = $grant_total + $header->other_charges,
                  $txa = $tt * ($tax/100)]

                )
                <td colspan="3" align="right">{{$tax_name}}  : {{ $txa }}</td>
                
            </tr>
                <tr >
                  <td></td>
                  <td></td>
                    <td style="border-bottom: 1px solid black;" ></td>
                </tr>
                <tr >
                    <td  colspan="3" align="right">Grant Total : {{$txa+$tt}}</td>

                </tr>
            <!-- <tr>
                <td>Total : {{$grant_total}} </td>
                <td>Other Charges : {{ $header->other_charges}}</td>
                @php(
                  [$tt = $grant_total + $header->other_charges,
                  $txa = $tt * ($tax/100)]

                )
                <td>{{$tax_name}}  : {{ $txa }}</td>
                <tr >
                    <td style="border-bottom: 1px solid black;" colspan="3"></td>
                </tr>
                <tr >
                    <td style="text-align:end;">Grant Total : {{$txa+$tt}}</td>

                </tr>
            </tr> -->
        </thead>
        <tbody>

        </tbody>
    </table>
    
  </body>
</html>