@extends('admin.master')
@section('content')
    <section id="content">
        <div class="card">
            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
            @endif
            <div class="card__header">
                <h2>Danh sách sản phẩm</h2>
                <br>
                <form class="top-search" method="post" action="{{route('admin.product.find')}}">
                    {!! csrf_field() !!}
                    <input type="text" class="top-search__input" style="color: #fff" name="keyword" placeholder="Tìm kiếm">
                    <i class="zmdi zmdi-search top-search__reset"></i>
                </form>
            </div>

            <div class="card__body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Giá</th>
                            <th>Giá sale</th>
                            <th>Đơn vị</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td width="30%">{{$product->name}}</td>
                                <td>{{$product->cate_name}}</td>
                                <td>{{number_format($product->unit_price)}}</td>
                                <td>{{number_format($product->promotion_price)}}</td>
                                <td>{{$product->unit}}</td>
                                <td width="10%">
                                    <a href="{{route('admin.product.edit', $product->id)}}"><i class="fa fa-edit"></i></a>
                                    <a id="product-detail-{{$product->id}}"><i class="fa fa-list"></i></a>
                                    <a href="{{route('admin.product.delete', $product->id)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr class="hidden" id="show-product-detail-{{$product->id}}">
                                <td colspan="2"><img class="img-responsive" src="{{url(DB::table('product_images')->where('product_id', $product->id)->first()->image)}}" width="300px;"></td>
                                <td colspan="5">{!! $product->technical!!}</td>
                            </tr>
                            <script>
                                $('#product-detail-{{$product->id}}').click(function () {
                                    $('#show-product-detail-{{$product->id}}').toggleClass('hidden');
                                })
                            </script>
                        @endforeach
                        <tr>
                            <td colspan="5">
                                <a class="btn btn-success" href="{{route('admin.product.add')}}">Thêm sản phẩm mới</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


