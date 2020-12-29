<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
               <nav class="nav nav-sidebar tx-13">
              <a href="#" class="nav-link active" v-for="(menu,index) in menu_array" @click="loadMenu(index)" v-bind:key="index"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>{{index}}</span> <span class="badge"><i class="fa fa-hand-o-right"></i></span></a>
            </nav>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'side',
        data(){
            return {
                // menu_array : {
                //     ab : [
                //         {
                //             menu:'Masters',
                //             url:'#',
                //             sub_menus:[
                //                 {
                //                     menu:'Masters',
                //                     url:'/company/lookup',
                //                 },
                //                 {
                //                     menu:'Items',
                //                     url:'/company/item',
                //                 },
                //                 {
                //                     menu:'QC plans',
                //                     url:'/company/qc',
                //                 },
                //                 {
                //                     menu:'Inventory',
                //                     url:'/company/stocks',
                //                 },
                //                 {
                //                     menu:'Rates',
                //                     url:'/company/rates',
                //                 },
                //                 {
                //                     menu:'Process',
                //                     url:'/company/process',
                //                 },
                //                 {
                //                     menu:'Shade',
                //                     url:'/company/shade',
                //                 },
                //             ]
                //         },
                        
                //         {
                //             menu:'Transactions',
                //             url:'#',
                //             sub_menus:[
                //                 {
                //                     menu:'Material transfer',
                //                     url:'/company/transaction',
                //                 },
                //                 {
                //                     menu:'Orders',
                //                     url:'/company/orders',
                //                 },
                //                 {
                //                     menu:'Create Order',
                //                     url:'/company/orders/create',
                //                 },
                //                 {
                //                     menu:'Quality inspection',
                //                     url:'/company/order/reciept',
                //                 },
                //             ]
                //         },
                //         {
                //             menu:'Clients',
                //             url:'company/customer',
                //             sub_menus : []
                //         },
                //         {
                //             menu:'Reports',
                //             url:'#',
                //             sub_menus:[
                //                 {
                //                     menu:'Stock Report',
                //                     url:'/company/report/stock',
                //                 },
                //                 {
                //                     menu:'Purchase orders',
                //                     url:'/company/report/register',
                //                 },
                //                 {
                //                     menu:'Pending orders',
                //                     url:'/company/report/po',
                //                 },
                //                 {
                //                     menu:'Goods recieved/Inspection note',
                //                     url:'/company/orders',
                //                 },
                //                 {
                //                     menu:'MIR register-bought out',
                //                     url:'/company/report/mir',
                //                 },
                //             ]
                //         }
                //     ],
                //     cd : [
                //         {
                //             menu:'Masters1',
                //             url:'#',
                //             sub_menus:[
                //                 {
                //                     menu:'Masters',
                //                     url:'/company/lookup',
                //                 },
                //                 {
                //                     menu:'Items',
                //                     url:'/company/item',
                //                 },
                //                 {
                //                     menu:'QC plans',
                //                     url:'/company/qc',
                //                 },
                //                 {
                //                     menu:'Inventory',
                //                     url:'/company/stocks',
                //                 },
                //                 {
                //                     menu:'Rates',
                //                     url:'/company/rates',
                //                 },
                //                 {
                //                     menu:'Process',
                //                     url:'/company/process',
                //                 },
                //             ]
                //         },
                        
                //         {
                //             menu:'Transactions',
                //             url:'#',
                //             sub_menus:[
                //                 {
                //                     menu:'Material transfer',
                //                     url:'/company/transaction',
                //                 },
                //                 {
                //                     menu:'Orders',
                //                     url:'/company/orders',
                //                 },
                //                 {
                //                     menu:'Create Order',
                //                     url:'/company/orders/create',
                //                 },
                //                 {
                //                     menu:'Quality inspection',
                //                     url:'/company/order/reciept',
                //                 },
                //             ]
                //         },
                //         {
                //             menu:'Clients',
                //             url:'company/customer',
                //             sub_menus : []
                //         },
                //         {
                //             menu:'Reports',
                //             url:'#',
                //             sub_menus:[
                //                 {
                //                     menu:'Stock Report',
                //                     url:'/company/report/stock',
                //                 },
                //                 {
                //                     menu:'Purchase orders',
                //                     url:'/company/report/register',
                //                 },
                //                 {
                //                     menu:'Pending orders',
                //                     url:'/company/report/po',
                //                 },
                //                 {
                //                     menu:'Goods recieved/Inspection note',
                //                     url:'/company/orders',
                //                 },
                //                 {
                //                     menu:'MIR register-bought out',
                //                     url:'/company/report/mir',
                //                 },
                //             ]
                //         }
                //     ]
                // }
                 menu_array : {
                    "Supply Chain" : [
                        {
                            menu:'Lookup',
                            url:'#',
                            sub_menus:[
                                {
                                    menu:'Lookup',
                                    url:'/company/lookup',
                                },
                                {
                                    menu:'Items',
                                    url:'/company/item',
                                },
                                {
                                    menu:'Purchase request',
                                    url:'/company/indent',
                                },
                                {
                                    menu:'QC plans',
                                    url:'/company/qc',
                                },
                                {
                                    menu:'Inventory',
                                    url:'/company/stocks',
                                },
                                {
                                    menu:'Purchase Rates',
                                    url:'/company/rates',
                                },
                                {
                                    menu:'Process rates',
                                    url:'/company/process',
                                },
                            ]
                        },
                        {
                            menu:'Transactions',
                            url:'#',
                            sub_menus:[
                               
                                {
                                    menu:'Orders',
                                    url:'/company/orders',
                                },
                                {
                                    menu:'Create Order',
                                    url:'/company/orders/create',
                                },
                                {
                                    menu:'Quality inspection',
                                    url:'/company/order/reciept',
                                },
                                {
                                    menu:'Store Request',
                                    url:'/company/order/reciept',
                                },
                                {
                                    menu:'Store issue',
                                    url:'/company/order/reciept',
                                },
                                {
                                    menu:' Receipt from Customer',
                                    url:'/company/order/reciept',
                                },
                                {
                                    menu:'Bin Card',
                                    url:'/company/order/reciept',
                                },
                                {
                                    menu:'Material transfer to other units',
                                    url:'/company/transaction',
                                },
                                {
                                    menu:'Material Receipt from other units',
                                    url:'/company/transaction',
                                }
                            ]
                        },
                        {
                            menu:'Clients',
                            url:'/company/customer',
                            sub_menus : []
                        },
                        {
                            menu:'Reports',
                            url:'#',
                            sub_menus:[
                                {
                                    menu:'Stock Report',
                                    url:'/company/report/stock',
                                },
                                {
                                    menu:'Purchase orders',
                                    url:'/company/report/register',
                                },
                                {
                                    menu:'Pending orders',
                                    url:'/company/report/po',
                                },
                                {
                                    menu:'Goods recieved/Inspection note',
                                    url:'/company/orders',
                                },
                                {
                                    menu:'MIR register-bought out',
                                    url:'/company/report/mir',
                                },
                                {
                                    menu:'Yarnn Status Report consolidated alll units',
                                    url:'/company/report/mir',
                                },
                            ]
                        }
                    ],
                    'Production Planning and Control': [
                                {
                                    menu:'Lookup',
                                    url:'#',
                                    sub_menus:[
                                        {
                                            menu:'Lookup',
                                            url:'/company/lookup',
                                        },
                                        {
                                            menu:'Article Master',
                                            url:'/company/article',
                                        },
                                        
                                        {
                                            menu:'Assortment Master',
                                            url:'/company/assortment',
                                        },
                                        {
                                            menu:'Shade Master',
                                            url:'/company/shade',
                                        },
                                        {
                                            menu:'Machine Master',
                                            url:'/company/rates',
                                        },
                                        {
                                            menu:'Receipy Creation',
                                            url:'/company/process',
                                        },
                                    ]
                                },
                                
                                {
                                    menu:'Transactions',
                                    url:'#',
                                    sub_menus:[
                                        {
                                            menu:'Work Order Generation',
                                            url:'/company/transaction',
                                        },
                                        {
                                            menu:'Materail DC for OSP',
                                            url:'/company/orders',
                                        },
                                        {
                                            menu:'Materail Receipt OSP',
                                            url:'/company/orders/create',
                                        },
                                            
                                    ]
                                },
                                {
                                    menu:'Reports',
                                    url:'#',
                                    sub_menus:[
                                        {
                                        menu:'Assortments',
                                            url:'/company/report/stock',
                                    
                                        },
                                        {
                                            menu:'Shades',
                                            url:'/company/report/stock',
                                        },

                                        {
                                            menu:'Work order Register',
                                            url:'/company/report/stock',
                                        },
                                        {
                                            menu:'Receipy Master Report ',
                                            url:'/company/report/stock',
                                        },
                                    
                                    ]
                                }
                    ],
                       
                   'Production' : [
                        {
                            menu:'Production',
                            url:'#',
                            sub_menus:[
                                {
                                    menu:'Dyeing',
                                    url:'/company/lookup',
                                },
                                {
                                    menu:'Drug line Generation',
                                    url:'/company/item',
                                },
                                {
                                    menu:'Drug line Repot',
                                    url:'/company/qc',
                                },
                                 {
                                    menu:'Dyeing Production  Repot',
                                    url:'/company/qc',
                                },
                                {
                                    menu:'Vessel loading',
                                    url:'/company/stocks',
                                },
                                {
                                    menu:'vessel unloading',
                                    url:'/company/rates',
                                },
                                {
                                    menu:'Passing',
                                    url:'/company/process',
                                },
                                {
                                    menu:'re dip',
                                    url:'/company/process',
                                },
                                {
                                    menu:'re dye',
                                    url:'/company/process',
                                },
                                {
                                    menu:'Dyeing Production Report',
                                    url:'/company/process',
                                },
                                {
                                    menu:'Dye and Chemical consumption Report',
                                    url:'/company/process',
                                },
                                {
                                    menu:'Pending Dyeing jobs',
                                    url:'/company/process',
                                },
                            ]
                        },
                        
                        {
                            menu:'Tube winding',
                            url:'#',
                            sub_menus:[
                                {
                                    menu:'production entry',
                                    url:'/company/transaction',
                                },
                                {
                                    menu:'production report',
                                    url:'/company/orders',
                                },
                                {
                                    menu:'pending works',
                                    url:'/company/orders/create',
                                },
                                
                            ]
                        },
                        
                        {
                            menu:'packing',
                            url:'#',
                            sub_menus:[
                                {
                                    menu:'production entry',
                                    url:'/company/report/stock',
                                },
                                {
                                    menu:'production report',
                                    url:'/company/report/register',
                                },
                                {
                                    menu:'Pending works',
                                    url:'/company/report/po',
                                },
                             
                            ]
                        }
                    ],
                    'Customer Order Processing' : [
                        {
                            menu:'Order processing',
                            url:'#',
                            sub_menus:[
                                {
                                    menu:'Lookup',
                                    url:'/company/lookup',
                                },
                                {
                                    menu:'Customer master',
                                    url:'/company/customer',
                                },
                                {
                                    menu:'transanctions',
                                    url:'/company/qc',
                                },
                                {
                                    menu:'Enquiry',
                                    url:'/company/stocks',
                                },
                                {
                                    menu:'Quotation',
                                    url:'/company/rates',
                                },
                                {
                                    menu:'orders',
                                    url:'/company/process',
                                },
                                {
                                    menu:'Performa invoice',
                                    url:'/company/process',
                                },
                                {
                                    menu:'invoice',
                                    url:'/company/process',
                                },
                            ]
                        },
                        {
                            menu:'reports',
                            url:'#',
                            sub_menus:[
                                {
                                    menu:'enquiry register',
                                    url:'/company/transaction',
                                },
                                {
                                    menu:'quotation register',
                                    url:'/company/orders',
                                },
                                {
                                    menu:'order register',
                                    url:'/company/orders/create',
                                },
                
                                {
                                    menu:'invoice',
                                    url:'/company/report/stock',
                                },
                                                            
                            ]
                        }
                    ]
                }
            }
        },
        mounted() {
           
        },
        created: function () {
            window.menu=this.menu_array["Supply Chain"];
        },
        methods: {
            loadMenu(menu){
                console.log(this.menu_array[menu])
                localStorage.menus = JSON.stringify(this.menu_array[menu]);
                location.reload();
            }
        }

    }
</script>
<style lang="css" scoped>
    
    a.nav-link {
        padding: 18px !important;
        border: 1px solid #193ae1;
    }
    .nav-sidebar .nav-link .badge {
        margin-left: auto;
        color: #3b1ce0;
        font-weight: 400;
        font-size: 14px;
    }
</style>
