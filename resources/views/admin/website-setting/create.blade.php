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
                    <form id="create-website-setting-form" class="form-horizontal" method="POST" action="{{ route('admin.website_setting.store') }}">
                        @csrf
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-cog"></i> Thiết lập website</h3>
                            <div class="box-tools pull-right">
                                {{--<a href="{{ route('admin.recruitment.list') }}" type="button" class="btn btn-primary"><i class="fa fa-fw fa-list-alt"></i>
                                    Xem danh sách
                                </a>--}}
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div>
                                <div class="col-md-5">
                                    <div class="form-group @error('header_slogan') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Header slogan<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="header_slogan" class="form-control" value="{{ old('header_slogan') ?? $setting->header_slogan ?? null }}">
                                            @error('header_slogan')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('customer_support_phone') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Số điện thoại tư vấn khách hàng<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="customer_support_phone" class="form-control" value="{{ old('customer_support_phone') ?? $setting->customer_support_phone ?? null }}">
                                            @error('customer_support_phone')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('footer_slogan') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Footer slogan<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="footer_slogan" class="form-control" value="{{ old('footer_slogan') ?? $setting->footer_slogan ?? null }}">
                                            @error('footer_slogan')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('contact_email') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Contact email<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="contact_email" class="form-control" value="{{ old('contact_email') ?? $setting->contact_email ?? null }}">
                                            @error('contact_email')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('contact_phone') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Contact phone<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone') ?? $setting->contact_phone ?? null }}">
                                            @error('contact_phone')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('contact_address') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Contact address<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="contact_address" style="width: 100%" rows="5">{{ old('contact_address') ?? $setting->contact_address ?? null }}</textarea>
                                            @error('contact_address')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('fb_chat') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Facebook fanpage chat<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="fb_chat" style="width: 100%" rows="5">{{ old('fb_chat') ?? $setting->fb_chat ?? null }}</textarea>
                                            @error('fb_chat')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 30px">
                                        <label>
                                            Facebook comment App Id<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="fb_comment_app_id" class="form-control" value="{{ old('fb_comment_app_id') ?? $setting->fb_comment_app_id ?? null }}">
                                            @error('fb_comment_app_id')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 30px">
                                        <label>
                                            Lượt truy cập<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" disabled name="total_view" class="form-control" value="{{ number_format(old('total_view') ?? $setting->total_view ?? null) }}">
                                            @error('total_view')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group @error('logo') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Logo<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <div id="dropzone-logo" class="dropzone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group @error('logo_width') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Chiều rộng logo (đơn vị px)<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="logo_width" class="form-control" value="{{ old('logo_width') ?? $setting->logo_width ?? null }}">
                                            @error('logo_width')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('logo_height') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Chiều cao logo (đơn vị px)<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="logo_height" class="form-control" value="{{ old('logo_height') ?? $setting->logo_height ?? null }}">
                                            @error('logo_height')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('footer_fb_fan_page') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Footer FB fan page<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="footer_fb_fan_page" style="width: 100%" rows="5">{{ old('footer_fb_fan_page') ?? $setting->footer_fb_fan_page ?? null }}</textarea>
                                            @error('footer_fb_fan_page')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('contact_map') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Contact map<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="contact_map" style="width: 100%" rows="5">{{ old('contact_map') ?? $setting->contact_map ?? null }}</textarea>
                                            @error('contact_map')
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
        Dropzone.autoDiscover = false;

        let uploadedLogoMap = {}

        $("#dropzone-logo").dropzone(            {
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
                key: "website_logo_"
            },
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (file, response) {
                let uuid = file.upload.uuid
                $('#create-website-setting-form').append(`<textarea class="${uuid}" hidden name="logo">${JSON.stringify(response.data)}</textarea>`)

                response.data.uuid = uuid
                uploadedLogoMap[file.upload.filename] = response.data
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
                    toastr.error("Logo tối đa là 1 ảnh.", 'Lỗi');
                    myDropZone.removeFile(file);
                });

                let logo = {!! isset($setting['logo']) ? json_encode($setting['logo']) : "''" !!};

                if(logo) {
                    let callback = null; // Optional callback when it's done
                    let crossOrigin = null; // Added to the `img` tag for crossOrigin handling
                    let resizeThumbnail = true; // Tells Dropzone whether it should resize the image first
                    myDropZone.displayExistingFile(logo, logo.url, callback, crossOrigin, resizeThumbnail);
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
                    $('#create-website-setting-form').append(`<input type="hidden" name="remove_logo_id" value="${file.id}">`)
                }
            },
        });
    </script>
@endpush
