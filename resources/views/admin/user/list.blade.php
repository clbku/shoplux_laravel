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
                <h2>Danh sách người dùng</h2>
                <br>
                <form class="top-search" method="post" action="{{route('admin.user.find')}}">
                    {!! csrf_field() !!}
                    <input type="text" class="top-search__input" style="color:#fff;" name="keyword" placeholder="Tìm kiếm">
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
                            <th>Email</th>
                            <th>phone</th>
                            <th>Address</th>
                            <th>Loại</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td width="15%">{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td>@if ($user->type) {{'Admin'}} @else {{'Người dùng'}} @endif</td>
                                <td width="10%">
                                    <a href="{{route('admin.user.edit', $user->id)}}"><i class="fa fa-edit"></i></a>
                                    @if ($user->status == "Hoạt động")
                                    <a href="{{route('admin.user.lock', $user->id)}}"><i class="fa fa-lock"></i></a>
                                    @else
                                    <a href="{{route('admin.user.lock', $user->id)}}"><i class="fa fa-unlock"></i></a>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                        <tr>
                            <td colspan="5">
                                <a class="btn btn-success" href="{{route('admin.user.add')}}">Thêm người dùng mới</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


