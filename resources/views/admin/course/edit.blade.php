@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Quản lý khóa học</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form id="edit-form" class="form-horizontal" method="POST" action="{{ route('admin.course.update', ['id' => $item->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-fw fa-search"></i>Cập nhật slide</h3>
                            <div class="box-tools pull-right">
                                <a href="{{ route('admin.course.list') }}" type="button" class="btn btn-primary"><i class="fa fa-fw fa-list-alt"></i>
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
                                            <input type="text" name="title" class="form-control" value="{{ old('title') ?? $item->title }}">
                                        </div>
                                    </div>

                                    <div class="form-group @error('short_description') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Mô tả ngắn<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="short_description" style="width: 100%" rows="5">{{ $item->short_description }}</textarea>
                                            @error('short_description')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('comment_type') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Kiểu bình luận<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            @php
                                                $commentTypes = [
                                                    COMMENT_NORMAL => 'Bình luận thường',
                                                    COMMENT_FACEBOOK => 'Bình luận bằng facebook',
                                                    COMMENT_NORMAL_AND_FACEBOOK => 'Cả hai',
                                                ];
                                            @endphp
                                            @foreach($commentTypes as $key => $commentType)
                                                <div style="margin-bottom: 5px">
                                                    <input type="radio" value="{{ $key }}" name="comment_type" class="radio-green" {{ $key === $item->comment_type ? 'checked' : '' }}>
                                                    {{ $commentType }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group @error('short_description') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Mô tả ngắn<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="short_description" class="form-control" value="{{ old('short_description') ?? $item->short_description }}">
                                        </div>
                                    </div>
                                    <div class="form-group @error('image') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Ảnh<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <div id="dropzone-image" class="dropzone">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('description') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Chi tiết<span class="required">(*)</span>
                                        </label>

                                        <div class="field-container">
                                            <textarea name="description" class="form-control" rows="10">{!! $item->description !!}</textarea>
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

        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ customAsset('assets/admin/plugins/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ customAsset('assets/admin/plugins/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ customAsset('assets/admin/plugins/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ customAsset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ customAsset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ customAsset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
            language: 'vi',
        });

        $(function() {
            $("#edit-form").validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 255,
                    },
                    short_description: {
                        required: true,
                        maxlength: 255,
                    },
                    link: {
                        required: true,
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
                        toastr.error('Vui lòng chọn ảnh đại diện.', 'Lỗi');
                        return;
                    }
                    // Create main-banner
                    form.submit();
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
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
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
                $('#edit-form').append(`<textarea class="${uuid}" hidden name="image">${JSON.stringify(response.data)}</textarea>`)

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
                    toastr.error("Ảnh đại diện tối đa là 1 ảnh.", 'Lỗi');
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
                    $('#edit-form').append(`<input type="hidden" name="remove_logo_id" value="${file.id}">`)
                }
            },
        });

        function validateRequiredImage() {
            var check = true;
            var isRemovedPreview = $('#main-banner input[name="remove_image_id"]').length;
            if(isRemovedPreview) {
                var image = $('#edit-form textarea[name="image"]').length
                if(image == 0) {
                    check = false;
                }
            }
            return check;
        }
    </script>
@endpush
