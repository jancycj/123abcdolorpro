@extends('layouts.colorpro.app')
@section('style')

<style type="text/css">
    .fade:not(.show) {
        opacity: 5;
    }

    .tab-content {
        margin-bottom: 0 !important;
    }
</style>
<style>
    .order-b {
        right: 4% !important;
        position: absolute !important;
    }

    .order-m {
        right: 1% !important;
        position: absolute !important;
    }

    .label-t {
        /* margin-bottom: 0rem !important; */
        color: #a09e9e !important;
    }

    input#inputAddress {
        max-width: 145px !important;
    }

    /* .order-ft {
            border: 1px solid #dcd7d7;
            padding: 5px;
            margin: 5px;
        } */
    .order-ft {
        border: none;
        border-bottom: 1px solid #dcd7d7;
    }

    .order-cap {
        justify-content: center;
        text-align: center;
        background: #f7f7fd !important;
        padding: 2px !important;
        border-radius: 10px !important;
    }

    .hd {
        color: #19a1bf;

    }

    .import-sec-white {
        padding: 0px 13px !important;
    }

    .form-group {
        margin-bottom: 2px !important;
    }

    input {
        max-height: 28px !important;
    }

    select {
        max-height: 28px !important;
        padding: 5px !important;
    }

    label {
        color: #1c273c !important;
        font-size: 12px !important;
        font-weight: bold;
        margin-bottom: 0px !important;
        text-align: end;

    }

    .table th,
    .table td {
        padding: 3px 5px !important;
        line-height: 1.2 !important;
        font-weight: bold;
    }

    .action-icon {
        font-size: 16px;
        cursor: pointer;
    }

    .table thead th {
        background: #00c9ff45;
    }

    .img-thumbnail {
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div class="content content-fixed">
    <div class="container pd-20">
        <div class="import-sec-white mg-b-5">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <div>
                    <div>
                        <h5 class="hd">#User Master</h5>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row row-xs">

            <div class="col-lg-12 col-md-12 mg-t-10">
                <div class="card mg-b-2">
                    <div class="card-header ">
                        <div class="row order-ft">
                            <div class="col-md-2 col-lg-2 col-sm-12 offset-md-6 mg-t-5" v-if="!print_flag && !update_flag">
                                <button class="btn btn-primary btn-block " @click="save_user()">Save</button>
                            </div>
                            <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5" v-if=" update_flag" @click="update_user()">
                                <button class="btn btn-primary btn-block ">Update</button>
                            </div>
                            <!-- <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5">
                                <button class="btn btn-warning btn-block " @click="clear_customer()">Delete</button>
                            </div> -->
                            <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5">
                                <button class="btn btn-secondary btn-block " @click="cancelOb()">Cancel</button>
                            </div>
                        </div>

                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="main-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="home" aria-selected="true">User Details </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="inventory-tab" data-toggle="tab" href="#inventory" role="tab" aria-controls="profile" aria-selected="false">Inventory</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="purchasing-tab" data-toggle="tab" href="#permissonTab" role="tab" aria-controls="contact" aria-selected="false">Privileges</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="planning-tab" data-toggle="tab" href="#planning" role="tab" aria-controls="contact" aria-selected="false">Planning</a>
                                    </li> -->
                                    
                                </ul>
                                <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getUserPopup($event)">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">Username</label>
                                                    <div class="col-7 input-group">
                                                        <input type="text" autocomplete="off" class="form-control" v-model="user.username">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">Description</label>
                                                    <div class="col-7 input-group">
                                                        <input autocomplete="off" class="form-control" v-model="user.description" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" v-if="!update_flag">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">Password</label>
                                                    <div class="col-7 input-group">
                                                        <input autocomplete="off" type="password" class="form-control" v-model="user.password" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" v-if="!update_flag">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label"> Confirm password</label>
                                                    <div class="col-7 input-group">
                                                        <input autocomplete="off" type="password" class="form-control" v-model="user.confrim_password" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getEmployeePopup($event)">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">Employee</label>
                                                    <div class="col-7 input-group">
                                                        <input type="text" autocomplete="off" class="form-control" v-model="user.employee_code" :disabled="update_flag">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12 input-group">
                                                        <input autocomplete="off" class="form-control" name="unit" v-model="user.employee_name" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" v-if="update_flag">
                                            <div class="col-md-4 col-lg-4 col-sm-6" >
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">Status</label>
                                                    <div class="col-7 input-group">
                                                        <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" v-model="user.status">
                                                            <option value="Active">Active</option>
                                                            <option value="InActive">InActive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane fade" id="permissonTab" role="adrressTab" aria-labelledby="contact-tab">

                                            <add-user @selected="getUserPermission($event)" ref="PrivilegeComponent"></add-user>
                                        

                                    </div> <!-- /permissions -->
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- card-->
            </div><!-- col -->

        </div><!-- row -->

    </div><!-- container -->
</div><!-- content -->


<div class="modal fade" id="EmployeePopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                <raw-component 
                            :id="'poPopupS'"
                            :query="emp_qry" 
                            @selected="getEmployee($event)"
                            ></raw-component>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div><!-- choose count 1modal end -->

<div class="modal fade" id="UserPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                <raw-component 
                            :id="'userPopup'"
                            :query="user_qry" 
                            @selected="getUser($event)"
                            ></raw-component>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div><!-- choose count 1modal end -->


@endsection
@section('script')
<script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/init/datatables-init.js')}}"></script> -->



<script>
var emp_qry = `SELECT emp.id, emp.employee_code, emp.employee_name
FROM employees emp
order by 3
LIMIT 5`;
var user_qry = `SELECT usr.id, usr.username, usr.status
FROM users usr where usr.type = 'employee'
order by 2
LIMIT 5`;
    var app = new Vue({
        el: '#app',
        data: {
            emp_qry : emp_qry,
            user_qry : user_qry,
            showMenu: false,
            user: {
                username:'',
                employee_name : '',
                employee_code : '',
                employee_id : '',
                status_name : '',
                status : '',
            },
            errors: [],
            item_obj : {},
            item_ob : {},
            print_flag: false,
            update_flag: false,
            permissions :  [
            ],
            
        },
        methods: {
            getUserPermission: function(evnt) {
                console.log(evnt);
                this.permissions = evnt;

            },
            toggleShow: function() {
                this.showMenu = !this.showMenu;
            },
            create_item: function() {
                $("#addItem").modal('toggle');

            },
            cancelOb(){
                this.item_obj = {};
                this.unit = '';
                this.unit_name = '';
                this.category = '';
                this.category_name = '';
            },
           

             /* save order 
            **/
            save_user: function(){
                this.user.permissions = this.permissions;
                console.log(this.user);

                if(!this.user.username){
                    alert('please provide a username');
                    return;
                }
                if(!this.user.password){
                    alert('please provide password');
                    return;
                }
                if(this.user.password != this.user.confrim_password){
                    alert('Passwords are incorrect');
                    return;
                }
                if(!this.user.employee_id){
                    
                    alert('please select an employee!');
                    return;
                }
                

                axios.post('/company/user',this.user)
                .then(response => {
                    // this.user.employee_code = response.data.employee_code;
                    // this.print_flag = true;
                    alert('successfully created!');
                })
                .catch((err) =>{
                    this.errors = err.response.data.errors;
                    console.log(this.errors)
                });
            },
            getEmployeePopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                    $("#EmployeePopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },
            getEmployee: function(ev) {
                console.log(ev)
                // this.employee   = ev;
                var vm = this;
        //                 employee_name
            // employee
            vm.user.employee_name = ev.employee_name;
            vm.user.employee_code = ev.employee_code;
            vm.user.employee_id = ev.id;
                $("#EmployeePopup").modal('toggle');

                
            },

            getUserPopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                    $("#UserPopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },
            getUser: function(ev) {
                console.log(ev)
                // this.employee   = ev;
                var vm = this;
                vm.update_flag = true;
                vm.user.username = ev.username;
                vm.user.status = ev.status;
                vm.user.id = ev.id;
                axios.get('/company/user/'+ev.id)
                .then(response => {
                    vm.user = response.data;
                    vm.permissions = response.data.permissions;
                    vm.$refs.PrivilegeComponent.permissions = vm.permissions;
                    $("#UserPopup").modal('toggle');

                })
                .catch((err) =>{
                    this.errors = err.response.data.errors;
                    console.log(this.errors)
                });

                
            },

            /* save order 
            **/
            update_user: function(){
                console.log(this.employee);
                var vm = this;
                vm.user.permissions = vm.permissions;

                axios.put('/company/user/'+ vm.user.id, vm.user)
                .then(response => {
                    this.user = response.data;
                    this.print_flag = true;
                    alert('successfully Updated!');
                })
                .catch((err) =>{
                    this.errors = err.response.data.errors;
                    console.log(this.errors)
                });
            },
            
            
        },
        mounted() {
            // this.get_unit();
            // this.get_category();
            // this.item_obj.status = 'active';
            // $("#textboxID").focus();

        }
    });
</script>
@endsection