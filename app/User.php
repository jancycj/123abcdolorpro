<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Roles
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function roles() {
        return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    }  
    /**
     * Roles
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function company() {
        return $this->belongsToMany('App\Company', 'company_users', 'user_id', 'company_id');
    } 

    /**
     * Roles
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function supplier() {
        return $this->belongsToMany('App\Costomers', 'customer_users', 'user_id', 'customer_id');
    } 
}
