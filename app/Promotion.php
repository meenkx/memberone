<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model 
{

    protected $table = 'Promotion';
    protected $primaryKey ='PromotionId';
    public $timestamps = false;

}