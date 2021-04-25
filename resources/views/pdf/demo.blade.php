
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
      padding: 6px;
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
      border: 1px solid #ddd;
      padding: 8px;
      font-size:13px !important

    }
    #products thead {
      background-color: #00c9ff45;
    }
    #products tr:hover {
      background-color: #00c9ff45;
    }
    #products th {
      padding-top: 4px;
      padding-bottom: 4px;
      text-align: left;
      background-color: #00c9ff45;
      color: #001737;
      font-size:13px !important
    }
    #watermark {
      position: fixed;
      top: 35%;
      width: 100%;
      text-align: center;
      font-size: 100px;
      opacity: .6;
      transform: rotate(10deg);
      transform-origin: 50% 50%;
      z-index: -1000;
      -webkit-text-stroke: 2px #001737;
      color: #00c9ff45;
    }
    </style>
  </head>

  <body>

  <div id="watermark">
    Watermark
  </div>

    <h1>Product Price List</h1>
    <table id='products'>
      <thead>
        <tr>
            <td>Product ID </td>
         <td> Description </td>
         <td> Supplier </td>
         <td> Quantity Per Unit </td>
         <td> Unit Price </td></tr>
      </thead>
      <tbody>
      <tr>
        <td>ProductID</td>
        <td>ProductName</td>
        <td>CompanyName</td>
        <td>CompanyName</td>
        <td align='right'>UnitPrice</td>
      </tr>
      <tr>
        <td>ProductID</td>
        <td>ProductName</td>
        <td>CompanyName</td>
        <td>CompanyName</td>
        <td align='right'>UnitPrice</td>
      </tr>
      <tr>
        <td>ProductID</td>
        <td>ProductName</td>
        <td>CompanyName</td>
        <td>CompanyName</td>
        <td align='right'>UnitPrice</td>
      </tr>
      </tbody>
    </table>
    <table style="width: 100%;">
        <thead>
            <tr>
            <td>ProductID</td>
                <td>ProductID</td>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
  </body>
</html>