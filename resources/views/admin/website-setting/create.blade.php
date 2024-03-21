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
                                    <div class="form-group @error('company_name') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Tên công ty<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="company_name" class="form-control" value="{{ old('company_name') ?? $setting->company_name ?? null }}">
                                            @error('hotline')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('company_tax_code') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Mã số thuế công ty<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="company_tax_code" class="form-control" value="{{ old('company_tax_code') ?? $setting->company_tax_code ?? null }}">
                                            @error('company_tax_code')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('hotline') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Hotline<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="hotline" class="form-control" value="{{ old('hotline') ?? $setting->hotline ?? null }}">
                                            @error('hotline')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('company_email') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Email công ty<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="company_email" class="form-control" value="{{ old('company_email') ?? $setting->company_email ?? null }}">
                                            @error('contact_email')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('company_address') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Địa chỉ công ty<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="company_address" style="width: 100%" rows="5">{{ old('contact_address') ?? $setting->company_address ?? null }}</textarea>
                                            @error('company_address')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('company_website_domain') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Địa chỉ tên miền website công ty<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="company_website_domain" class="form-control" value="{{ old('company_website_domain') ?? $setting->company_website_domain ?? null }}">
                                            @error('company_website_domain')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('link_fan_page_facebook') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Đường dẫn Fanpage Facebook<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="link_fan_page_facebook" class="form-control" value="{{ old('link_fan_page_facebook') ?? $setting->link_fan_page_facebook ?? null }}">
                                            @error('link_fan_page_facebook')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 30px">
                                        <label>
                                            Lượt truy cập trang chủ<span class="required"></span>
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
                                    <div class="form-group @error('header_banner') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Header banner<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <div id="dropzone-header-banner" class="dropzone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group @error('header_banner_width') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Chiều rộng header banner (đơn vị px hoặc %)<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="header_banner_width" class="form-control" value="{{ old('header_banner_width') ?? $setting->header_banner_width ?? null }}">
                                            @error('header_banner_width')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('header_banner_height') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Chiều cao header banner (đơn vị px hoặc %)<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <input type="text" name="header_banner_height" class="form-control" value="{{ old('header_banner_height') ?? $setting->header_banner_height ?? null }}">
                                            @error('header_banner_height')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('fb_fan_page_script') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            FB fan page script<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="fb_fan_page_script" style="width: 100%" rows="5">{{ old('fb_fan_page_script') ?? $setting->fb_fan_page_script ?? null }}</textarea>
                                            @error('fb_fan_page_script')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('google_map_address_company') has-error @enderror" style="margin-bottom: 30px">
                                        <label>
                                            Goole map địa chỉ công ty<span class="required"></span>
                                        </label>
                                        <div class="field-container">
                                            <textarea class="form-control" name="google_map_address_company" style="width: 100%" rows="5">{{ old('google_map_address_company') ?? $setting->google_map_address_company ?? null }}</textarea>
                                            @error('google_map_address_company')
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

        let uploadedHeaderBannerMap = {}

        $("#dropzone-header-banner").dropzone(            {
            maxFiles: 1,
            renameFile: function (file) {
                return file.name;
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
                key: "header_banner_"
            },
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (file, response) {
                let uuid = file.upload.uuid
                $('#create-website-setting-form').append(`<textarea class="${uuid}" hidden name="header_banner">${JSON.stringify(response.data)}</textarea>`)

                response.data.uuid = uuid
                uploadedHeaderBannerMap[file.upload.filename] = response.data
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
                    toastr.error("Header banner tối đa là 1 ảnh.", 'Lỗi');
                    myDropZone.removeFile(file);
                });

                let header_banner = {!! isset($setting['header_banner']) ? json_encode($setting['header_banner']) : "''" !!};

                if(header_banner) {
                    let callback = null; // Optional callback when it's done
                    let crossOrigin = null; // Added to the `img` tag for crossOrigin handling
                    let resizeThumbnail = true; // Tells Dropzone whether it should resize the image first
                    myDropZone.displayExistingFile(header_banner, header_banner.url, callback, crossOrigin, resizeThumbnail);
                    myDropZone.options.maxFiles = 0
                }
            },
            removedfile: function (file) {
                console.log(file)
                let myDropzone = this;
                file.previewElement.remove()
                if(typeof(file.upload) == 'object') {
                    if(file.accepted) {
                        $(`form .${file.upload.uuid}`).remove()
                        let storeNameRemove = uploadedHeaderBannerMap[file.upload.filename].store_name
                        removeImageOnServer(storeNameRemove)
                    }
                } else {
                    myDropzone.options.maxFiles = 1
                    $('#create-website-setting-form').append(`<input type="hidden" name="is_remove_header_banner" value="1">`)
                }
            },
        });
    </script>
@endpush
