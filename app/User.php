<?php

namespace judiostatic;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;
    
        protected $primaryKey = 'id';

        protected $dates = ['deleted_at'];
    
        protected $fillable = [
            'client_first', 'client_last', 'email', 'password', 'active',
        ];
    
    
        protected $hidden = [
            'password', 'remember_token',
        ];
    
    
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];
    

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
}
