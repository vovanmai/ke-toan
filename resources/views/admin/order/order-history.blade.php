<div class="modal fade" id="update-status-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lịch sử đơn hàng</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="update-status-form" method="POST" action="{{ route('admin.order.update_status', ['id' => $order->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Trạng thái<span class="required">(*)</span>
                        </label>
                        <div class="col-md-8">
                            @php
                                $status = \App\Models\Order::$status;
                            @endphp
                            @foreach($status as $key => $value)
                                <div style="margin-top: 7px">
                                    <label style="{{ $key === $order->status ? 'cursor: not-allowed;' : '' }}">
                                        <input {{ $key === $order->status ? 'disabled' : '' }} type="radio" value="{{ $key }}" name="status" class="flat-red" {{ $order->status == $key ? 'checked' : '' }}>
                                        &nbsp;{{ $key === \App\Models\Order::STATUS_CANCELED ? 'Hủy đơn hàng' : $value }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Ghi chú
                        </label>
                        <div class="col-md-8">
                            <textarea name="note" style="width: 100%" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-8 text-right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                            <button disabled id="update-status-button" type="submit" class="btn btn-success">Cập nhật</button>
                        </div>
                    </div>
                </form>
                <div id="order-history" style="margin-top: 20px">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 5%" class="text-center">ID</th>
                            <th style="width: 20%" class="text-center">Trạng thái đơn hàng</th>
                            <th style="width: 15%">Người thay đổi</th>
                            <th style="width: 20%">Thời gian cập nhập</th>
                            <th>Ghi chú</th>
                        </tr>
                        @foreach($order->orderHistories as $index => $history)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">
                                    @if ($history->isPendding())
                                        <span class="bg-orange white-space-nowrap" style="padding: 2px 8px; color: white">{{ \App\Models\Order::$status[$history->status] }}</span>
                                    @elseif($history->isVerified())
                                        <span class="bg-purple white-space-nowrap" style="padding: 2px 8px; color: white">{{ \App\Models\Order::$status[$history->status] }}</span>
                                    @elseif($history->isShipping())
                                        <span style="background: #00acd6; padding: 2px 8px; color: white">{{ \App\Models\Order::$status[$history->status] }}</span>
                                    @elseif($history->isDelivered())
                                        <span class="bg-olive white-space-nowrap" style="padding: 2px 8px; color: white">{{ \App\Models\Order::$status[$history->status] }}</span>
                                    @elseif($history->isCanceled())
                                        <span class="bg-maroon white-space-nowrap" style="padding: 2px 8px; color: white">{{ \App\Models\Order::$status[$history->status] }}</span>
                                @endif
                                <td class="text-center">{{ $history->updatable->name }}</td>
                                <td class="text-center">
{{--                                    <div>{{ $history->changed_at }}</div>--}}
                                    <div>{{ \Carbon\Carbon::parse($history->changed_at)->diffForHumans() }}</div>
                                </td>
                                <td>{{ $history->note }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@push('script')
    <script>
        //iCheck for checkbox and radio inputs
        //Flat red color scheme for iCheck
        $('input[type="radio"].flat-red').iCheck({
            radioClass   : 'iradio_flat-green'
        })

        $("input[name='status']").on('ifChanged', function(event){
            $('#update-status-button').prop('disabled', false);
        });
    </script>
@endpush
