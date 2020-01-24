<?php

namespace App\Traits;

use App\Order;
use Illuminate\Http\Request;

trait OrderTrait {

    /**
     * Does very basic image validity checking and stores it. Redirects back if somethings wrong.
     * @Notice: This is not an alternative to the model validation for this field.
     *
     * @param Request $request
     * @return $this|false|string
     */
    public function is_order_finished($id) {

        
        $order = Order::where('id',$id)->with('details')->first();
        $order_details = $order['details'];
        $finished = 0;
        foreach($order_details as $order_detail){

            $rec = isset($order_detail->recieved_quantity)?$order_detail->recieved_quantity:0;
            $rew = isset($order_detail->rework_quantity)?$order_detail->rework_quantity:0;
            $rej = isset($order_detail->rejected_quantity)?$order_detail->rejected_quantity:0;
            $qt = isset($order_detail->quantity)?$order_detail->quantity:0;
            $total = $rec+$rew +$rej;

            if($qt <= $total){
                return $finished = 1;
            }

        }
        return $finished;

    }

}
