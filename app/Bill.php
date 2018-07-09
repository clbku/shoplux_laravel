<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bill extends Model
{
    protected $table = 'bills';

    public function BillDetail () {
        return $this->hasMany('App\BillDetail', 'bill_id', 'id');
    }
    public function Customer () {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
    static public function getCustomerBillDetailByCustomerID($id) {
        return DB::table('bills')
            ->leftJoin('customers', 'customers.id', '=', 'bills.customer_id')
            ->where('customers.id', $id)
            ->get(['*', 'bills.id']);
    }
    static function getAllBill() {
        return Bill::leftjoin('customers', 'bills.customer_id', '=', 'customers.id')
            ->orderBy('bills.updated_at', 'desc')
            ->groupBy('bills.customer_id')->get();
    }
}
