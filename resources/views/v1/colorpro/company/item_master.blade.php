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
                        <h5 class="hd">#Item Master</h5>
                    </div>
                </div>
                <div class="d-none d-md-block">
                    <button class="btn btn-sm pd-x-15 btn-white btn-uppercase" @click="downloadXl"><i data-feather="save" class="wd-10 mg-r-5"></i> Downoload XL sample</button>
                    <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5" @click="$refs.file.click()"><i data-feather="upload" class="wd-10 mg-r-5"></i> Import</button>
                    <input type="file" id="file" ref="file" v-on:change="handleFileUpload()" style="display: none" />
                </div>
            </div>
        </div>

        <div class="row row-xs">

            <div class="col-lg-12 col-md-12 mg-t-10">
                <div class="card mg-b-2">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-5 form-control-label">Item name*</label>
                                    <div class="col-7 input-group">
                                        <input autocomplete="off" class="form-control" v-model="item_obj.name" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-5 col-sm-6" @keydown="getItemPopup($event)">
                                <div class="form-group row">
                                    <label class="col-5 form-control-label">part_no* </label>
                                    <div class="col-7 input-group">
                                        <input autocomplete="off" class="form-control" v-model="item_obj.part_no">
                                    </div>
                                </div>
                            </div>
                        </div>








                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="main-tab" data-toggle="tab" href="#main" role="tab" aria-controls="home" aria-selected="true">Main</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="inventory-tab" data-toggle="tab" href="#inventory" role="tab" aria-controls="profile" aria-selected="false">Inventory</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="purchasing-tab" data-toggle="tab" href="#purchasing" role="tab" aria-controls="contact" aria-selected="false">Purchasing</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="planning-tab" data-toggle="tab" href="#planning" role="tab" aria-controls="contact" aria-selected="false">Planning</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="costing-tab" data-toggle="tab" href="#costing" role="tab" aria-controls="contact" aria-selected="false">Costing</a>
                                    </li>
                                </ul>
                                <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent">
                                    <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">part_type</label>
                                                    <div class="col-7 input-group">
                                                        <select data-placeholder="Choose a Category..." class="standardSelect form-control" tabindex="1" name="category" v-model="item_obj.part_type">
                                                            <option value="V">V(Variant)</option>
                                                            <option value="A">A(Assembly)</option>
                                                            <option value="C">C(Component) </option>
                                                            <option value="R">R(Raw MAterial)</option>
                                                            <option value="T">T(Tool)</option>
                                                            <option value="O">O(Consumable)</option>
                                                            <option value="W">W(Semi finished)</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">sourcing_code</label>
                                                    <div class="col-7 input-group" @keydown="getContryPopup($event)">
                                                        <select data-placeholder="Choose a Category..." class="standardSelect form-control" tabindex="1" name="category" v-model="item_obj.sourcing_code">
                                                            <option value="MFG">MFG(Manufacturing)</option>
                                                            <option value="PUR">PUR(Standard Purchase)</option>
                                                            <option value="SUB">SUB(Sub Contract Purchase) </option>
                                                            <option value="OSV">OSV(Outside Processing)</option>
                                                            <option value="PHT">PHT(Phantom)</option>
                                                            <option value="IMP">IMP(Import)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getUnitPopup($event)">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">unit</label>
                                                    <div class="col-7 input-group">
                                                        <input type="text" autocomplete="off" class="form-control" v-model="unit">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12 input-group">
                                                        <input autocomplete="off" class="form-control" name="unit" v-model="unit_name" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">catelog_drwaing_no</label>
                                                    <div class="col-7 input-group">
                                                        <input autocomplete="off" class="form-control" v-model="item_obj.catelog_drwaing_no">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">hsn_code</label>
                                                    <div class="col-7 input-group">
                                                        <input autocomplete="off" class="form-control" v-model="item_obj.hsn_code">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">Created at</label>
                                                    <div class="col-7 input-group">
                                                        <input autocomplete="off" class="form-control" v-model="item_obj.created_date" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">Updated at</label>
                                                    <div class="col-7 input-group">
                                                        <input class="form-control" v-model="item_obj.updated_date" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">status</label>
                                                    <div class="col-7 input-group">
                                                        <select data-placeholder="Select unit" class="standardSelect form-control" tabindex="1" v-model="item_obj.status">
                                                            <option value="active">Active</option>
                                                            <option value="inactive">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-sm-6" @keydown="getCategoryPopup($event)">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">Category</label>
                                                    <div class="col-7 input-group">
                                                        <input autocomplete="off" class="form-control" name="unit" v-model="category">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12 input-group">
                                                        <input autocomplete="off" class="form-control" name="unit" v-model="category_name" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane fade" id="inventory" role="inventory" aria-labelledby="profile-tab">
                                        <h6>Profile</h6>
                                        <p>...</p>
                                    </div> -->
                                    <div class="tab-pane fade" id="purchasing" role="purchasing" aria-labelledby="contact-tab">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">list_price</label>
                                                    <div class="col-7 input-group">
                                                        <input autocomplete="off" class="form-control" name="unit" v-model="item_ob.list_price" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">wt_average_rate</label>
                                                    <div class="col-7 input-group">
                                                        <input class="form-control" v-model="item_ob.wt_average_rate" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getSupplierPopup($event)">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">default_supplier</label>
                                                    <div class="col-7 input-group">
                                                        <input type="text" autocomplete="off" class="form-control" v-model="default_supplier_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12 input-group">
                                                        <input autocomplete="off" class="form-control" name="unit" v-model="default_supplier_code" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6" @keydown="getBuyerPopup($event)">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">default_buyer</label>
                                                    <div class="col-7 input-group">
                                                        <input type="text" autocomplete="off" class="form-control" v-model="default_buyer_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12 input-group">
                                                        <input autocomplete="off" class="form-control" name="unit" v-model="default_buyer_code" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane fade" id="planning" role="planning" aria-labelledby="contact-tab">
                                        <h6>Contact</h6>
                                        <p>...</p>
                                    </div> -->
                                    <div class="tab-pane fade" id="costing" role="costing" aria-labelledby="contact-tab">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">gst_cost</label>
                                                    <div class="col-7 input-group">
                                                        <input autocomplete="off" class="form-control" name="unit" v-model="item_ob.gst_cost" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">purchase_cost</label>
                                                    <div class="col-7 input-group">
                                                        <input class="form-control" v-model="item_ob.purchase_cost" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">labor_cost</label>
                                                    <div class="col-7 input-group">
                                                        <input autocomplete="off" class="form-control" name="unit" v-model="item_ob.labor_cost" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">material_cost</label>
                                                    <div class="col-7 input-group">
                                                        <input class="form-control" v-model="item_ob.material_cost" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">other_cost</label>
                                                    <div class="col-7 input-group">
                                                        <input autocomplete="off" class="form-control" name="unit" v-model="item_ob.other_cost" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-5 form-control-label">total_cost</label>
                                                    <div class="col-7 input-group">
                                                        <input class="form-control" v-model="item_ob.total_cost" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer ">
                        <div class="row order-ft">
                            <div class="col-md-2 col-lg-2 col-sm-6 offset-8 mg-t-5" v-if="print_flag">
                                <button class="btn btn-outline-danger btn-block " @click="downloadPdf()">Print Item</button>
                            </div>
                            <div class="col-md-2 col-lg-2 col-sm-12 offset-md-6 mg-t-5" v-if="!print_flag && !update_flag">
                                <button class="btn btn-primary btn-block " @click="save_item()">Save</button>
                            </div>
                            <div class="col-md-2 col-lg-2 col-sm-12 offset-6 mg-t-5" v-if="!print_flag && update_flag">
                                <button class="btn btn-primary btn-block ">Update</button>
                            </div>
                            <!-- <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5">
                                <button class="btn btn-warning btn-block " @click="clear_customer()">Delete</button>
                            </div> -->
                            <div class="col-md-2 col-lg-2 col-sm-12  mg-t-5">
                                <button class="btn btn-secondary btn-block " @click="clear_customer()">Cancel</button>
                            </div>
                        </div>

                    </div>

                </div><!-- card-->
            </div><!-- col -->

        </div><!-- row -->

    </div><!-- container -->
