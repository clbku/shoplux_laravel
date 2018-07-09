<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_details';

    public function Bill () {
        return $this->belongsTo('App\Bill', 'bill_id', 'id');
    }
}
