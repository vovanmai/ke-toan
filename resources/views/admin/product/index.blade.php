@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Quản lý sản phẩm</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form id="search-product-form" class="form-horizontal" method="GET" action="{{ route('admin.product.list') }}">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-fw fa-search"></i>Tìm kiếm sản phẩm</h3>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('email') has-error @enderror">
                                        <label class="col-sm-2 control-label">Danh mục</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #d2d6de; padding: 3px 10px; max-height: 417px; overflow-y: auto;">
                                                @foreach($categories as $cat)
                                                    @include('admin.component.child-category', [
                                                        'category' => $cat,
                                                        'old' => old('category_id') ?? request()->get('category_id') ?? '',
                                                    ])
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tên</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" value="{{ old('name') ?? request()->get('name') ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Giá</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('price') ?? request()->get('price') ?? '' }}" name="price" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Ngày tạo</label>
                                        <div class="col-sm-10">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" value="{{ old('created_at_from') ?? request()->get('created_at_from') ?? '' }}" class="form-control" name="created_at_from" />
                                                <span class="input-group-addon">~</span>
                                                <input type="text" value="{{ old('created_at_to') ?? request()->get('created_at_to') ?? '' }}" class="form-control" name="created_at_to" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-center">
                            <button type="reset" onclick="resetForm()" class="btn btn-default reset-form-admin" style="margin-right: 2px">
                                <i class="fa fa fa-eraser"></i> Xóa</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-fw fa-search"></i>Tìm kiếm
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-fw fa-list-ul"></i>Danh sách admin</h3>
                        <div class="box-tools pull-right">
                            <a href="{{ route('admin.product.create') }}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i>
                                Tạo mới
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        @if ($products->count())
                            <table class="table table-bordered">
                                <tr>
                                    <th>STT</th>
                                    <th>ID</th>
                                    <th style="width: 15%">Tên</th>
                                    <th>Ảnh</th>
                                    <th style="width: 20%">Danh mục</th>
                                    <th>Giá</th>
                                    <th>Giảm giá (%)</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhập</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                                @foreach($products as $key => $product)
                                    <tr class="tr-product-{{$product->id}}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td style="text-align: center">
                                            @if($product->previewImage)
                                                <img style="height: 130px;width: 110px;object-fit: cover" src="{{ getPublicFile($product->previewImage->store_name) }}" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $product->category->title }}
                                        </td>
                                        <td>
                                            {{ number_format($product->price) }} VNĐ
                                        </td>
                                        <td class="text-center">
                                            {{ $product->discount->discount_percent ?? 0 . '%' }}
                                        </td>
                                        <td>
                                            {{ $product->created_at }}
                                        </td>
                                        <td>
                                            {{ $product->updated_at }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="btn btn-primary">
                                                <i class="fa fa-edit"></i> Sửa
                                            </a>
                                            <button onclick="deleteProduct({{ $product->id }})" type="button" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Xóa
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <div style="font-weight: bold" class="text-center">Không có dữ liệu</div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {!! $products->links() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

    </section>
    <!-- /.content -->
@endsection

@push('script')
    <script>
        $('.input-daterange').datepicker({
            daysOfWeekHighlighted: "0",
            clearBtn: true,
            todayBtn: "linked",
            language: "vi",
            format: "yyyy-mm-dd",
            timePicker: true,
            //autoclose: true,
        });

        $(function() {
            $("#search-product-form").validate({
                rules: {
                    name: {
                        maxlength: 100,
                    },
                    price: {
                        digits: true,
                        max: 10000000000,
                        min: 1000,
                    },
                    quantity: {
                        digits: true,
                        max: 100,
                        min: 1,
                    },
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                messages: {
                    name: {
                    },
                },
                invalidHandler: function(form, validator) {
                    toastr.error('Dữ liệu nhập không hợp lệ.', 'Lỗi');
                },
                submitHandler: function(form) {
                    // Search product
                    form.submit();
                }
            });
        });
        function deleteProduct (id) {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa không ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Có',
                confirmButtonColor: 'green',
                cancelButtonText: 'Không',
                width: 400,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'delete',
                        dataType: "JSON",
                        url: `/admin/products/${id}`,
                        success: function(response)
                        {
                            toastr.success(response.message, 'Thành công');
                            $(`.tr-product-${id}`).remove()
                        },
                        error: function(error) {
                            toastr.error(error.responseJSON.message, 'Lỗi');
                        }
                    });
                }
            })
        }
    </script>
@endpush