</div><!-- content -->

<div class="modal fade" id="unitPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                    <choose-component :id="'units'" :table="'lookup_masters'" :fields="['id','lookup_value','lookup_description']" :search_filed="'lookup_value'" :where_field="'lookup_key'" :where_value="'UNIT'" @selected="getUnit($event)"></choose-component>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div><!-- choose count 1modal end -->
<div class="modal fade" id="categoryPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                    <choose-component :id="'units'" :table="'lookup_masters'" :fields="['id','lookup_value','lookup_description']" :search_filed="'lookup_value'" :where_field="'lookup_key'" :where_value="'ITEM CATEGORY'" @selected="getCategory($event)"></choose-component>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div><!-- choose count 1modal end -->
<div class="modal fade" id="itemPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                    <choose-component :id="'items'" :table="'items'" :fields="['id','name','part_no']" :search_filed="'part_no'" @selected="getItem($event)"></choose-component>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div><!-- choose count 1modal end -->
<div class="modal fade" id="supplierPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                    <choose-customer @customer="getCostomer($event)"></choose-customer>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div><!-- choose count 1modal end -->
<div class="modal fade" id="buyerPopup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content tx-14 card">

            <div class="modal-body">

                <div class="card-body card-block">
                    <choose-customer @customer="getBuyer($event)"></choose-customer>

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


