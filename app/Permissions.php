<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    public $appends = ['side_menu','page','parent_menu'];


    /**
     * Gets the total candidates attribute.
     *
     * @return     integer  The total candidates attribute.
     */
    public function getPageAttribute() {
    	return Page::where('slug', $this->page_slug)->pluck('menu')->first();
    }

     /**
     * Gets the total candidates attribute.
     *
     * @return     integer  The total candidates attribute.
     */
    public function getParentMenuAttribute() {
    	$parent_slug =  Page::where('slug', $this->page_slug)->pluck('parent_slug')->first();
        return Page::where('slug', $parent_slug)->pluck('menu')->first();
    }

    /**
     * Gets the total candidates attribute.
     *
     * @return     integer  The total candidates attribute.
     */
    public function getSideMenuAttribute() {
    	return Page::where('slug', $this->page_slug)->pluck('side_menu')->first();
    }
}
