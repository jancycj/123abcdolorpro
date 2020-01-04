@extends('layouts.colorpro.app')
@section('content')
<div class="content content-fixed">
    <div class="container pd-20">
        <div class="import-sec-white">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#" >Admin</a></li>
                    <li class="breadcrumb-item"><a href="#" >Customer</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Create New Customer</h4>
                </div>
                
            </div>
        </div>
      <div class="row row-xs">
       
        <div class="col-lg-12 col-md-12 mg-t-10">
              <form method="post" action="{{url('/company/customer')}}">
                  @csrf
                <div class="row">

                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Customer Basic Details</strong> <small> Please choose valid email</small>
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
                                  <label class=" form-control-label">Customer Type</label>
                                  <div class="input-group">
                                      <select data-placeholder="Choose a company..." class="standardSelect form-control" tabindex="1" name="type">
                                          <option value="1">Vendor</option>
                                          <option value="2">Reseller</option>
                                          <option value="3">Suplier</option>
                                          <option value="4">Other</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class=" form-control-label">Country</label>
                                  <div class="input-group">
                                      <select data-placeholder="Choose a Country..." class="standardSelect form-control" tabindex="1" name="country">
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
                                        <select data-placeholder="Choose a State..." class="standardSelect form-control" tabindex="1" name="state">
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
                                          <select data-placeholder="Choose a District..." class="standardSelect form-control" tabindex="1" name="district">
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
        </div><!-- col -->
        
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- content -->

  <div class="modal fade" id="positionSelect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">

      <div class="modal-content tx-14">

          {{-- <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel4">Select postions</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}

          <div class="modal-body">
              <h6 class="modal-title" id="exampleModalLabel4">Select postions</h6>
              <div class="row">
                 <!--  <div class="col-12" style="border-right: 1px solid #e6e2e2;">
                      <v-select label="name" :options="jobs" :multiple="true" v-model="selected_jobs"></v-select>
                  </div> -->

              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-outline-warning tx-13"
                  @click.prevent="remove_postions()">Remove</button>
              <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="add_postions()">Add</button>
          </div>
      </div>
  </div>
</div>
@endsection
@section('script')

   
<script>
    var app = new Vue({
       el: '#app',
       data: {
           showMenu: false,
           roles:[
             {role:'Admin',url:'#'},
             {role:'Candidate',url:'#'},
             {role:'User',url:'#'},
           ]
       },
   methods: {
         toggleShow: function() {
           this.showMenu = !this.showMenu;
         },
         get_roles: function(){
                     $("#positionSelect").modal('toggle');
           
         }
     
     },
     mounted(){
     }
    });
</script>
@endsection