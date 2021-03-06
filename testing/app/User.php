<?php

namespace judiostatic;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function roles(){
        return $this->belongstoMany('judiostatic\Role');
    }

    public function hasRole($role){ //core
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){ // Tiene varios Roles
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }  
            }
        }else{ // Solo tiene un rol
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function authorizeRoles($roles){
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'This action is unauthorized');
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
