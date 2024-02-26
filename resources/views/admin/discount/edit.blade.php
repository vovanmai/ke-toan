<div class="modal fade" id="modal-update-discount">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" id="edit-discount-form">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cập nhật giảm giá</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-title">
                        <label class="col-md-3 control-label">
                            Tiêu đề<span class="required">(*)</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control">
                            <input type="hidden" name="edit-id">
                        </div>
                    </div>
                    <div class="form-group form-group-discount-percent">
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
                            @error('description')
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
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
        $('#modal-update-discount').on('hidden.bs.modal', function (e) {
            var validator = $('#edit-discount-form').validate();
            validator.resetForm();
            $('#edit-discount-form .form-group').removeClass('has-error');
            $('#edit-discount-form')[0].reset();
        })

        function showEditModal (id)
        {
            $.ajax({
                type: 'GET',
                dataType: "JSON",
                url: `/admin/discounts/${id}`,
                success: function(response)
                {
                    const data = response.data
                    $('#modal-update-discount input[name="title"]').val(data.title);
                    $('#modal-update-discount input[name="edit-id"]').val(data.id);
                    $('#modal-update-discount input[name="discount_percent"]').val(data.discount_percent);
                    $("#modal-update-discount textarea").val(data.description);
                    $('#modal-update-discount').modal('show');
                },
                error: function(error) {
                    toastr.error(error.responseJSON.message, 'Lỗi');
                }
            });

        }

        function updateDiscount () {
            const data = {
                _token: $('meta[name="csrf-token"]').attr('content'),
                title: $('#modal-update-discount input[name="title"]').val(),
                discount_percent: $('#modal-update-discount input[name="discount_percent"]').val(),
                description: $('#modal-update-discount textarea[name="description"]').val(),
            }

            const id = $('input[name="edit-id"]').val()
            $.ajax({
                data: data,
                type: 'PUT',
                dataType: "JSON",
                url: `/admin/discounts/${id}`,
                success: function(response)
                {
                    $('#modal-update-discount').modal('hide');
                    $(`.tr-discount-${id}`).html(response.data)

                    toastr.success(response.message, 'Thành công');
                },
                error: function(error) {
                    const responseError = error.responseJSON
                    toastr.error(responseError.message, 'Lỗi');
                }
            });
        }

        $(function() {
            $("#edit-discount-form").validate({
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
                    toastr.error('Dữ liệu nhập không hợp lệ.', 'Lỗi');
                },
                submitHandler: function(form) {
                    updateDiscount()
                }
            });
        });
    </script>
@endpush
