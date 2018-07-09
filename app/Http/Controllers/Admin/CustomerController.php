<?php

namespace App\Http\Controllers\Admin;

use App\Bill;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function getCustomerList() {
        $bills = Bill::getAllBill();
        return view('admin.customer.list', compact('bills'));
    }
    public function getCustomerBillDetail($id) {
        $customerInfo = Customer::find($id);
        $bills = Bill::getCustomerBillDetailByCustomerID($id);
        return view('admin.customer.bill', compact('bills', 'customerInfo'));
    }
    public function getCustomerCheck($status, $id) {
        $bill = Bill::find($id);
        $bill->status = (int)$status;
        $bill->save();
        return redirect()->route('admin.customer.list')->with('success', 'Xủ lý đơn hàng thành công');
    }
    public function postFindCustomer(Request $request) {
        $bills = Customer::findCustomer($request);
        return view('admin.customer.list', compact('bills'));
    }
}
