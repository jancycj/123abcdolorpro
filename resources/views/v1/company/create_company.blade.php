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
                                <h1>Create New company</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Comapny</a></li>
                                    <li class="active">Create</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <form method="post" action="{{url('/admin/companies')}}">
                  @csrf
                <div class="row">

                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Company Basic Details</strong> <small> Please choose valid email</small>
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
                                    <label class=" form-control-label">Short name</label>
                                    <div class="input-group">
                                        <input class="form-control" name="short_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Address Line 1</label>
                                    <div class="input-group">
                                        <textarea name="address1" id="address1" rows="2" placeholder="Building,Street" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Address Line 2</label>
                                    <div class="input-group">
                                        <textarea name="address2" id="address2" rows="2" placeholder="Place,Location" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Phone number</label>
                                    <div class="input-group">
                                        <input class="form-control" name="phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Autherized person</label>
                                    <div class="input-group">
                                        <input class="form-control" name="autherized_person">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Autherized person Phone number</label>
                                    <div class="input-group">
                                        <input class="form-control" name="autherized_person_phone">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Advance details</strong>
                            </div>
                            <div class="card-body card-block">

                              <div class="form-group">
                                  <label class=" form-control-label">Country</label>
                                  <div class="input-group">
                                      <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1" name="country">
                                          <option value="" label="default"></option>
                                          <option value="1">India</option>
                                          <option value="2">United States</option>
                                          <option value="3">United Kingdom</option>
                                          <option value="4">Afghanistan</option>
                                          <option value="5">Aland Islands</option>
                                          <option value="6">Albania</option>
                                          <option value="7">Algeria</option>
                                          <option value="8">American Samoa</option>
                                          <option value="9">Andorra</option>
                                          <option value="10">Angola</option>
                                          <option value="11">Anguilla</option>
                                          <option value="12">Antarctica</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                    <label class=" form-control-label">State</label>
                                    <div class="input-group">
                                        <select data-placeholder="Choose a State..." class="standardSelect" tabindex="1" name="state">
                                            <option value="" label="default"></option>
                                            <option value="1">Kerala</option>
                                            <option value="2">Tamilnad</option>
                                            <option value="3">Karnataka</option>
                                            <option value="4">Thelunkana</option>
                                            <option value="5">Andhra</option>
                                            <option value="6">Gujarat</option>
                                        </select>
                                    </div>
                                </div>

                                  <div class="form-group">
                                      <label class=" form-control-label">District</label>
                                      <div class="input-group">
                                          <select data-placeholder="Choose a District..." class="standardSelect" tabindex="1" name="district">
                                              <option value="" label="default"></option>
                                              <option value="1">Ernakulam</option>
                                              <option value="2">Trissur</option>
                                              <option value="3">Palakkad</option>
                                              <option value="4">Idukki</option>
                                              <option value="5">Kottayam</option>
                                              <option value="6">Alappuzha</option>
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