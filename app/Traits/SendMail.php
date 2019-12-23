<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait SendMail {

    /**
     * Does very basic image validity checking and stores it. Redirects back if somethings wrong.
     * @Notice: This is not an alternative to the model validation for this field.
     *
     * @param Request $request
     * @return $this|false|string
     */
    public function test() {

        

        return 'good';

    }

}
