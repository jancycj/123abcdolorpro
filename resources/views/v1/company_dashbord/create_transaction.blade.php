@extends('v1.company')


@section('appstyles')

@endsection
@section('app')
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Create New Transaction</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Comapny</a></li>
                                    <li><a href="#">Items</a></li>
                                    <li class="active">transfer</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <form method="post" action="{{url('company/transaction/')}}">
                  @csrf
                <div class="row">
                        <div class="col-lg-12">
                                @if(Session::has('err'))
                                    <div class="alert alert-danger">
                                        <h5>{{ Session::get('err') }}</h5>
                                    </div>
                                @endif
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        <h5>{{ Session::get('message') }}</h5>
                                    </div>
                                @endif
                        </div>
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Transfer material</strong> 
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body card-block">
                                
                                <div class="form-group">
                                    <label class=" form-control-label">Item</label>
                                    <div class="input-group">
                                        <select data-placeholder="Select Item" class="standardSelect" tabindex="1" name="item">
                                            <option value="" label="default"></option>
                                            @foreach ($items as $item)
                                        <option value="{{$item->id}}">{{$item->item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Company</label>
                                    <div class="input-group">
                                        <select data-placeholder="Select Company" class="standardSelect" tabindex="1" name="company">
                                            <option value="" label="default"></option>
                                            @foreach ($companies as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Quantity</label>
                                    <div class="input-group">
                                        <input class="form-control" name="quantity">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Unit</label>
                                    <div class="input-group">
                                        <select data-placeholder="Select unit" class="standardSelect" tabindex="1" name="unit">
                                            <option value="" label="default"></option>
                                            <option value="1">Kg</option>
                                            <option value="2">No</option>
                                            <option value="3">Chees</option>
                                            <option value="4">Packet</option>
                                            <option value="5">Box</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Purpose</label>
                                    <div class="input-group">
                                        <textarea name="purpose" id="address2" rows="2" placeholder="Spacify the purpose" class="form-control"></textarea>
                                    </div>
                                </div>

                                <button class="btn btn-outline-secondary btn-block" type="submit">Transfer</button>
                                
                                
                            </div>
                        </div>
                    </div>

                  </div><!-- /div row -->
                </form>



            </div><!-- .animated -->
      </div><!-- .content -->
@endsection

@section('appscripts')
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
@endsection