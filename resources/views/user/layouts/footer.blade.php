<div id="footer">
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6">--}}
{{--                @php--}}
{{--                    $setting = app('web_setting');--}}
{{--                    $hotline = $setting->hotline ?? '';--}}
{{--                    $newHotline = str_replace('.', '', $hotline)--}}
{{--                @endphp--}}
{{--                <h6 class="company-name">{{ $setting->company_name ?? null }}</h6>--}}
{{--                <div>--}}
{{--                    <p style="margin-bottom: 5px; font-size: 13px">--}}
{{--                        <i class="fa fa-phone" aria-hidden="true"></i> Phone:--}}
{{--                        <a href="tel:0984969752">{{ $setting->hotline ?? null }}</a>--}}
{{--                    </p>--}}
{{--                    <p style="margin-bottom: 5px; font-size: 13px">--}}
{{--                        <i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ:--}}
{{--                        {{ $setting->company_address ?? null }}--}}
{{--                    </p>--}}
{{--                    <p style="margin-bottom: 5px; font-size: 13px">--}}
{{--                        <i class="fa fa-envelope" aria-hidden="true"></i> Email:--}}
{{--                        {{ $setting->company_email ?? null }}--}}
{{--                    </p>--}}
{{--                    <p style="margin-bottom: 5px; font-size: 13px">--}}
{{--                        <i class="fa fa-globe" aria-hidden="true"></i> Website:--}}
{{--                        <a href="https://ketoandpt.com.vn">{{ $setting->company_website_domain ?? null }}</a>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    @php
        $setting = app('web_setting');
        $hotline = $setting->hotline ?? '';
        $newHotline = str_replace('.', '', $hotline)
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="padding-top: 20px">

                    <h5 class="text-center" style="color: white; font-weight: bold">{{ $setting->company_name ?? null }}</h5>
                    <h6 class="text-center" style="color: white">Mã số thuế : {{ $setting->company_tax_code ?? null }}</h6>
                    <h6 class="text-center" style="color: white">Địa chỉ : {{ $setting->company_address ?? null }}</h6>
                    <h6 class="text-center" style="color: white">Hotline : <a style="color: white" href="tel:{{$newHotline}}">{{ $hotline ?? null }}</a> </h6>
                    <h6 class="text-center" style="color: white">Website : <a style="color: white" href="{{$setting->company_website_domain ?? null}}">{{ $setting->company_website_domain ?? null }}</a> </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="phone1">
        <a href="tel:{{ $hotline }}" style="position: relative">
            <div class="number" style="display: none;"></div>
            <div class="quick-alo-ph-circle"></div>
            <div class="quick-alo-ph-circle-fill"></div>
            <div class="quick-alo-ph-img-circle"> </div>
        </a>
    </div>

    <div class="zalo">
        <a href="https://zalo.me/{{$hotline}}" style="position: relative">
            <div class="zalo-number" style="display: none;"> 0818790015</div>
            <div class="zalo-quick-alo-ph-circle"></div>
            <div class="zalo-quick-alo-ph-circle-fill"></div>
            <div class="zalo-quick-alo-ph-img-circle"> </div>
        </a>
    </div>

    <div class="facebook-chat">
        <div>
            <a href="https://www.facebook.com/mai.vo.773124">
                <div style="background-color: rgb(49, 204, 70); border: 2.5px solid white; border-radius: 50%; height: 10px; width: 10px; position: absolute;bottom: 0px; right: 0px"></div>
                <div style="display: flex; align-items: center;">
                    <div style="width: 60px; height: 60px; background-color: #0A7CFF; display: flex; justify-content: center; align-items: center; border-radius:60px">
                        <svg width="36" height="36" viewBox="0 0 36 36">
                            <path fill="white" d="M1 17.99C1 8.51488 8.42339 1.5 18 1.5C27.5766 1.5 35 8.51488 35 17.99C35 27.4651 27.5766 34.48 18 34.48C16.2799 34.48 14.6296 34.2528 13.079 33.8264C12.7776 33.7435 12.4571 33.767 12.171 33.8933L8.79679 35.3828C7.91415 35.7724 6.91779 35.1446 6.88821 34.1803L6.79564 31.156C6.78425 30.7836 6.61663 30.4352 6.33893 30.1868C3.03116 27.2287 1 22.9461 1 17.99ZM12.7854 14.8897L7.79161 22.8124C7.31238 23.5727 8.24695 24.4295 8.96291 23.8862L14.327 19.8152C14.6899 19.5398 15.1913 19.5384 15.5557 19.8116L19.5276 22.7905C20.7193 23.6845 22.4204 23.3706 23.2148 22.1103L28.2085 14.1875C28.6877 13.4272 27.7531 12.5704 27.0371 13.1137L21.673 17.1847C21.3102 17.4601 20.8088 17.4616 20.4444 17.1882L16.4726 14.2094C15.2807 13.3155 13.5797 13.6293 12.7854 14.8897Z"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div id="to-top">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </div>
</div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v19.0" nonce="6Eoz0Xhr"></script>
<script src="/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/js/swiper-bundle.min.js" type="text/javascript"></script>
<script src="/js/app.js" type="text/javascript"></script>
{!! NoCaptcha::renderJs() !!}
</body>
</html>
