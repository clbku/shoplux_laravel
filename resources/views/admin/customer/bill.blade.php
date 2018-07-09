@extends('admin.master')
@section('content')
    <section id="content">
        <div class="card">
            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
            @elseif (\Illuminate\Support\Facades\Session::has('wrong'))
                <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('wrong')}}</div>
            @endif
            <div class="card__header">
                <h2>Danh sách đơn hàng <small>Khách hàng: {{$customerInfo->name}}</small></h2>
            </div>

            <div class="card__body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tổng tiền</th>
                            <th>Hình thức thanh toán</th>
                            <th>Ghi chú</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bills as $bill)

                            <tr>
                                <td>{{$bill->id}}</td>
                                <td width="15%">{{$bill->date_order}}</td>
                                <td>{{$bill->total}}</td>
                                <td>{{$bill->payment}}</td>
                                <td>{{$bill->note}}</td>
                                <th>@if ($bill->status == 1) {{"Đang gửi"}}
                                    @elseif ($bill->status == 2) {{"Đã nhận"}}
                                    @elseif ($bill->status == 3) {{"Đã hủy"}}
                                    @else {{"Chưa xử lý"}} @endif</th>
                                <td width="10%">
                                    <a class="label label-danger" id="bill-detail-{{$bill->id}}" data-billID="{{$bill->id}}">Xem chi tiết</a>
                                </td>
                            </tr>
                            <tr class="hidden" id="show-bill-detail-{{$bill->id}}">
                                <td colspan="7">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $bill_details = DB::table('bill_details')->where('bill_id', $bill->id)->get()?>
                                        @foreach($bill_details as $bd)
                                            <tr>
                                                <td>{{$bd->id}}</td>
                                                <?php
                                                    $product = DB::table('products')->where('id', $bd->product_id)->first();
                                                    $productType = DB::table('categories')->where('id', $product->cate_id)->first();
                                                ?>
                                                <td>{{$product->name}}</td>
                                                <td>{{$productType->name}}</td>
                                                <td>{{$bd->quantity}}</td>
                                                <td>{{number_format($product->unit_price)}}</td>
                                                <td>{{number_format($bd->quantity * $product->unit_price)}}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="6">
                                                <a class="btn btn-default" href="{{route('admin.customer.check', [1,$bill->id])}}">Gửi đi</a>
                                                <a class="btn btn-success" href="{{route('admin.customer.check', [2, $bill->id])}}">Đã nhận</a>
                                                <a class="btn btn-danger" href="{{route('admin.customer.check', [3, $bill->id])}}">Hủy đơn</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <script>
                                $('#bill-detail-{{$bill->id}}').click(function () {
                                    $('#show-bill-detail-{{$bill->id}}').toggleClass('hidden');
                                    // alert('a');
                                    {{--var bill_id = $('#bill-detail-{{$bill->id}}').dataset.billID;--}}
                                    {{--console.log(bill_id);--}}
                                    {{--alert("http://localhost/shoplux/public/ajax/bill-detail/" + bill_id);--}}
                                })
                            </script>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection



