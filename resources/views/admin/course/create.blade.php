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
                    <form id="create-post-form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('admin.post.store') }}">
                        @csrf
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-fw fa-search"></i>Tạo mới bài viết</h3>
                            <div class="box-tools pull-right">
                                <a href="{{ route('admin.post.list') }}" type="button" class="btn btn-primary"><i class="fa fa-fw fa-list-alt"></i>
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
                                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="form-group @error('short_description') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Mô tả ngắn
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="short_description" rows="5">{{ old('short_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group @error('preview_image') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Ảnh đại diện<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <div id="dropzone-image-preview" class="dropzone">

                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="form-group @error('comment_type') has-error @enderror" style="margin-bottom: 30px">
                                        <div class="row">
                                            <div class="col-xs-6">
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
                                                            <input type="radio" value="{{ $key }}" name="comment_type" class="radio-green" {{ $key === COMMENT_NORMAL ? 'checked' : '' }}>
                                                            {{ $commentType }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>
                                                    <span>Hiển thị nội dung bài viết trên trang chủ</span>
                                                </label>
                                                <div class="field-container">
                                                    <input type="checkbox" class="flat-red" name="is_show_home">
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}
                                </div>
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="form-group" style="margin-bottom: 30px">
                                        <label>
                                            Danh mục<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <div style="border: 1px solid #d2d6de; padding: 10px 20px; max-height: 417px; overflow-y: auto;">
                                                @foreach($categories as $cat)
                                                    @include('admin.component.child-category', [
                                                        'category' => $cat,
                                                    ])
                                                @endforeach
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
                                            <textarea name="description" class="form-control" rows="10"></textarea>
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
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check"></i>Tạo</button>
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
            $("#create-post-form").validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 255,
                    },
                    category_id: {
                        required: true,
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
                    title: {
                        required: "Tiêu đề không được rỗng.",
                    },
                    short_description: {
                        maxlength: "Không được quá 255 ký tự",
                    },
                    category_id: {
                        required: "Danh mục không được rỗng.",
                    },
                },
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest(".form-group").find('.field-container'));
                },
                invalidHandler: function(form, validator) {
                    toastr.error('Dữ liệu nhập không hợp lệ.', 'Lỗi');
                },
                submitHandler: function(form) {
                    // validate preview image is required
                    var numberPreviewImage = $('#create-post-form textarea[name="image"]').length;
                    if (numberPreviewImage == 0) {
                        toastr.error('Vui lòng chọn ảnh đại diện.', 'Lỗi');
                        return;
                    }

                    // Validate description is required
                    var description = CKEDITOR.instances.description.getData();
                    if (description == '') {
                        toastr.error('Vui lòng nhập chi tiết.', 'Lỗi');
                        return;
                    }

                    // Create product
                    form.submit();
                }
            });
        });


        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ asset('assets/admin/plugins/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('assets/admin/plugins/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('assets/admin/plugins/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
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
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp",
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
                $('#create-post-form').append(`<textarea class="${uuid}" hidden name="image">${JSON.stringify(response.data)}</textarea>`)

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
                var myDropZone = this;
                myDropZone.on('maxfilesexceeded', function(file) {
                    toastr.error("Ảnh đại diện tối đa là 1 ảnh.", 'Lỗi');
                    myDropZone.removeFile(file);
                });

            },
            removedfile: function (file) {
                file.previewElement.remove()
                let uuid = file.upload.uuid
                $(`#create-post-form .${uuid}`).remove()
                let storeNameRemove = uploadedImagePreviewlMap[file.upload.filename].store_name
                removeImageOnServer(storeNameRemove)
            },
        });
    </script>
@endpush
