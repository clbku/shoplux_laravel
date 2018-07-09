<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $table = 'customers';

    public function Bill () {
        return $this->hasMany('App\Bill', 'customer_id', 'id');
    }

    static public function findCustomer($request) {
        $keyword = "%" . $request->keyword . "%";
        return Bill::leftjoin('customers', 'bills.customer_id', '=', 'customers.id')
            ->where('name', 'like', $keyword)
            ->orWhere('gender', 'like', $keyword)
            ->orWhere('email', 'like', $keyword)
            ->orWhere('phone', $keyword)
            ->orWhere('address',  'like', $keyword)
            ->orderBy('bills.updated_at', 'desc')
            ->groupBy('bills.customer_id')
            ->get();
    }
}