<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table').DataTable();
    });
</script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            showMenu: false,
            item: {},
            errors: [],
            item_ob: {},
            item_obj: {},
            opening: {},
            units: [],
            categories: [],
            file: '',
            unit_name: "",
            unit: "",
            category: "",
            category_name: "",
            print_flag: false,
            update_flag: false,
            default_supplier_name :'',
            default_supplier_code : '',
            default_buyer_name :'',
            default_buyer_code : '',
        },
        methods: {
            toggleShow: function() {
                this.showMenu = !this.showMenu;
            },
            create_item: function() {
                $("#addItem").modal('toggle');

            },
            save_item: function() {
                console.log(this.item_obj);

                axios.post('/admin/items', this.item_obj)
                    .then(response => {
                        alert('saved succefully');

                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                        console.log(this.errors)
                    });
            },
            /* get item
             **/
            get_item_by: function(id) {

                var vm = this;
                axios.get('/admin/items/' + id).then((response) => {
                    vm.item_ob = response.data;
                    $("#itemModal").modal('toggle');
                }, (error) => {
                    // vm.errors = error.errors;
                });

            },
            /*
            get taxes
            **/
            get_unit: function() {

                var vm = this;
                axios.get('/general/lookup?json=true&&key=UNIT').then((response) => {
                    vm.units = response.data;

                }, (error) => {
                    // vm.errors = error.errors;
                });

            },
            /*
            get taxes
            **/
            get_category: function() {

                var vm = this;
                axios.get('/general/lookup?json=true&&key=ITEM CATEGORY').then((response) => {
                    vm.categories = response.data;

                }, (error) => {
                    // vm.errors = error.errors;
                });

            },
            /*
            update stock **/
            update_item_ob: function() {

                axios.put('/admin/items/' + this.item_ob.id, this.item_ob)
                    .then(response => {
                        this.item_ob = {};
                        $("#itemModal").modal('toggle');
                        $(".modal-backdrop").remove();
                        alert('successfully updated!');
                        location.reload();

                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                        console.log(this.errors)
                    });
            },
            downloadXl: function() {
                let fileName = 'item_master';
                axios({
                    url: "/company/item_import",
                    method: "GET",
                    responseType: "blob",
                }).then(response => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement("a");
                    link.href = url;
                    link.setAttribute("download", fileName.split(" ").join("_") + ".xlsx");
                    document.body.appendChild(link);
                    link.click();
                });
            },
            /* upload handling*/
            handleFileUpload() {


                this.file = this.$refs.file.files[0];
                // this.candidate.profile_img = URL.srcObject(file);

                let formData = new FormData();
                formData.append('file', this.file);
                axios.post('/company/item_import',
                        formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            },
                            onUploadProgress: progressEvent => {
                                // this.upload_status = true;
                                // this.value=Math.round(  progressEvent.loaded / progressEvent.total * 100 );
                            }
                        }
                    ).then(response => {
                        alert('succesfully imported data');
                        // this.candidate.profile_img = response.data;
                        // this.upload_status = false;
                        // this.profile_image_upload_flag = true;
                        // this.update_candidate();

                    })
                    .catch((error) => {
                        console.log('FAILURE!!');
                    });
            },
            getUnitPopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                    $("#unitPopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },
            getUnit: function(ev) {
                console.log(ev)
                this.item_obj.unit_id = ev.id;
                this.unit_name = ev.lookup_description;
                this.unit = ev.lookup_value;
                $("#unitPopup").modal('toggle');

            },

            getCategoryPopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                    $("#categoryPopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },
            getCategory: function(ev) {
                console.log(ev)
                this.item_obj.category_id = ev.id;
                this.category_name = ev.lookup_description;
                this.category = ev.lookup_value;
                $("#categoryPopup").modal('toggle');

            },
            getItemPopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                    $("#statePopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },
            getSupplierPopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                    $("#supplierPopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },
            getCostomer: function(ev) {
                console.log(ev)
                this.item_obj.default_supplier   = ev.id;
                this.default_supplier_name          = ev.name;
                this.default_supplier_code               = ev.short_name;
                $("#supplierPopup").modal('toggle');

            },
            getBuyerPopup: function(event) {
                console.log(event)
                if (event.code == 'F1' || event.code == 'F2') {
                    $("#buyerPopup").modal('toggle');
                    // this.get_article_by_number();
                }
            },
            getBuyer: function(ev) {
                console.log(ev)
                this.item_obj.default_supplier          = ev.id;
                this.default_buyer_name                 = ev.name;
                this.default_buyer_code                 = ev.short_name;
                $("#buyerPopup").modal('toggle');

            },

        },
        mounted() {
            this.get_unit();
            this.get_category();
            // $("#textboxID").focus();

        }
    });
</script>
@endsection