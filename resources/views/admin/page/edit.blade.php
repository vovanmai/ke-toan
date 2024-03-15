@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Quản lý bài viết</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form id="edit-post-form" class="form-horizontal" method="POST" action="{{ route('admin.page.update', ['id' => $item]) }}">
                        @csrf
                        @method('PUT')
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-fw fa-edit"></i>Cập nhật bài viết</h3>
                            <div class="box-tools pull-right">
                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i>Lưu</button>
                                <a href="{{ route('admin.page.list') }}" type="button" class="btn btn-primary"><i class="fa fa-fw fa-list-alt"></i>
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
                                            Tiêu đề<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="title" class="form-control" value="{{ $item->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group @error('short_description') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Mô tả ngắn
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="short_description" rows="5">{{ old('short_description') ?? $item->short_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('description') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Chi tiết<span class="required">(*)</span>
                                        </label>

                                        <div class="field-container">
                                            <textarea name="description" class="form-control" rows="30">{!! $item->description !!}</textarea>
                                            @error('description')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-center">
                            <div class="text-center">
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
            $("form").validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 255,
                    },
                    short_description: {
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
                    messages: {
                        title: {
                            required: "Không được rỗng.",
                        },
                        short_description: {
                            maxlength: "Không được vượt quá 255 ký tự.",
                        }
                    },
                },
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest(".form-group").find('.field-container'));
                },
                invalidHandler: function(form, validator) {
                    toastr.error('Dữ liệu nhập không hợp lệ.', 'Lỗi');
                },
                submitHandler: function(form) {
                    // Validate preview image is required
                    if (!validateRequiredPreviewImage()) {
                        toastr.error('Vui lòng chọn ảnh đại diện.', 'Lỗi');
                        return;
                    }

                    var description = CKEDITOR.instances.description.getData();

                    if (description == '') {
                        toastr.error('Vui lòng nhập mô tả sản phầm.', 'Lỗi');
                        return;
                    }

                    form.submit();
                }
            });
        });

        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ customAsset('assets/admin/plugins/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ customAsset('assets/admin/plugins/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ customAsset('assets/admin/plugins/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ customAsset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ customAsset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ customAsset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
            language: 'vi',
            height: 600
        });
        let uploadedImageDetailMap = {}

        Dropzone.autoDiscover = false;
        let uploadedImagePreviewlMap = {}

        $("#dropzone-image-preview").dropzone(            {
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
                key: "post_preview_"
            },
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (file, response) {
                let uuid = file.upload.uuid
                $('#edit-post-form').append(`<textarea class="${uuid}" hidden name="image">${JSON.stringify(response.data)}</textarea>`)

                response.data.uuid = uuid

                uploadedImagePreviewlMap[file.upload.filename] = response.data
            },
            error: function (file, response) {
                return false;
            },
            accept: function(file, done) {
                done()
            },
            init : function() {
                let myDropzone = this;
                myDropzone.on('maxfilesexceeded', function(file) {
                    toastr.error("Ảnh đại diện tối đa là 1 ảnh.", 'Lỗi');
                    myDropzone.removeFile(file);
                });

                myDropzone.options.maxFiles = 0;

                let imagePreview = {!! isset($item->image) ? json_encode($item->image) : "''" !!};

                let callback = null; // Optional callback when it's done
                let crossOrigin = null; // Added to the `img` tag for crossOrigin handling
                let resizeThumbnail = true; // Tells Dropzone whether it should resize the image first
                myDropzone.displayExistingFile(imagePreview, imagePreview.url, callback, crossOrigin, resizeThumbnail);
                myDropzone.options.maxFiles = 0
            },
            removedfile: function (file) {
                let myDropzone = this;
                file.previewElement.remove()
                if(typeof(file.upload) == 'object') {
                    if(file.accepted) {
                        $(`form .${file.upload.uuid}`).remove()
                        let storeNameRemove = uploadedImagePreviewlMap[file.upload.filename].store_name
                        removeImageOnServer(storeNameRemove)
                    }
                } else {
                    myDropzone.options.maxFiles = 1
                    $('#edit-post-form').append(`<input type="hidden" name="remove_preview_image_id" value="${file.id}">`)
                }
            },
        });

        function validateRequiredPreviewImage() {
            var check = true;
            var isRemovedPreviewImage = $('#edit-post-form input[name="remove_preview_image_id"]').length;
            if(isRemovedPreviewImage) {
                var previewImage = $('#edit-post-form textarea[name="image"]').length
                if(previewImage == 0) {
                    check = false;
                }
            }
            return check;
        }
    </script>
@endpush
