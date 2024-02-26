<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-discount-modal">
    <i class="fa fa-plus"></i> Tạo mới
</button>
<div class="modal fade" id="create-discount-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" id="create-discount-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tạo giảm giá</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Tiêu đề<span class="required">(*)</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Giảm giá(%)<span class="required">(*)</span>
                        </label>
                        <div class="col-md-8">
                            <input type="number" name="discount_percent" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Mô tả<span class="required"></span>
                        </label>
                        <div class="col-md-8">
                            <textarea name="description" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-success">Tạo</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@push('script')
    <script>
        $('#create-discount-modal').on('hidden.bs.modal', function (e) {
            var validator = $("#create-discount-form").validate();
            validator.resetForm();
            $('#create-discount-form .form-group').removeClass('has-error');
            $('#create-discount-form')[0].reset();
        })

        $(function() {
            $("#create-discount-form").validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 255,
                    },
                    discount_percent: {
                        required: true,
                        range: [1, 99]
                    },
                    description: {
                        maxlength: 500
                    },
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                messages: {},
                invalidHandler: function(form, validator) {
                    // toastr.error('Dữ liệu nhập không hợp lệ.', 'Lỗi');
                },
                submitHandler: function(form) {
                    createDiscount()
                }
            });
        });

        function createDiscount () {
            const data = {
                title: $('#create-discount-form input[name="title"]').val(),
                discount_percent: $('#create-discount-form input[name="discount_percent"]').val(),
                description: $('#create-discount-form textarea[name="description"]').val(),
            }
            $.ajax({
                data: data,
                type: 'POST',
                dataType: "JSON",
                url: '/admin/discounts',
                success: function(response)
                {
                    $('table tbody').prepend(response.data);
                    $('#create-discount-modal').modal('hide');
                    toastr.success(response.message, 'Thành công');
                },
                error: function(error) {
                    const responseError = error.responseJSON
                    if (error.status == 422) {
                        if (responseError.errors.title) {
                            $("#create-discount-form .form-group-title").addClass('has-error');
                            $("#create-discount-form .form-group-title .help-block").html(responseError.errors.title);
                        } else {
                            $("#create-discount-form .form-group-title").removeClass('has-error');
                            $("#create-discount-form .form-group-title .help-block").html('');
                        }
                    }
                    toastr.error(responseError.message, 'Lỗi');
                }
            });
        }
    </script>
@endpush
