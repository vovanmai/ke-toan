@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Danh sách tài liệu</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form id="search-post-form" class="form-horizontal" method="GET" action="{{ route('admin.document.list') }}">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-fw fa-search"></i>Tìm kiếm tài liệu</h3>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('email') has-error @enderror">
                                        <label class="col-sm-2 control-label">Danh mục</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #d2d6de; padding: 10px 20px; max-height: 417px; overflow-y: auto;">
                                                @foreach($categories as $cat)
                                                    @include('admin.component.search-child-category', [
                                                        'category' => $cat,
                                                        'categoryIds' => old('category_ids') ?? request()->get('category_ids') ?? [],
                                                    ])
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('title') has-error @enderror">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" value="{{ old('title') ?? request()->get('title') ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
{{--                                    <div class="form-group">--}}
{{--                                        <label class="col-sm-2 control-label">Giá</label>--}}
{{--                                        <div class="col-sm-10">--}}
{{--                                            <input type="text" value="{{ old('price') ?? request()->get('price') ?? '' }}" name="price" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
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
                        <h3 class="box-title"><i class="fa fa-fw fa-list-ul"></i>Danh sách tài liệu</h3>
                        <div class="box-tools pull-right">
                            <a href="{{ route('admin.document.list') }}" type="button" class="btn btn-success"><i class="fa fa fa-refresh"></i>
                                Làm mới
                            </a>
                            <a href="{{ route('admin.document.create') }}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i>
                                Tạo mới
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        @if ($items->count())
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 2%">STT</th>
                                    <th style="width: 30%">Tiêu đề</th>
                                    <th style="width: 13%">Danh mục</th>
                                    <th class="text-center" style="width: 5%">Active</th>
                                    <th class="text-center" style="width: 10%">Lượt xem <i style="font-size: 11px" class="fa fa-eye"></i></th>
                                    <th class="text-center" style="width: 10%">Lượt tải <i style="font-size: 11px" class="fa fa-download"></i></th>
                                    <th style="width: 10%">Ngày tạo</th>
                                    <th style="width: 15%">Action</th>
                                </tr>
                                @foreach($items as $key => $item)
                                    <tr class="tr-item-{{$item->id}}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            {{ $item->category->title }}
                                        </td>
                                        <td class="is-active text-center">
                                            @if($item->active)
                                                <img onclick="changeActive({{ $item->id }}, 0)" style="height: 28px; width: 28px; cursor: pointer" src="/assets/admin/dist/img/active.jpg" alt="">
                                            @else
                                                <img onclick="changeActive({{ $item->id }}, 1)" style="height: 28px; width: 28px; cursor: pointer" src="/assets/admin/dist/img/inactive.png" alt="">
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ number_format($item->total_view) }}
                                        </td>
                                        <td class="text-center">

                                            {{ number_format($item->total_download) }}
                                        </td>
                                        <td>
                                            <div>{{ $item->created_at->diffForHumans() }}</div>
                                            <div>{{ $item->created_at }}</div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.document.edit', ['id' => $item->id]) }}" class="btn btn-primary">
                                                <i class="fa fa-edit"></i> Sửa
                                            </a>
                                            <button onclick="deleteItem({{ $item->id }})" type="button" class="btn btn-danger">
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
                        {!! $items->links() !!}
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
            $("#search-post-form").validate({
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
        function deleteItem (id) {
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
                        url: `/admin/documents/${id}`,
                        success: function(response)
                        {
                            toastr.success(response.message, 'Thành công');
                            $(`.tr-item-${id}`).remove()
                        },
                        error: function(error) {
                            toastr.error(error.responseJSON.message, 'Lỗi');
                        }
                    });
                }
            })
        }

        function changeActive (id, active) {
            $.ajax({
                data: {
                    active: active
                },
                type: 'POST',
                dataType: "JSON",
                url: `/admin/documents/${id}/active`,
                success: function(response)
                {
                    if (active) {
                        var image = `<img onclick="changeActive(${id}, 0)" style="height: 28px; width: 28px; cursor: pointer" src="/assets/admin/dist/img/active.jpg" alt="">`
                    } else {
                        var image = `<img onclick="changeActive(${id}, 1)" style="height: 28px; width: 28px; cursor: pointer" src="/assets/admin/dist/img/inactive.png" alt="">`
                    }

                    $(`.tr-item-${id} .is-active`).html(image)
                },
                error: function(error) {
                    toastr.error("Có lỗi trong khi truy cập đến máy chủ.", 'Lỗi');
                }
            });
        }
    </script>
@endpush
