<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
               <nav class="nav nav-sidebar tx-13">
              <a href="#" class="nav-link active" @click="loadMenu('ab')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>Inbox</span> <span class="badge"><i class="fa fa-hand-o-right"></i></span></a>
              <a href="#" class="nav-link"  @click="loadMenu('cd')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg> <span>Starred</span> <span class="badge"><i class="fa fa-hand-o-right"></i></span></a>
              <a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> <span>Important</span> <span class="badge"><i class="fa fa-hand-o-right"></i></span></a>
              <a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> <span>Sent Mail</span> <span class="badge"><i class="fa fa-hand-o-right"></i></span></a>
              <a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> <span>Drafts</span> <span class="badge"><i class="fa fa-hand-o-right"></i></span></a>
              <a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg> <span>Spam</span> <span class="badge"><i class="fa fa-hand-o-right"></i></span></a>
              <a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> <span>Trash</span> <span class="badge"><i class="fa fa-hand-o-right"></i></span></a>
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
                menu_array : {
                    ab : [
                        {
                            menu:'Masters',
                            url:'#',
                            sub_menus:[
                                {
                                    menu:'Masters',
                                    url:'/company/lookup',
                                },
                                {
                                    menu:'Items',
                                    url:'/company/item',
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
                                    menu:'Rates',
                                    url:'/company/rates',
                                },
                                {
                                    menu:'Process',
                                    url:'/company/process',
                                },
                                {
                                    menu:'Shade',
                                    url:'/company/shade',
                                },
                            ]
                        },
                        
                        {
                            menu:'Transactions',
                            url:'#',
                            sub_menus:[
                                {
                                    menu:'Material transfer',
                                    url:'/company/transaction',
                                },
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
                            ]
                        },
                        {
                            menu:'Clients',
                            url:'company/customer',
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
                            ]
                        }
                    ],
                    cd : [
                        {
                            menu:'Masters1',
                            url:'#',
                            sub_menus:[
                                {
                                    menu:'Masters',
                                    url:'/company/lookup',
                                },
                                {
                                    menu:'Items',
                                    url:'/company/item',
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
                                    menu:'Rates',
                                    url:'/company/rates',
                                },
                                {
                                    menu:'Process',
                                    url:'/company/process',
                                },
                            ]
                        },
                        
                        {
                            menu:'Transactions',
                            url:'#',
                            sub_menus:[
                                {
                                    menu:'Material transfer',
                                    url:'/company/transaction',
                                },
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
                            ]
                        },
                        {
                            menu:'Clients',
                            url:'company/customer',
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
                            ]
                        }
                    ]
                }
            }
        },
        mounted() {
           
        },
        created: function () {
        },
        methods: {
            loadMenu(menu){
                
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
