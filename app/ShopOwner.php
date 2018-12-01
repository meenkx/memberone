<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ShopOwner extends Model
{
    protected $primaryKey = 'ShopOwnerId';
    protected $table = 'ShopOwner';
    public $timestamps = false;


}