@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Quản lý đơn hàng</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form id="search-recruitment-form" class="form-horizontal" method="GET" action="{{ route('admin.order.list') }}">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-fw fa-search"></i>Tìm kiếm đơn hàng</h3>
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
                                    <div class="form-group @error('email') has-error @enderror">
                                        <label for="email" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" value="{{ old('email') ?? request()->get('email') ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group @error('phone_number') has-error @enderror">
                                        <label for="phone_number" class="col-sm-3 control-label">Số điện thoại</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone_number" value="{{ old('phone_number') ?? request()->get('phone_number') ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Ngày đặt hàng</label>
                                        <div class="col-sm-9">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" value="{{ request()->get('created_at_from') ?? '' }}" class="form-control" name="created_at_from" />
                                                <span class="input-group-addon">~</span>
                                                <input type="text" value="{{ request()->get('created_at_to') ?? '' }}" class="form-control" name="created_at_to" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group @error('code') has-error @enderror">
                                        <label for="code" class="col-sm-3 control-label">Mã đơn hàng</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="code" value="{{ request()->get('code') ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Trạng thái</label>
                                        <div class="col-sm-9">
                                            @php
                                                $status = request()->status ?? [];
                                            @endphp
                                            <select name="status[]" class="form-control select2" multiple="multiple" data-placeholder="----- Chọn -----" style="width: 100%;">
                                                @foreach(\App\Models\Order::$status as $index => $item)
                                                <option {{ in_array($index, $status) ? 'selected' : '' }} value="{{ $index }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phương thức thanh toán</label>
                                        <div class="col-sm-9">
                                            @php
                                                $paymentMethod = request()->payment_method ?? null;
                                            @endphp
                                            <select name="payment_method" class="form-control select2" data-placeholder="----- Chọn -----" style="width: 100%;">
                                                <option value="">--- Chọn ---</option>
                                                @foreach(\App\Models\Order::$paymentMethods as $index => $item)
                                                <option {{ $index == $paymentMethod ? 'selected' : '' }} value="{{ $index }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
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
                        <h3 class="box-title"><i class="fa fa-fw fa-list-ul"></i>Danh sách đơn hàng</h3>
                        <div class="box-tools pull-right">
                            <a href="{{ route('admin.order.list') }}" type="button" class="btn btn-primary">
                                <i class="fa fa-refresh"></i>
                                Làm mới
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        @if ($items->count())
                            <table class="table table-bordered">
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Trạng thái</th>
                                    <th>Phương thức thanh thoán</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Ngày cập nhập</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                                @foreach($items as $key => $item)
                                    <tr class="tr-item-{{$item->id}}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>
                                        @if ($item->isPendding())
                                            <span class="bg-orange" style="padding: 5px 8px; color: white">{{ \App\Models\Order::$status[$item->status] }}</span>
                                        @elseif($item->isVerified())
                                            <span class="bg-purple" style="padding: 5px 8px; color: white">{{ \App\Models\Order::$status[$item->status] }}</span>
                                        @elseif($item->isShipping())
                                            <span style="background: #00acd6; padding: 5px 8px; color: white">{{ \App\Models\Order::$status[$item->status] }}</span>
                                        @elseif($item->isDelivered())
                                            <span class="bg-olive" style="padding: 5px 8px; color: white">{{ \App\Models\Order::$status[$item->status] }}</span>
                                        @elseif($item->isCanceled())
                                            <span class="bg-maroon" style="padding: 5px 8px; color: white">{{ \App\Models\Order::$status[$item->status] }}</span>
                                        @endif
                                        <td>
                                            {{ \App\Models\Order::$paymentMethods[$item->payment_method] }}
                                        </td>
                                        <td>
                                            {{ number_format($item->total) }} Vnđ
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            {{ $item->updated_at }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.order.detail', ['id' => $item->id]) }}" class="btn btn-success">
                                                <i class="fa fa-eye"></i> Xem
                                            </a>
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
                        <div class="text-right">
                            {!! $items->appends(['key' => request()->get('key')])->links() !!}
                        </div>
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
            $("#search-recruitment-form").validate({
                rules: {
                    title: {
                        maxlength: 255,
                    },
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                messages: {

                },
                invalidHandler: function(form, validator) {
                    toastr.error('Dữ liệu nhập không hợp lệ.', 'Lỗi');
                },
                submitHandler: function(form) {
                    // Search recruitment
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
                        url: `/admin/sliders/${id}`,
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
                url: `/admin/sliders/${id}/active`,
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
