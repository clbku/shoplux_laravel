@extends('admin.master')
@section('content')
    <section id="content">

        <div class="card">
            <div class="card__header">
                <h2>Sửa người dùng <small>Individual form controls automatically receive some global styling. All textual 'input', 'textarea', and 'select' elements with .form-control are set to width: 100%; by default. Wrap labels and controls in .form-group for optimum spacing.
                    </small></h2>
            </div>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}
                    @endforeach
                </div>
            @endif
            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
            @elseif (\Illuminate\Support\Facades\Session::has('wrong'))
                <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('wrong')}}</div>
            @endif
            <div class="card__body">
                <form role="form" method="post" action="{{url(route('admin.user.post.edit', $user->id))}}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <p>Tên người dùng</p>
                        <input type="text" class="form-control" name="name" placeholder="" value="{{$user->name}}" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Email</p>
                        <input type="email" class="form-control" placeholder="" name="email" value="{{$user->email}}" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Mật khẩu cũ</p>
                        <input type="password" class="form-control" name="old_password" placeholder=""  value="" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Mật khẩu mới</p>
                        <input type="password" class="form-control" name="password" placeholder=""  value="" >
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Nhập lại mật khẩu</p>
                        <input type="password" class="form-control" name="re-password" placeholder="" >
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Giới tính</p>
                        <select class="form-control" name="gender" required>
                            @if ($user->gender == "Nam")
                                <option value="Nam" selected >Nam</option>
                                <option value="Nữ">Nữ</option>
                            @elseif ($user->gender == "Nữ")
                                <option value="Nam" >Nam</option>
                                <option value="Nữ" selected >Nữ</option>
                            @endif
                        </select>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Địa chỉ</p>
                        <input type="text" class="form-control" name="address" placeholder="" value="{{$user->address}}" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>SĐT</p>
                        <input type="text" class="form-control" name="phone" placeholder="" value="{{$user->phone}}" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="checkbox">
                        <p>Loại</p>
                        <label>

                            <input type="checkbox" name="type" value="1" @if ($user->type == '1') checked="checked" @endif >
                            Admin
                            <i class="input-helper"></i>
                        </label>
                        <label>
                            <input type="checkbox" name="type" value="0" @if ($user->type == '0') checked="checked" @endif >
                            Người dùng
                            <i class="input-helper"></i>
                        </label>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>

    </section>

@endsection