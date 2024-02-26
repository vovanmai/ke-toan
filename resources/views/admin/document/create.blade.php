@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Quản lý tài liệu</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form id="create-document-form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('admin.document.store') }}">
                        @csrf
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-fw fa-search"></i>Tạo mới tài liệu</h3>
                            <div class="box-tools pull-right">
                                <a href="{{ route('admin.document.list') }}" type="button" class="btn btn-primary"><i class="fa fa-fw fa-list-alt"></i>
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
                                            Mô tả ngắn<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="short_description" rows="5">{{ old('short_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group @error('preview_file') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            File xem trước(PDF)<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <div id="dropzone-file-preview" class="dropzone">

                                            </div>
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
                                                <input type="radio" value="{{ $key }}" name="comment_type" class="radio-green" {{ $key === COMMENT_NORMAL ? 'checked' : '' }}>
                                                {{ $commentType }}
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group @error('total_page') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Tổng số trang<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="total_page" class="form-control" value="{{ old('total_page') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
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
                                    <div class="form-group">
                                        <label>Miễn phí</label>
                                        <div class="field-container">
                                            <label>
                                                <input class="checkbox-input" name="is_free" type="checkbox">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group @error('price') has-error @enderror">
                                        <label>
                                            Giá (Vnđ)<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                                        </div>
                                    </div>
                                    <div class="form-group @error('file') has-error @enderror">
                                        <label>
                                            Tệp đầy đủ<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <div id="dropzone-full-file" class="dropzone">

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
        Dropzone.autoDiscover = false;
        $("input[name='is_free']").on("ifChecked  ifUnchecked", function (event) {
            if (event.type == 'ifChecked') {
                $("input[name=price]").val('')
                $("input[name=price]").prop('disabled', true)
            } else {
                $("input[name=price]").prop('disabled', false)
            }
        });

        $(function() {
            $("#create-document-form").validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 255,
                    },
                    category_id: {
                        required: true,
                    },
                    short_description: {
                        required: true,
                        maxlength: 255,
                    },
                    price: {
                        required: true,
                        digits: true,
                        max: 10000000,
                        min: 1000,
                    },
                    total_page: {
                        required: true,
                        digits: true,
                        min: 1,
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
                        required: "Mô tả ngắn không được rỗng.",
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
                    var numberPreviewImage = $('#create-document-form textarea[name="preview_file"]').length;
                    if (numberPreviewImage == 0) {
                        toastr.error('Vui lòng chọn ảnh đại diện.', 'Lỗi');
                        return;
                    }

                    // validate file is required
                    var numberFile = $('#create-document-form textarea[name="file"]').length;
                    if (numberFile == 0) {
                        toastr.error('Vui lòng chọn tệp đầy đủ.', 'Lỗi');
                        return;
                    }

                    var description = CKEDITOR.instances.description.getData();

                    if (description == '') {
                        toastr.error('Vui lòng nhập nội dung chi tiết.', 'Lỗi');
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
            height: 300
        });

        let uploadedImagePreviewlMap = {}
        $("#dropzone-file-preview").dropzone(            {
            maxFiles: 1,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".pdf",
            dictDefaultMessage: "Bạn có thể kéo hoặc click để chọn (chỉ tối đa 1 tệp PDF)",
            dictRemoveFile: 'Xóa',
            addRemoveLinks: true,
            uploadMultiple: false,
            autoProcessQueue: true,
            timeout: 60000,
            url: '/admin/upload-file',
            params: {
                key: "document_preview_"
            },
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (file, response) {
                let uuid = file.upload.uuid
                $('#create-document-form').append(`<textarea class="${uuid}" hidden name="preview_file">${JSON.stringify(response.data)}</textarea>`)

                response.data.uuid = uuid
                uploadedImagePreviewlMap[file.upload.filename] = response.data

                var thumbnail = '';
                const extension = response.data.extension;
                if(extension == 'pdf') {
                    thumbnail = '/assets/admin/dist/img/pdf.png';
                } else if(extension == 'doc' || extension == 'docx') {
                    thumbnail = '/assets/admin/dist/img/doc.jpg';
                } else if(extension == 'zip') {
                    thumbnail = '/assets/admin/dist/img/zip.png';
                }
                file.previewElement.querySelector("img").src = thumbnail;
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
                $(`#create-document-form .${uuid}`).remove()
                let storeNameRemove = uploadedImagePreviewlMap[file.upload.filename].store_name
                removeImageOnServer(storeNameRemove)
            },
        });

        let uploadedFullFilelMap = {}
        $("#dropzone-full-file").dropzone(            {
            maxFiles: 1,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".pdf,.zip,.doc,.docx",
            dictDefaultMessage: "Bạn có thể kéo hoặc click để chọn (tối đa 1 tệp PDF hoặc ZIP)",
            dictRemoveFile: 'Xóa',
            addRemoveLinks: true,
            uploadMultiple: false,
            autoProcessQueue: true,
            timeout: 60000,
            url: '/admin/upload-file',
            params: {
                key: "document_file_"
            },
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (file, response) {
                let uuid = file.upload.uuid
                $('#create-document-form').append(`<textarea class="${uuid}" hidden name="file">${JSON.stringify(response.data)}</textarea>`)

                response.data.uuid = uuid
                uploadedFullFilelMap[file.upload.filename] = response.data

                var thumbnail = '';
                const extension = response.data.extension;

                if(extension == 'pdf') {
                    thumbnail = '/assets/admin/dist/img/pdf.png';
                } else if(extension == 'doc' || extension == 'docx') {
                    thumbnail = '/assets/admin/dist/img/doc.jpg';
                } else if(extension == 'zip') {
                    thumbnail = '/assets/admin/dist/img/zip.png';
                }
                file.previewElement.querySelector("img").src = thumbnail;
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
                    toastr.error("File chỉ tối đa 1 tệp.", 'Lỗi');
                    myDropZone.removeFile(file);
                });
            },
            removedfile: function (file) {
                file.previewElement.remove()
                let uuid = file.upload.uuid
                $(`#create-document-form .${uuid}`).remove()
                let storeNameRemove = uploadedFullFilelMap[file.upload.filename].store_name
                removeImageOnServer(storeNameRemove)
            },
        });
    </script>
@endpush
