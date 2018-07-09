@extends('admin.master')
@section('content')
    <section id="content">

        <div class="card">

            <div class="card__header">
                <h2>Sửa thông tin sản phẩm <small>Text Inputs with different sizes by height and column.</small></h2>
            </div>

            <div class="card__body">

                <form action="{{route('admin.product.post.edit', $product->id)}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <p>Tên sản phẩm</p>
                        <input type="text" class="form-control input-sm" name="name" value="{{$product->name}}" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Loại</p>
                        <select class="form-control" name="type" required>
                            @foreach(DB::table('categories')->get() as $pt)
                                @if ($pt->id == $product->id_type)
                                    <option value="{{$pt->id}}" selected>{{$pt->name}}</option>
                                @else
                                    <option value="{{$pt->id}}">{{$pt->name}}</option>
                                @endif

                            @endforeach
                        </select>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group">
                        <p>Mô tả</p>
                        <textarea id="ck-description" name="description" required>{!! $product->description !!}</textarea>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Chi tiết kĩ thuật</p>
                        <textarea id="ck-tech" name="detail" required>{!! $product->technical !!}</textarea>
                        <i class="form-group__bar"></i>
                    </div>
                    <script>
                        CKEDITOR.replace('ck-description');
                        CKEDITOR.replace('ck-tech');
                    </script>
                    <div class="form-group">
                        <p>Giá gốc</p>
                        <input type="text" class="form-control input-sm" name="unitPrice" value="{!! $product->unit_price !!}" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Giá sale</p>
                        <input type="text" class="form-control input-sm" name="promotionPrice" value="{!! $product->promotion_price !!}" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Đơn vị tính</p>
                        <input type="text" class="form-control input-sm" name="unit" value="{!! $product->unit !!}" required>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group">
                        <p>Hình minh họa</p>
                        @foreach(DB::table('product_images')->where('product_id', $product->id)->get() as $image)
                        <img src="{{url($image->image)}}" style="width: 300px; float: left;"><br>
                        @endforeach
                        <input type="file" class="form-control input-sm" name="image">
                        <i class="form-group__bar"></i>
                    </div>
                    <button class="btn btn--light btn--icon-text" type="submit"><i class="zmdi zmdi-check"></i> Check</button>
                </form>
            </div>
        </div>

    </section>
@endsection