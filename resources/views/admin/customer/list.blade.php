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
                <h2>Danh sách khách hàng</h2>
                <br>
                <form class="top-search" method="post" action="{{route('admin.customer.find')}}">
                    {!! csrf_field() !!}
                    <input type="text" class="top-search__input" name="keyword" placeholder="Tìm kiếm">
                    <i class="zmdi zmdi-search top-search__reset"></i>
                </form>
            </div>

            <div class="card__body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên người dùng</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bills as $bill)
                            <tr>
                                <td>{{$bill->id}}</td>
                                <td width="15%">{{$bill->name}}</td>
                                <td>{{$bill->gender}}</td>
                                <td>{{$bill->email}}</td>
                                <td>{{$bill->phone}}</td>
                                <td>{{$bill->address}}</td>
                                <td width="15%">
                                    <a href="{{route('admin.customer.detail', $bill->id)}}"><i class="fa fa-list-ol"></i></a>
                                    @if ($bill->status == 0)
                                        <label class="label label-danger">Chưa xử lý</label>
                                    @elseif ($bill->status == 1)
                                        <label class="label label-default">Đã gửi</label>
                                    @elseif ($bill->status == 2)
                                        <label class="label label-success">Đã nhận</label>
                                    @elseif ($bill->status == 3)
                                        <label class="label label-danger">Đã hủy</label>
                                    @endif
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


