@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Thiết lập website</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form id="create-website-setting-form" class="form-horizontal" method="POST" action="{{ route('admin.fee_charge.store') }}">
                        @csrf
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-cog"></i> Thiết lập phụ phí</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div>
                                <div class="col-md-5">
                                    <div class="form-group @error('tax') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Thuế (%)<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="tax" class="form-control" value="{{ old('tax') ?? $fee->tax ?? null }}">
                                            @error('tax')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('ship_fee') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Phí giao hàng<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="ship_fee" class="form-control" value="{{ old('ship_fee') ?? $fee->ship_fee ?? null }}">
                                            @error('ship_fee')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">

                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-center">
                            <div class="text-center">
                                <button type="reset" class="btn btn-default" style="margin-right: 10px">Xóa</button>
                                <span class="button-create">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check"></i>Cập nhật</button>
                                </span>
                            </div>
                        </div>
                    </form>
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

    </script>
@endpush
