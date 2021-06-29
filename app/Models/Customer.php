<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Authenticatable
{
//    use HasRoles;

//    protected $guard_name = 'intranet';

    use Notifiable;

    protected $fillable = [
        'id',
        'rut',
        'first_name',
        'last_name',
        'second_last_name',
        'phone',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'city',
        'country',
        'active',
        'last_access',
        'recovery_pin',
        'created_at',
        'updated_at',
        'deleted_at',
        'social_token',
        'facebook_id',
        'google_login'
    ];

//    protected $hidden = [
//        'password', 'remember_token',
//    ];

    public function getTextAttribute()
    {
        return $this->first_name . ' ' . $this->last_name . '|'. $this->rut;
    }


    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name) . ($this->second_last_name ? ' '.ucfirst($this->second_last_name) : '');
    }

    public function customer_addresses(){
        return $this->hasMany(CustomerAddress::class);
    }


    public function order(){
        return $this->hasMany(Order::class);
    }

}
