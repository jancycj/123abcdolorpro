@extends('v1.company')


@section('appstyles')
<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection
@section('app')

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Material Transaction</h1>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Companies</a></li>
                                    <li><a href="#">Items</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="content">
            <div class="animated fadeIn">
                <div class="row">
                        <div class="col-lg-12">
                            @if(Session::has('err'))
                                <div class="alert-box success">
                                    <h2>{{ Session::get('err') }}</h2>
                                </div>
                            @endif
                            @if(Session::has('message'))
                                <div class="alert-box success">
                                    <h2>{{ Session::get('message') }}</h2>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        {{-- <h4>Out Source processing</h4> --}}
                                        <a href="{{url('company/transaction/create')}}" class="btn btn-sm btn-outline-secondary float-right"><i class="fa fa-plus"></i>Make Transaction</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="custom-tab">
    
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Shipped</a>
                                                    <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Recieved</a>
                                                    <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Inspection</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                    <table id="table_1" class="table table-striped table-bordered" style="margin-top:10px;">
                                                        <thead>
                                                            <tr>
                                                                <th>Shiped To</th>
                                                                <th>Item</th>
                                                                <th>Ref</th>
                                                                <th>Unit</th>
                                                                <th>Quantity</th>
                                                                <th>date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                    
                                                            @foreach ($sent as $item)
                                                            <tr>
                                                                <td>{{$item->to_company}}</td>
                                                                <td>{{$item->item}}</td>
                                                                <td>{{$item->ref_no}}</td>
                                                                <td>{{$item->unit}}</td>
                                                                <td>{{$item->quantity}}</td>
                                                                <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                                    <table id="table_2" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Ship From</th>
                                                                <th>Item</th>
                                                                <th>Ref</th>
                                                                <th>Unit</th>
                                                                <th>Quantity</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                    
                                                            @foreach ($received as $item)
                                                            <tr>
                                                                <td>{{$item->from_company}}</td>
                                                                <td>{{$item->item}}</td>
                                                                <td>{{$item->ref_no}}</td>
                                                                <td>{{$item->unit}}</td>
                                                                <td>{{$item->quantity}}</td>
                                                                <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                    <table id="table_3" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Ship from</th>
                                                                <th>Ship to</th>
                                                                <th>Item</th>
                                                                <th>Unit</th>
                                                                <th>Quantity</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                    
                                                            @foreach ($items as $item)
                                                            <tr>
                                                                <td>{{$item->item}}</td>
                                                                <td>{{$item->category}}</td>
                                                                <td>{{$item->ref_no}}</td>
                                                                <td>{{$item->unit}}</td>
                                                                <td>{{$item->quantity}}</td>
                                                                <td>{{$item->location}}</td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection

@section('appscripts')
	<script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/js/init/datatables-init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#table_1').DataTable();
          $('#table_2').DataTable();
          $('#table_3').DataTable();
      } );
  </script>
@endsection