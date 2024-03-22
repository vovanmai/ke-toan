@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Quản lý sản phẩm</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form id="edit-product-form" class="form-horizontal" method="POST" action="{{ route('admin.product.update', ['id' => $product]) }}">
                        @csrf
                        @method('PUT')
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-fw fa-edit"></i>Cập nhật sản phẩm</h3>
                            <div class="box-tools pull-right">
                                <a href="{{ route('admin.product.list') }}" type="button" class="btn btn-primary"><i class="fa fa-fw fa-list-alt"></i>
                                    Xem danh sách
                                </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div>
                                <div class="col-md-4">
                                    <div class="form-group @error('name') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Tên sản phẩm<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group @error('image') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Ảnh đại diện<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <div id="dropzone-image-preview" class="dropzone">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group @error('price') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Giá<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                                        </div>
                                    </div>
                                    <div class="form-group @error('quantity') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Số lượng<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" placeholder="Tối đa là 100">
                                            @error('quantity')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-md-offset-1">
                                    <div class="form-group" style="margin-bottom: 30px">
                                        <label>
                                            Danh mục<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <div style="border: 1px solid #d2d6de; padding: 10px 20px; max-height: 480px; overflow-y: auto;">
                                                @foreach($categories as $cat)
                                                    <?php
                                                        $editCategory = $product->category;
                                                    ?>
                                                        @include('admin.component.edit-child-category-other', [
                                                            'category' => $cat,
                                                            'editCategory' => $editCategory,
                                                        ])
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" style="margin-bottom: 30px">
                                        <label>
                                            Ảnh chi tiết<span class="required">(*)</span>
                                        </label>
                                        <div class="field-container">
                                            <div id="dropzone-image-detail" class="dropzone"></div>
                                        </div>
                                    </div>
                                    <div class="form-group @error('description') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Chi tiết<span class="required">(*)</span>
                                        </label>

                                        <div class="field-container">
                                            <textarea name="description" class="form-control" rows="10">{!! $product->description !!}</textarea>
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
        let minPrice = {{ \App\Models\Product::MIN_PRICE }}
        let maxPrice = {{ \App\Models\Product::MAX_PRICE }}

        let minQty = {{ \App\Models\Product::MIN_QUANTITY }}
        let maxQty = {{ \App\Models\Product::MAX_QUANTITY }}
        $(function() {
            $("form").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 100,
                    },
                    category_id: {
                        required: true,
                    },
                    price: {
                        required: true,
                        digits: true,
                        max: maxPrice,
                        min: minPrice,
                    },
                    quantity: {
                        required: true,
                        digits: true,
                        max: maxQty,
                        min: minQty,
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
                        required: "Tên không được rỗng.",
                    },
                    price: {
                        required: "Giá không được rỗng.",
                    },
                    quantity: {
                        required: "Số lượng không được rỗng.",
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
                    // Validate preview image is required
                    if (!validateRequiredPreviewImage()) {
                        toastr.error('Vui lòng chọn ảnh đại diện.', 'Lỗi');
                        return;
                    }

                    if(!validateRequiredDetailImage()) {
                        toastr.error('Vui lòng chọn ảnh chi tiết.', 'Lỗi');
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
            filebrowserBrowseUrl: '{{ asset('assets/admin/plugins/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('assets/admin/plugins/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('assets/admin/plugins/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
            language: 'vi',
        });
        let uploadedImageDetailMap = {}

        Dropzone.autoDiscover = false;
        let maxDetailImages = {{ \App\Models\Product::MAX_DETAIL_IMAGE }};
        let countDetailImages = {!! $product->detailImages->count() !!};
        let maxRealDetailImages = maxDetailImages - countDetailImages

        $("#dropzone-image-detail").dropzone(            {
            maxFiles: maxRealDetailImages,
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
                key: "product_detail_"
            },
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (file, response) {
                let uuid = file.upload.uuid
                $('#edit-product-form').append(`<textarea class="${uuid}" hidden name="detail_images[]">${response.data}</textarea>`)

                response.data.uuid = uuid
                uploadedImageDetailMap[file.upload.filename] = response.data
            },
            error: function (file, response) {
                return false;
            },
            accept: function(file, done) {
                done()
            },
            init : function() {
                var myDropzone = this;
                myDropzone.on('maxfilesexceeded', function(file) {
                    toastr.error(`Tối đa là ${maxDetailImages} ảnh.`, 'Lỗi');
                    myDropzone.removeFile(file);
                });

                let detailImages = {!! $product->detailImages !!}

                $.each(detailImages, function( index, value ) {
                    let callback = null; // Optional callback when it's done
                    let crossOrigin = null; // Added to the `img` tag for crossOrigin handling
                    let resizeThumbnail = true; // Tells Dropzone whether it should resize the image first
                    myDropzone.displayExistingFile(value, value.url, callback, crossOrigin, resizeThumbnail);
                });

                myDropzone.options.maxFiles = maxDetailImages - {{ $product->detailImages->count() }};
            },
            removedfile: function (file) {
                file.previewElement.remove()
                let myDropzone = this
                if(typeof(file.upload) == 'object') {
                    if (file.accepted) {
                        $(`form .${file.upload.uuid}`).remove()
                        myDropzone.options.maxFiles = myDropzone.options.maxFiles + 1;
                        let storeNameRemove = uploadedImageDetailMap[file.upload.filename].store_name
                        removeImageOnServer(storeNameRemove)
                    }
                } else {
                    myDropzone.options.maxFiles = myDropzone.options.maxFiles + 1;
                    console.log(myDropzone.options.maxFiles)
                    $('#edit-product-form').append(`<input type="hidden" name="remove_detail_image_ids[]" value="${file.id}">`)
                }
            },
        });

        let uploadedImagePreviewlMap = {}

        $("#dropzone-image-preview").dropzone(            {
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
                key: "product_preview_"
            },
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (file, response) {
                let uuid = file.upload.uuid
                $('#edit-product-form').append(`<textarea class="${uuid}" hidden name="preview_image">${response.data}</textarea>`)

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
                let imagePreview = {!! $product->previewImage ?? "''" !!};

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
                    $('#edit-product-form').append(`<input type="hidden" name="remove_preview_image_id" value="${file.id}">`)
                }
            },
        });

        function validateRequiredPreviewImage() {
            var check = true;
            var isRemovedPreviewImage = $('#edit-product-form input[name="remove_preview_image_id"]').length;
            if(isRemovedPreviewImage) {
                var previewImage = $('#edit-product-form textarea[name="preview_image"]').length
                if(previewImage == 0) {
                    check = false;
                }
            }
            return check;
        }

        function validateRequiredDetailImage() {
            var check = true;
            var numberOfRemove = $('#edit-product-form input[name="remove_detail_image_ids[]"]').length;

            // Remove all images
            if(numberOfRemove == countDetailImages) {
                var numberOfAddedImages = $('#edit-product-form textarea[name="detail_images[]"]').length

                if(numberOfAddedImages == 0) {
                    check = false;
                }
            }
            return check;
        }
    </script>
@endpush
