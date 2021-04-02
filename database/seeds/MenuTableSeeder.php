<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return DB::table('pages')->insert([   
            [       
                'side_menu' => 'Admin', 
               'parent_slug' => 'parent', 
               'slug' => 'admin_master', 
               'menu' => 'Masters', 
               'role_id' => 3,
               'icon' => '',
               'url' => '#',
               'status' => 'active',
            ],

           [
               'side_menu' => 'Admin', 
               'parent_slug' => 'admin_master', 
               'slug' => 'employee', 
               'menu' => 'Employee Master', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/lookup',
               'status' => 'active',

           ],


            [
               'side_menu' => 'Admin', 
               'parent_slug' => 'admin_master', 
               'slug' => 'user', 
               'menu' => 'Users', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/lookup',
               'status' => 'active',

           ],

            [
               'side_menu' => 'Admin', 
               'parent_slug' => 'admin_master', 
               'slug' => 'password_change', 
               'menu' => 'User password Change', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/lookup',
               'status' => 'active',

           ],

            [    'side_menu' => 'Admin', 
               'parent_slug' => 'parent', 
               'slug' => 'admin_reports', 
               'menu' => 'MIS Reports', 
               'role_id' => 3,
               'icon' => '',
               'url' => '#',
               'status' => 'active',
            ],

            [
               'side_menu' => 'Admin', 
               'parent_slug' => 'admin_reports', 
               'slug' => 'admin_mis', 
               'menu' => 'mis', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/lookup',
               'status' => 'active',

           ],


            [   'side_menu' => 'Supply chain', 
               'parent_slug' => 'parent', 
               'slug' => 'scm_master', 
               'menu' => 'Masters', 
               'role_id' => 3,
               'icon' => '',
               'url' => '#',
               'status' => 'active',
            ],

            [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_master', 
               'slug' => 'scm_lookup', 
               'menu' => 'Lookup', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/lookup',
               'status' => 'active',

           ],

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_master', 
               'slug' => 'items', 
               'menu' => 'Items', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/item',
               'status' => 'active',

           ],

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_master', 
               'slug' => 'vendor', 
               'menu' => 'Vendor', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/customer/create',
               'status' => 'active',

           ],

            [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_master', 
               'slug' => 'inventory', 
               'menu' => 'Inventory', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/stocks',
               'status' => 'active',

           ],

            [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_master', 
               'slug' => 'qc_plans', 
               'menu' => 'Qc plans', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/qc',
               'status' => 'active',

           ],

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_master', 
               'slug' => 'purchase_rates', 
               'menu' => 'Purchase Rates', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/rates',
               'status' => 'active',

           ],

          [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_master', 
               'slug' => 'process_rates', 
               'menu' => 'Process Rates', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/process',
               'status' => 'active',

           ],

          [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_master', 
               'slug' => 'po_terms', 
               'menu' => 'Purchase Terms', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/poterms',
               'status' => 'active',

           ],

          [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_master', 
               'slug' => 'po_terms_updation', 
               'menu' => 'PO Terms updation', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/poterms',
               'status' => 'active',

           ],
          
            [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_master', 
               'slug' => 'ROL_updation', 
               'menu' => 'ROL Updation', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/poterms',
               'status' => 'active',

           ],

            [
                'side_menu' => 'Supply chain', 
               'parent_slug' => 'parent', 
               'slug' => 'scm_transaction', 
               'menu' => 'Transactions', 
               'role_id' => 3,
               'icon' => '',
               'url' => '#',
               'status' => 'active',

            ],

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'purchase_request', 
               'menu' => 'Purchase request', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/indent',
               'status' => 'active',
           ] ,

        
          [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'purchase_order', 
               'menu' => 'Purchase Order', 
               'role_id' => 3,
               'icon' => '',
               'url' => 'company/orders/create',
               'status' => 'active',
           ] ,
          
           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'material_inward', 
               'menu' => 'Material Inward', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/order/reciept',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'quality_inspection', 
               'menu' => 'Quality Inspection', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/order/reciept',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'Po_return', 
               'menu' => 'Purchase Return', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/indent',
               'status' => 'active',
           ] ,
           
           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'stock_update', 
               'menu' => 'Stock Update', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/order/reciept',
               'status' => 'active',
           ] ,

          [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'Fg_Move', 
               'menu' => 'FG Move From Assembly', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/indent',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'bin_card', 
               'menu' => 'Bin Card', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/indent',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'intend_rol', 
               'menu' => 'Purchase request for ROL', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/indent',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'Store_request', 
               'menu' => 'Store Request', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/indent',
               'status' => 'active',
           ] ,
              
           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'store_request_correction', 
               'menu' => 'Store Request Correction', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/indent',
               'status' => 'active',
           ] ,
           
           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'store_issue', 
               'menu' => 'Store Issue', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/indent',
               'status' => 'active',
           ] ,

            [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'stock_correction', 
               'menu' => 'Stock Correction', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/indent',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'po_short_close', 
               'menu' => 'PO Short Closing', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/indent',
               'status' => 'active',
           ] ,
           
           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'receipt_from_customer', 
               'menu' => 'Receipt From Customer', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/scm_transaction',
               'status' => 'active',
           ] ,
           
           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'material_transfer_to_units', 
               'menu' => 'Material Transfer To Other Units', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/scm_transaction',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_transaction', 
               'slug' => 'material_receipt_from_units', 
               'menu' => 'Material Receipt From Other Units', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/indent',
               'status' => 'active',
           ] ,

            [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'parent', 
               'slug' => 'scm_reports', 
               'menu' => 'Reports', 
               'role_id' => 3,
               'icon' => '',
               'url' => '#',
               'status' => 'active',

           ],

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_reports', 
               'slug' => 'stock', 
               'menu' => 'Stock Report', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/report/stock',
               'status' => 'active',
           ] ,

          [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_reports', 
               'slug' => 'po_register', 
               'menu' => 'Purchase orders', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/report/register',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_reports', 
               'slug' => 'po_pending_order', 
               'menu' => 'Pending orders', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/report/po',
               'status' => 'active',
           ] ,
           
           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_reports', 
               'slug' => 'material_inspection', 
               'menu' => 'Goods Received /Inspection Note', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/report/mir',
               'status' => 'active',
           ] ,
          
           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_reports', 
               'slug' => 'material_rbo', 
               'menu' => 'MIR Register-Bought out', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/report/mir',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_reports', 
               'slug' => 'pending_inspection', 
               'menu' => 'Pending Inspection', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/report/mir',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_reports', 
               'slug' => 'rw_rej_register', 
               'menu' => 'Rej/Re work Register', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/report/mir',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_reports', 
               'slug' => 'purchase_rate', 
               'menu' => 'Purchase Rate History', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/report/mir',
               'status' => 'active',
           ] ,

           [
               'side_menu' => 'Supply chain', 
               'parent_slug' => 'scm_reports', 
               'slug' => 'consolidated_yarn', 
               'menu' => 'Consolidated Yarn Report-All Units', 
               'role_id' => 3,
               'icon' => '',
               'url' => '/company/report/mir',
               'status' => 'active',
           ] ,

           [
                'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'parent', 
               'slug' => 'osp_transaction' , 
               'menu' => 'Transactions', 
               'role_id' => 3,
               'icon' => '',
               'url' => '#',
               'status' => 'active',

           ],

           [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_transaction', 
               'slug' => 'osp_orders', 
               'menu' => 'OSP Work Order', 
               'role_id' => 3,
               'icon' => '',
               'url' => ' ',
               'status' => 'active',

           ],

            [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_transaction', 
               'slug' => 'osp_dc', 
               'menu' => 'Raw Material DC', 
               'role_id' => 3,
               'icon' => '',
               'url' => ' ',
               'status' => 'active',

           ],

            [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_transaction', 
               'slug' => 'osp_inward ', 
               'menu' => 'OSP Material Inward', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

            [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_transaction',  
               'slug' => 'inpection_osp', 
               'menu' => 'Inspection of OSP Items', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

            [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_transaction', 
               'slug' => 'osp_inspction', 
               'menu' => 'Inspection OSP items', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],           

            [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_transaction', 
               'slug' => 'osp_stock_update', 
               'menu' => 'Stock Update OSP Items', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],
           
           [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_transaction', 
               'slug' => 'osp_dc_close', 
               'menu' => 'Short Close of OSP DC', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

           [
                'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'parent', 
               'slug' => 'osp_reports', 
               'menu' => 'Reports', 
               'role_id' => 3,
               'icon' => '',
               'url' => '#',
               'status' => 'active',

           ],
           
           
           [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_reports', 
               'slug' => 'osp_register', 
               'menu' => 'Work Order Register', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

           
           [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_reports', 
               'slug' => 'pending_osp', 
               'menu' => 'Pending Work Orders', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

           
           [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_reports', 
               'slug' => 'mir_osp', 
               'menu' => 'Inward Register-OSP', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

           [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_reports', 
               'slug' => 'pend_inspection_osp', 
               'menu' => 'Pending Inspection', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],
           [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_reports', 
               'slug' => 'pending_dc', 
               'menu' => 'Material at vendor side', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],
           [
               'side_menu' => 'Out Side Processing', 
               'parent_slug' => 'osp_reports', 
               'slug' => 'rework_dc', 
               'menu' => 'Re Work Dc Register', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

          [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'parent', 
               'slug' => 'ppc_master', 
               'menu' => 'Master', 
               'role_id' => 3,
               'icon' => '',
               'url' => '#',
               'status' => 'active',

           ],

           
           [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_master', 
               'slug' => 'bom', 
               'menu' => 'Bill Of Material', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],


           [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_master', 
               'slug' => 'machine_master', 
               'menu' => 'Machine Master', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

           [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_master', 
               'slug' => 'process_master', 
               'menu' => 'Process Master', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

           [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_master', 
               'slug' => 'article', 
               'menu' => 'Article Master', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],
           
           [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_master', 
               'slug' => 'assort_master', 
               'menu' => 'Assortment Master', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

           [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_master', 
               'slug' => 'shade_master', 
               'menu' => 'Shade Master', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

           [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_master', 
               'slug' => 'recipe_master', 
               'menu' => 'Recipes Master', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

           [
            'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'parent', 
               'slug' => 'ppc_transaction', 
               'menu' => 'Transactions', 
               'role_id' => 3,
               'icon' => '',
               'url' => '#',
               'status' => 'active',

           ],
           
           [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_transaction', 
               'slug' => 'work_order', 
               'menu' => 'Work Order Generation', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],


           [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_transaction', 
               'slug' => 'boq', 
               'menu' => 'Bill Of Quantity', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

            [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_transaction', 
               'slug' => 'boq_corrections', 
               'menu' => 'Bill of Quantity Correction', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

           [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_transaction', 
               'slug' => 'assy_return', 
               'menu' => 'Assy return ', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

            [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_transaction', 
               'slug' => 'close_wokorder', 
               'menu' => 'Short Clse Work Order', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

            [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'parent', 
               'slug' => 'ppc_reports', 
               'menu' => 'Reports', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ],

            [
               'side_menu' => 'Production Planning and Control', 
               'parent_slug' => 'ppc_reports', 
               'slug' => 'BOQ_report', 
               'menu' => 'Bill of Quantity', 
               'role_id' => 3,
               'icon' => '',
               'url' => '',
               'status' => 'active',

           ] ,
          
           
           ]);
      
    }
}
