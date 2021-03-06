<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function roles(){

        //return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany(Role::class);
    }
  
    public function authorizeRoles($roles)
    
    {
    
      if (is_array($roles)) {
    
          return $this->hasAnyRole($roles) || 
                 abort(401, 'This action is unauthorized.');
    
      }
    
      return $this->hasRole($roles) || 
             abort(401, 'This action is unauthorized.');
    
    }
    public function hasAnyRole($roles)
    
    {
    
      return null !== $this->roles()->whereIn('name', $roles)->first();
    
    }
    public function hasRole($role)
    
    {
    
      return null !== $this->roles()->where('name', $role)->first();
    
    }

    public function isActive()
    
    {
    
      return $this->user_active;
    
    }





    protected $fillable = [
        'name', 'email', 'password','phone', 'user_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
