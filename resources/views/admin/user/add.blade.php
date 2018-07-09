@extends('admin.master')
@section('content')
    <section id="content">

        <div class="card">
            <div class="card__header">
                <h2>Thêm người dùng mới <small>Individual form controls automatically receive some global styling. All textual 'input', 'textarea', and 'select' elements with .form-control are set to width: 100%; by default. Wrap labels and controls in .form-group for optimum spacing.
                    </small></h2>
            </div>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}
                    @endforeach
                </div>
            @endif
            <div class="card__body">
                <form role="form" method="post" action="{{url(route('admin.user.post.add'))}}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <p>Tên người dùng</p>
                        <input type="text" class="form-control" name="name" placeholder="" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Email</p>
                        <input type="email" class="form-control" placeholder="" name="email" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Mật khẩu</p>
                        <input type="password" class="form-control" name="password" placeholder="" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Nhập lại mật khẩu</p>
                        <input type="password" class="form-control" name="re-password" placeholder="" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Giới tính</p>
                        <select class="form-control" name="gender" required>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Địa chỉ</p>
                        <input type="text" class="form-control" name="address" placeholder="" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>SĐT</p>
                        <input type="text" class="form-control" name="phone" placeholder="" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="checkbox">
                        <p>Loại</p>
                        <label>
                            <input type="checkbox" name="type" value="1" >
                            Admin
                            <i class="input-helper"></i>
                        </label>
                        <label>
                            <input type="checkbox"  name="type" value="0" >
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