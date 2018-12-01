<?php

/**
 * Remove 'use Illuminate\Database\Eloquent\Model;'
 */
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ShopOwnerAccount extends Authenticatable
{
    use Notifiable;
//    protected $primaryKey = 'EmployeeId';
//    protected $table = 'ShopOwnerAccount';
//    public $timestamps = false;

// The authentication guard for admin
    protected $guard = 'ShopOwnerAccount';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
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