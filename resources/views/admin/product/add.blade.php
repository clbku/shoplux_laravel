@extends('admin.master')
@section('content')
    <section id="content">

        <div class="card">
            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
            @endif
            <div class="card__header">
                <h2>Thêm sản phẩm mới <small>Text Inputs with different sizes by height and column.</small></h2>
            </div>

            <div class="card__body">

                <form action="{{route('admin.product.post.add')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <p>Tên sản phẩm</p>
                        <input type="text" class="form-control input-sm" name="name" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Loại</p>
                        <select class="form-control" name="type" required>
                            @foreach(DB::table('categories')->where('cate_parent', '>', 0)->get() as $pt)
                            <option value="{{$pt->id}}">{{$pt->name}}</option>
                            @endforeach
                        </select>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Mô tả ngắn</p>
                        <input type="text" class="form-control input-sm" name="shortDescription" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Mô tả</p>
                        <textarea id="ck-description" name="description" required></textarea>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Chi tiết kĩ thuật</p>
                        <textarea id="ck-tech" name="detail" required></textarea>
                        <i class="form-group__bar"></i>
                    </div>
                    <script>
                        CKEDITOR.replace('ck-description');
                        CKEDITOR.replace('ck-tech');
                    </script>
                    <div class="form-group">
                        <p>Giá gốc</p>
                        <input type="number" class="form-control input-sm" name="unitPrice" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Giá sale</p>
                        <input type="number" class="form-control input-sm" name="promotionPrice">
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Đơn vị tính</p>
                        <select class="form-control input-sm" name="unit" required>
                            <option value="VND">VNĐ</option>
                        </select>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group">
                        <p>Hình minh họa</p>
                        <input type="file" class="form-control input-sm" name="image" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <button class="btn btn--light btn--icon-text" type="submit"><i class="zmdi zmdi-check"></i> Check</button>
                </form>
            </div>
        </div>

    </section>
@endsection