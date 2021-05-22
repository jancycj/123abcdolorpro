<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $appends = ['submenus_list'];

    /**
     * Gets the total candidates attribute.
     *
     * @return     integer  The total candidates attribute.
     */
    public function getSubmenusListAttribute() {
    	return Page::where('parent_slug', $this->slug)->get();
    }

    public static function employeeMenus($emp_user_id)
    {
        $user_permission_ids =  UserPermissions::where('user_id',$emp_user_id)->pluck('permission_id');
        $page_slugs = Permissions::whereIn('id',$user_permission_ids)->groupBy('page_slug')->pluck('page_slug');
        // $page_slugs = ['admin_master','employee','user','scm_master','scm_lookup'];
        $menus = Page::where('parent_slug','parent')->get();
          $pages = [];
        foreach($menus as $menu){
           $menu->sub_menus = collect($menu->submenus_list)->whereIn('slug',$page_slugs)->values();
           if(count($menu->sub_menus) > 0){
            array_push($pages,$menu->only(['side_menu', 'menu', 'icon','url','sub_menus'])) ;

           }
        }
        return collect($pages)->groupBy('side_menu');
    }

    public static function adminMenus()
    {
        $page_slugs = Permissions::groupBy('page_slug')->pluck('page_slug');
        // $page_slugs = ['admin_master','employee','user','scm_master','scm_lookup'];
        $menus = Page::where('parent_slug','parent')->get();
        // return $menus;
          $pages = [];
        foreach($menus as $menu){
           $menu->sub_menus = collect($menu->submenus_list);
          //  if(count($menu->sub_menus) > 0){
            array_push($pages, $menu->only(['side_menu', 'menu', 'icon','url','sub_menus'])) ;

          //  }
        }
        return collect($pages)->groupBy('side_menu');
    }
}
