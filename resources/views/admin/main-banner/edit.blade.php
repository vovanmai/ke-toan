@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Quản lý</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form id="edit-main-banner-form" class="form-horizontal">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-fw fa-search"></i>Cập nhật slide</h3>
                            <div class="box-tools pull-right">
                                <a href="{{ route('admin.main_banner.list') }}" type="button" class="btn btn-primary"><i class="fa fa-fw fa-list-alt"></i>
                                    Xem danh sách
                                </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div>
                                <div class="col-md-5">
                                    <div class="form-group @error('title') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Tiêu đề
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="title" class="form-control" value="{{ old('title') ?? $item->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 30px">
                                        <label>
                                            Active
                                        </label>
                                        <div class="field-container">
                                            <input {{ $item->active ? 'checked' : '' }} style="width: 20px; height: 20px" type="checkbox" name="active" value="{{ $item->active ? '1' : '0' }}">
                                        </div>
                                    </div>
                                    <div class="form-group @error('title_color') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Màu chữ tiêu đề
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="title_color" class="form-control my-colorpicker1" value="{{ old('title_color') ?? $item->title_color ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group @error('link') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Đường dẫn
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="link" style="width: 100%" rows="5">{{ $item->link }}</textarea>
                                            @error('link')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group @error('short_description') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Mô tả ngắn
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="short_description" class="form-control" value="{{ old('short_description') ?? $item->short_description }}">
                                        </div>
                                    </div>
                                    <div class="form-group @error('short_description_color') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Màu chữ mô tả ngắn
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="short_description_color" class="form-control my-colorpicker1" value="{{ old('short_description_color') ?? $item->short_description_color }}">
                                        </div>
                                    </div>
                                    <div class="form-group @error('image') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Ảnh (Yêu cầu kích thước 1360x540 pixel) Nên tạo từ phần mền <a style="text-decoration: underline" href="https://www.canva.com">Canva</a>
                                            <span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <div id="dropzone-image" class="dropzone">

                                            </div>
                                        </div>
                                    </div>
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
        $(function() {
            $("#edit-main-banner-form").validate({
                rules: {
                    title: {
                        required: false,
                        maxlength: 255,
                    },
                    short_description: {
                        required: false,
                        maxlength: 255,
                    },
                    link: {
                        required: false,
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
                    name: {
                        required: "Tiêu đề không được rỗng.",
                    },
                    short_description: {
                        required: "Mô tả ngắn không được rỗng.",
                    },
                    link: {
                        required: "Đường dẫn không được rỗng.",
                    },
                },
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest(".form-group").find('.field-container'));
                },
                invalidHandler: function(form, validator) {
                    toastr.error('Dữ liệu nhập không hợp lệ.', 'Lỗi');
                },
                submitHandler: function(form) {
                    if (!validateRequiredImage()) {
                        toastr.error('Vui lòng chọn ảnh.', 'Lỗi');
                        return;
                    }

                    const data = {
                        title: $("input[name='title']").val(),
                        title_color: $("input[name='title_color']").val(),
                        short_description_color: $("input[name='short_description_color']").val(),
                        link: $("textarea[name='link']").val(),
                        short_description: $("textarea[name='short_description']").val(),
                        active: $('input[name="active"]').is(":checked") ? 1 : 0,
                        image: $('#edit-main-banner-form input[name="remove_image_id"]').val()
                    }

                    $.ajax({
                        data: data,
                        type: 'POST',
                        url: "{{ route('admin.main_banner.update', ['id' => $item->id]) }}",
                        cache: false,
                        success: function(response)
                        {
                            window.location.href = '/admin/main-banners'
                        },
                        error: function(error) {
                            if (error.status === 422) {
                                toastr.error(error.responseJSON.errors[0], 'Lỗi')
                            }
                        }
                    });
                }
            });
        });

        Dropzone.autoDiscover = false;

        let uploadedImageMap = {}

        $("#dropzone-image").dropzone(            {
            maxFiles: 1,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpeg,.jpg,.png,.gif,.webp",
            dictDefaultMessage: "Bạn có thể kéo ảnh hoặc click để chọn",
            dictRemoveFile: 'Xóa',
            addRemoveLinks: true,
            uploadMultiple: false,
            autoProcessQueue: true,
            timeout: 60000,
            url: '/admin/upload-file',
            params: {
                key: "slider_"
            },
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (file, response) {
                let uuid = file.upload.uuid
                $('#edit-main-banner-form').append(`<textarea class="${uuid}" hidden name="image">${JSON.stringify(response.data)}</textarea>`)

                response.data.uuid = uuid
                uploadedImageMap[file.upload.filename] = response.data
            },
            error: function (file, response) {
                return false;
            },
            accept: function(file, done) {
                done()
            },
            init : function() {
                var myDropZone = this;
                myDropZone.on('maxfilesexceeded', function(file) {
                    toastr.error("Tối đa chỉ một .", 'Lỗi');
                    myDropZone.removeFile(file);
                });

                let image = {!! isset($item->image) ? json_encode($item->image) : "''" !!};

                if(image) {
                    let callback = null; // Optional callback when it's done
                    let crossOrigin = null; // Added to the `img` tag for crossOrigin handling
                    let resizeThumbnail = true; // Tells Dropzone whether it should resize the image first
                    myDropZone.displayExistingFile(image, image.url, callback, crossOrigin, resizeThumbnail);
                    myDropZone.options.maxFiles = 0
                }
            },
            removedfile: function (file) {
                let myDropzone = this;
                file.previewElement.remove()
                if(typeof(file.upload) == 'object') {
                    if(file.accepted) {
                        $(`form .${file.upload.uuid}`).remove()
                        let storeNameRemove = uploadedLogoMap[file.upload.filename].store_name
                        removeImageOnServer(storeNameRemove)
                    }
                } else {
                    myDropzone.options.maxFiles = 1
                    $('#edit-main-banner-form').append(`<input type="hidden" name="remove_image_id" value="${file.id}">`)
                }
            },
        });

        function validateRequiredImage() {
            var check = true;
            var isRemovedPreview = $('#edit-main-banner-form input[name="remove_image_id"]').length;
            if(isRemovedPreview) {
                var image = $('#edit-main-banner-form textarea[name="image"]').length
                if(image == 0) {
                    check = false;
                }
            }
            return check;
        }
    </script>
@endpush
