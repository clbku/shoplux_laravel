@extends('admin.master')
@section('content')
    <section id="content">
        <div class="card">
            <div class="card__header">
                <h2>Các loại sản phẩm</h2>
                <br>
                <form class="top-search" method="post" action="{{route('admin.category.find')}}">
                    {!! csrf_field() !!}
                    <input type="text" class="top-search__input" style="color: #fff" name="keyword" placeholder="Tìm kiếm">
                    <i class="zmdi zmdi-search top-search__reset"></i>
                </form>
            </div>
            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
            @elseif (\Illuminate\Support\Facades\Session::has('wrong'))
                <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('wrong')}}</div>
            @endif
            <div class="card__body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Loại sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Số sản phẩm</th>
                            <th>Danh mục cha</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr id="hide-edit-category-{{$category->id}}">
                                <td>{{$category->id}}</td>
                                <td width="15%">{{$category->name}}</td>
                                <td>{{$category->shortDescription}}</td>
                                <td width="10%">{{$category->count}}</td>
                                <td width="10%">{{DB::table('categories')->where('id', $category->cate_parent)->first()->name ?? "root"}}</td>
                                <td width="10%">
                                    <a href="javascript:void(0)" id="show-edit-category-form-{{$category->id}}"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.category.listProduct', $category->id)}}"><i class="fa fa-list"></i></a>
                                    <a href="{{route('admin.category.delete', $category->id)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr id="edit-category-form-{{$category->id}}" class="hidden">
                                <form method="post" action="{{route('admin.category.post.edit', $category->id)}}">
                                    {!! csrf_field() !!}
                                    <td>#</td>
                                    <td><input type="text" class="form-control input-sm" name="name" value="{{$category->name}}" required></td>
                                    <td><input type="text" class="form-control input-sm" name="shortDescription" value="{{$category->shortDescription}}" required></td>
                                    <td>{{$category->count}}</td>
                                    <td>
                                        <select name="cateParent" class="form-control">
                                            <option value="">root</option>
                                            @foreach($categories as $cate)

                                                    @if ($cate->id == $category->cate_parent)
                                                        <option value="{{$cate->id}}" selected="selected">{{$cate->name}}</option>
                                                    @else
                                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                    @endif

                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="hidden"><input type="submit"></td>
                                </form>
                            </tr>
                            <script>
                                $('#show-edit-category-form-{{$category->id}}').click(function () {
                                    $('#edit-category-form-{{$category->id}}').toggleClass('hidden');
                                    $('#hide-edit-category-{{$category->id}}').toggleClass('hidden');
                                })
                            </script>
                        @endforeach
                        <tr class="hidden" id="add-category-form">
                            <form method="post" action="{{route('admin.category.post.add')}}">
                                {!! csrf_field() !!}
                                <td>#</td>
                                <td><input type="text" class="form-control input-sm" name="name" required></td>
                                <td><input type="text" class="form-control input-sm" name="shortDescription" required></td>
                                <td>0</td>
                                <td><select name="cateParent" class="form-control">
                                        <option value="" style="color: #30414a">root</option>
                                        @foreach($categories as $categorie)
                                            @if ($categorie->cate_parent == null)
                                            <option value="{{$categorie->id}}" style="color: #30414a">{{$categorie->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td class="hidden"><input type="submit"></td>
                            </form>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <a id="show-add-category-form" class="btn btn-success" href="javascript:void(0)">Thêm mới</a>
                            </td>
                        </tr>
                        <script>
                            $('#show-add-category-form').click(function () {
                                $('#add-category-form').toggleClass('hidden')
                            })

                        </script>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


