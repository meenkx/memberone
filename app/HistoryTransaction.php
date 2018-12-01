<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryTransaction extends Model 
{
    protected $primaryKey = 'HistoryTransactionId';
    protected $table = 'HistoryTransaction';
    public $timestamps = false;

}