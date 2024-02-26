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
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-fw fa-list-ul"></i>Chi tiết đơn hàng</h3>
                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <div class="order-info" style="margin: 15px 0px 30px 0px">
                            <table style="width:50%">
                                <tr>
                                    <td class="p-4" style="width: 30%">
                                        <span style="font-weight: 600">ID đơn hàng</span>
                                    </td>
                                    <td class="p-4" style="width: 70%">
                                        {{ $order->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-4" style="width: 30%">
                                        <span style="font-weight: 600">Trạng thái đơn hàng</span>
                                    </td>
                                    <td class="p-4" style="width: 70%">
                                        @if ($order->isPendding())
                                            <span class="bg-orange" style="padding: 2px 8px; color: white">{{ \App\Models\Order::$status[$order->status] }}</span>
                                        @elseif($order->isVerified())
                                            <span class="bg-purple" style="padding: 2px 8px; color: white">{{ \App\Models\Order::$status[$order->status] }}</span>
                                        @elseif($order->isShipping())
                                            <span style="background: #00acd6; padding: 2px 8px; color: white">{{ \App\Models\Order::$status[$order->status] }}</span>
                                        @elseif($order->isDelivered())
                                            <span class="bg-olive" style="padding: 2px 8px; color: white">{{ \App\Models\Order::$status[$order->status] }}</span>
                                        @elseif($order->isCanceled())
                                            <span class="bg-maroon" style="padding: 2px 8px; color: white">{{ \App\Models\Order::$status[$order->status] }}</span>
                                        @endif
                                        <button class="btn btn-success pull-right" data-toggle="modal" data-target="#update-status-modal">
                                            <i class="fa fa-edit"></i> Cập nhập
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-4" style="width: 30%">
                                        <span style="font-weight: 600">Phương thức thanh toán</span>
                                    </td>
                                    <td class="p-4" style="width: 70%">
                                        {{ \App\Models\Order::$paymentMethods[$order->payment_method] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-4" style="width: 30%">
                                        <span style="font-weight: 600">Mã đơn hàng</span>
                                    </td>
                                    <td class="p-4" style="width: 70%">
                                        <span id="order-code">{{ $order->code }}</span>
                                        <span onclick="copyCode()" style="margin-left: 5px"><i class="fa fa-copy" style="cursor: pointer"></i></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-4" style="width: 30%">
                                        <span style="font-weight: 600">Tên</span>
                                    </td>
                                    <td class="p-4" style="width: 70%">
                                        {{ $order->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-4" style="width: 30%">
                                        <span style="font-weight: 600">Email</span>
                                    </td>
                                    <td class="p-4" style="width: 70%">
                                        {{ $order->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-4" style="width: 30%">
                                        <span style="font-weight: 600">Số điện thoại</span>
                                    </td>
                                    <td class="p-4" style="width: 70%">
                                        {{ $order->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-4" style="width: 30%">
                                        <span style="font-weight: 600">Địa chỉ giao hàng</span>
                                    </td>
                                    <td class="p-4" style="width: 70%">
                                        {{ $order->ship_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-4" style="width: 30%">
                                        <span style="font-weight: 600">Ghi chú</span>
                                    </td>
                                    <td class="p-4" style="width: 70%">
                                        {{ $order->note }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10%">ID sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Giá đã giảm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            @foreach($orderDetails as $item)
                                @php
                                    $discountPrice = $item->price - $item->discount;
                                    $totalItem = $discountPrice * $item->quantity;
                                @endphp
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td style="text-align: center">
                                        @if($item->previewImage)
                                            <img style="height: 80px;width: 80px;object-fit: cover" src="{{ getPublicFile($item->previewImage->store_name) }}" alt="">
                                        @endif
                                    </td>
                                    <td>{{ number_format($item->price) }} Vnđ</td>
                                    <td>{{ number_format($discountPrice) }} Vnđ</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($totalItem) }} Vnđ</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td style="border-bottom-color: white; border-left-color: white;" colspan="5"></td>
                                <td><span style="font-weight: 600">Tổng tiền sản phẩm</span></td>
                                <td>{{ number_format($order->sub_total) }} Vnđ</td>
                            </tr>
                            <tr>
                                <td style="border-bottom-color: white; border-left-color: white;" colspan="5"></td>
                                <td>
                                    <span style="font-weight: 600">Thuế</span>
                                </td>
                                <td>{{ number_format($order->tax ? (($order->tax * $order->sub_total)/100) : 0) }} Vnđ</td>
                            </tr>
                            <tr>
                                <td style="border-bottom-color: white; border-left-color: white;" colspan="5"></td>
                                <td>
                                    <span style="font-weight: 600">Phí giao hàng</span>
                                </td>
                                <td>{{ number_format($order->ship_fee) }} Vnđ</td>
                            </tr>
                            <tr>
                                <td style="border-bottom-color: white; border-left-color: white;" colspan="5"></td>
                                <td>
                                    <span style="font-weight: 600">Tổng khách hàng phải trả</span>
                                </td>
                                <td>
                                    <span style="font-weight: 600">{{ number_format($order->total) }} Vnđ</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    @include('admin.order.order-history')
    <!-- /.content -->
@endsection

@push('script')
    <script>
        function copyCode() {
            var temp = $("<input>");
            $("body").append(temp);
            temp.val($('#order-code').text()).select();
            document.execCommand("copy");
            temp.remove();
            toastr.success('Sao chép thành công.', 'Thành công');
        }
    </script>
@endpush
