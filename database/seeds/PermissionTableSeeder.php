<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return DB::table('permissions')->insert([
            
            [
               'title'=>'Employee Master',
               'type' => 'view', 
               'url' => 'employees.index', 
               'has_limit' => 0,
               'page_slug' => 'employee' , 
           ],

           [
               'title'=>'Employee Master',
               'type' => 'create', 
               'url' => 'employees.store', 
               'has_limit' => 0,
               'page_slug' => 'employee' , 
           ],

           [
               'title'=>'Employee Master',
               'type' => 'edit', 
               'url' => 'clients.show', 
               'has_limit' => 0,
               'page_slug' => 'employee' , 
           ],

       
            [
               'title'=>'Users',
               'type' => 'view', 
               'url' => 'company.user.index', 
               'has_limit' => 0,
               'page_slug' => 'user' , 
           ],

           [
               'title'=>'Users',
               'type' => 'create', 
               'url' => 'company.user.create', 
               'has_limit' => 0,
               'page_slug' => 'user' , 
           ],

           [
               'title'=>'Users',
               'type' => 'edit', 
               'url' => 'company.user.show', 
               'has_limit' => 0,
               'page_slug' => 'user' , 
           ],

            [
               'title'=>'Change Password',
               'type' => 'view', 
               'url' => 'change_password.index', 
               'has_limit' => 0,
               'page_slug' => 'password_change' , 
           ],

           [
               'title'=>'Change Password',
               'type' => 'create', 
               'url' => 'change_password.store', 
               'has_limit' => 0,
               'page_slug' => 'password_change' , 
           ],

           [
               'title'=>'Change Password',
               'type' => 'edit', 
               'url' => 'change_password.show', 
               'has_limit' => 0,
               'page_slug' => 'password_change' , 
           ],
            [
               'title'=>'MIS',
               'type' => 'view', 
               'url' => 'mis.index', 
               'has_limit' => 0,
               'page_slug' => 'admin_mis' , 
           ],

           [
               'title'=>'Lookup',
               'type' => 'view', 
               'url' => 'company.lookup', 
               'has_limit' => 0,
               'page_slug' => 'scm_lookup', 
           ],

           [
               'title'=>'Lookup',
               'type' => 'create', 
               'url' => 'company.lookup.post', 
               'has_limit' => 0,
               'page_slug' => 'scm_lookup' , 
           ],

           [
               'title'=>'Item',
               'type' => 'view', 
               'url' => 'company.item', 
               'has_limit' => 0,
               'page_slug' => 'items' , 
           ],

           [
               'title'=>'Item',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'items' , 
           ],

           [
               'title'=>'Item',
               'type' => 'edit', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'items' , 
           ],

           [
               'title'=>'Item',
               'type' => 'delete', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'items' , 
           ],

           [
               'title'=>'Qc plans',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' =>  'Qc_plans', 
           ],             
           
           [
               'title'=>'Qc plans',
               'type' => 'edit', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'Qc_plans',  
           ],

           [
               'title'=>'Qc plans',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'Qc_plans' , 
           ],

           [
               'title'=>'Qc plans',
               'type' => 'delete', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'Qc_plans' , 
           ],

           [
               'title'=>'Purchase Rates',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' =>  'purchase_rates', 
           ],             
           
           [
               'title'=>'Purchase Rates',
               'type' => 'edit', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'purchase_rates', 
           ],

           [
               'title'=>'Purchase Rates',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'purchase_rates', 
           ],

           [
               'title'=>'Purchase Rates',
               'type' => 'delete', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'purchase_rates', 
           ],

                    
           
           [
               'title'=>'Process rates',
               'type' => 'edit', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'process_rates', 
           ],

           [
               'title'=>'Process rates',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'process_rates', 
           ],

           [
               'title'=>'Process rates',
               'type' => 'delete', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'process_rates', 
           ],

        
            [
               'title'=>'Purchase Request',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'purchase_order' , 
           ],

          
           [
               'title'=>'Purchase Request',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'purchase_order' , 
           ],

           [
               'title'=>'Purchase Request',
               'type' => 'delete', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'purchase_order' , 
           ],

           [
               'title'=>'Purchase Request',
               'type' => 'edit', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'purchase_request' , 
           ],

           [
               'title'=>'Purchase Order',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'purchase_order' , 
           ],

          
           [
               'title'=>'Purchase Order',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'purchase_order' , 
           ],

           [
               'title'=>'Purchase Order',
               'type' => 'delete', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'purchase_order' , 
           ],

           [
               'title'=>'Purchase Order',
               'type' => 'edit', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'purchase_order' , 
           ],
           [
                'title'=>'Purchase Order Approval',
                'type' => 'edit', 
                'url' => 'clients.index', 
                'has_limit' => 1,
                'page_slug' => 'purchase_order' , 
            ],
           
            [
               'title'=>'Material Inward',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'material_inward' , 
           ],

          
           [
               'title'=>'Material Inward',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'material_inward' , 
           ],

           [
               'title'=>'Material Inward',
               'type' => 'delete', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'material_inward' , 
           ],

           [
               'title'=>'Material Inward',
               'type' => 'edit', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'material_inward' , 
           ],
           
           [
               'title'=>'Quality Inspection',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'quality_inspection' , 
           ],

          
           [
               'title'=>'Quality Inspection',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'quality_inspection' , 
           ],

            [
               'title'=>'Stock Update',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'stock_update' , 
           ],

          
           [
               'title'=>'Stock Update',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'stock_update' , 
           ],

            [
               'title'=>'Store Request',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'store_request' , 
           ],

          
           [
               'title'=>'Store Request',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'store_request' , 
           ],

           [
               'title'=>'Store Request',
               'type' => 'delete', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'store_request' , 
           ],

          
           [
               'title'=>'Store Request',
               'type' => 'edit', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'store_request' , 
           ],
           [
               'title'=>'Store Issue',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'store_issue' , 
           ],

          
           [
               'title'=>'Store Issue',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'store_issue' , 
           ],
           [
               'title'=>'Bin Card',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'bin_card' , 
           ],

            [
               'title'=>'Stock Correction',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'stock_correction' , 
           ],

           [
               'title'=>'Receipt From Customer',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'receipt_from_customer' , 
           ],

           [
               'title'=>'Stock Correction',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'stock_correction' , 
           ],
           [
               'title'=>'Material Transfer to Other Units',
               'type' => 'view', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'material_transfer_to_units' , 
           ],

           [
               'title'=>'Material Transfer to Other Units',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'material_transfer_to_units' , 
           ],

            [
               'title'=>'Material Reeipts From Other Units',
               'type' => 'view',
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'material_receipt_from_units' , 
           ],
           
            [
               'title'=>'Material Receipts From Other Units',
               'type' => 'create', 
               'url' => 'clients.index', 
               'has_limit' => 0,
               'page_slug' => 'material_receipt_from_units' , 
           ],
           
       ]);
    }
}
