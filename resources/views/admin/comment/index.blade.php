@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Bình luận</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form id="search-post-form" class="form-horizontal" method="GET" action="{{ route('admin.comment.list') }}">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-fw fa-search"></i>Tìm kiếm bình luận</h3>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label for="name" class="col-sm-3 control-label">Tên</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{ old('name') ?? request()->get('name') ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('target_type') has-error @enderror">
                                        <label for="email" class="col-sm-3 control-label">Loại bình luận</label>
                                        <div class="col-sm-9">
                                            @php
                                                $status = request()->target_types ?? [];
                                            @endphp
                                            <select name="target_types[]" class="form-control select2" multiple="multiple" data-placeholder="----- Chọn -----" style="width: 100%;">
                                                @foreach(\App\Models\Comment::$targetTypes as $index => $item)
                                                    <option {{ in_array($index, $status) ? 'selected' : '' }} value="{{ $index }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('email') has-error @enderror">
                                        <label for="email" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" value="{{ old('email') ?? request()->get('email') ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Ngày tạo</label>
                                        <div class="col-sm-9">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" value="{{ old('created_at_from') ?? request()->get('created_at_from') ?? '' }}" class="form-control" name="created_at_from" />
                                                <span class="input-group-addon">~</span>
                                                <input type="text" value="{{ old('created_at_to') ?? request()->get('created_at_to') ?? '' }}" class="form-control" name="created_at_to" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Chưa đọc</label>
                                        <div class="col-sm-9">
                                            <label>
                                                <input name="un_read" type="checkbox" {{ request()->get('un_read') ? 'checked' : '' }}>
                                            </label>
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
                        <h3 class="box-title"><i class="fa fa-fw fa-list-ul"></i>Danh sách bình luận</h3>
                        <div class="box-tools pull-right">
                            <a href="{{ route('admin.comment.list') }}" type="button" class="btn btn-primary">
                                <i class="fa fa-refresh"></i>
                                Làm mới
                            </a>
                            <button onclick="readAll()" type="button" class="btn btn-success"><i class="fa fa-check"></i>
                                Đánh dấu đã đọc tất cả
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        @if ($items->count())
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 5%">STT</th>
                                    <th style="width: 15%">Bài viết</th>
                                    <th style="width: 10%">Loại bình luận</th>
                                    <th style="width: 10%">Tên</th>
                                    <th style="width: 10%">Email</th>
                                    <th style="width: 20%">Nội dung</th>
                                    <th style="width: 10%" class="text-center">Đã đọc</th>
                                    <th class="text-center">Active</th>
                                    <th style="width: 15%">Ngày tạo</th>
                                </tr>
                                @foreach($items as $key => $item)
                                    <tr class="tr-item-{{$item->id}}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @php
                                                if ($item->target_type == \App\Models\Post::class) {
                                                    $route = 'user.post.detail';
                                                } elseif ($item->target_type == \App\Models\Recruitment::class) {
                                                    $route = 'user.recruitment.detail';
                                                } elseif ($item->target_type == \App\Models\Course::class) {
                                                    $route = 'user.course.detail';
                                                }
                                            @endphp
                                            <a title="Đi đến bài viết!" target="_blank" href="{{ route($route, ['slug' => $item->target->slug]) }}">{{ $item->target ? $item->target->title : null }}</a>
                                        </td>
                                        <td>{{ \App\Models\Comment::$targetTypes[$item->target_type] ?? null }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td class="is-read text-center">
                                            @if($item->is_read)
                                                <i style="font-size: 25px" class="fa fa-eye"></i>
                                            @else
                                                <i style="color: red; font-size: 25px" class="fa fa-eye-slash"></i>
                                            @endif
                                        </td>
                                        <td class="public text-center">
                                            @if($item->active)
                                                <img onclick="changeStatus({{ $item->id }}, 0)" style="height: 28px; width: 28px; cursor: pointer" src="/assets/admin/dist/img/active.jpg" alt="">
                                            @else
                                                <img onclick="changeStatus({{ $item->id }}, 1)" style="height: 28px; width: 28px; cursor: pointer" src="/assets/admin/dist/img/inactive.png" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            <div>{{ $item->created_at->diffForHumans() }}</div>
                                            <div>{{ $item->created_at }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <div style="font-weight: bold" class="text-center">Không có dữ liệu</div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix text-right">
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
                        url: `/admin/posts/${id}`,
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

        function changeStatus (id, status) {
            $.ajax({
                data: {
                    active: status
                },
                type: 'POST',
                dataType: "JSON",
                url: `/admin/comments/${id}/update-status`,
                success: function(response)
                {
                    if (status == 1) {
                        var image = `<img onclick="changeStatus(${id}, 0)" style="height: 28px; width: 28px; cursor: pointer" src="/assets/admin/dist/img/active.jpg" alt="">`
                    } else {
                        var image = `<img onclick="changeStatus(${id}, 1)" style="height: 28px; width: 28px; cursor: pointer" src="/assets/admin/dist/img/inactive.png" alt="">`
                    }

                    $(`.tr-item-${id} .public`).html(image)
                },
                error: function(error) {
                    toastr.error("Có lỗi trong khi truy cập đến máy chủ.", 'Lỗi');
                }
            });
        }
        function readAll () {
            $.ajax({
                data: {
                },
                type: 'POST',
                dataType: "JSON",
                url: '{{ route('admin.comment.mark_read') }}',
                success: function(response)
                {
                    toastr.success("Đánh dấu thành công", 'Thành công');

                    $('.count-comment').html('')
                    $('.is-read').html('<i style="font-size: 25px" class="fa fa-eye"></i>')
                },
                error: function(error) {
                    toastr.error("Có lỗi trong khi truy cập đến máy chủ.", 'Lỗi');
                }
            });
        }
    </script>
@endpush
