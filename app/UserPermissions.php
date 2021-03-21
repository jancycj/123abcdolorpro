<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermissions extends Model
{
    public $appends = ['route'];


    /**
     * Gets the name attribute.
     *
     * @return     <type>  The name attribute.
     */
    public function getRouteAttribute() {

    	$permission = Permissions::where('id', $this->permission_id)->first();
    	return $permission->url;
    }
}
