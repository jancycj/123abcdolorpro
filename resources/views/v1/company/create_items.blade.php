@extends('v1.app')


@section('appstyles')

@endsection
@section('app')
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Create New Item</h1>
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
                                    <li class="active">create</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <form method="post" action="{{url('/admin/items')}}">
                  @csrf
                <div class="row">

                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Item Details</strong> 
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
                                    <label class=" form-control-label">Name</label>
                                    <div class="input-group">
                                        <input class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Country</label>
                                    <div class="input-group">
                                        <select data-placeholder="Choose a Category..." class="standardSelect" tabindex="1" name="category">
                                            <option value="" label="default"></option>
                                            <option value="1">Gray yarn</option>
                                            <option value="2">Dyed yarn</option>
                                            <option value="3">Dye </option>
                                            <option value="4">Chemical</option>
                                            <option value="5">Packing material</option>
                                            <option value="6">Consumable</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-outline-secondary btn-block" type="submit">Create</button>
                                
                                
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