<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @php
                    $setting = app('web_setting');

                @endphp
                <h6 class="company-name">{{ $setting->company_name }}</h6>
                <div>
                    <p style="margin-bottom: 5px; font-size: 13px">
                        <i class="fa fa-phone" aria-hidden="true"></i> Phone:
                        <a href="tel:0984969752">{{ $setting->hotline ?? null }}</a>
                    </p>
                    <p style="margin-bottom: 5px; font-size: 13px">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ:
                        {{ $setting->company_address ?? null }}
                    </p>
                    <p style="margin-bottom: 5px; font-size: 13px">
                        <i class="fa fa-envelope" aria-hidden="true"></i> Email:
                        {{ $setting->company_email ?? null }}
                    </p>
                    <p style="margin-bottom: 5px; font-size: 13px">
                        <i class="fa fa-globe" aria-hidden="true"></i> Website:
                        <a href="https://ketoandpt.com.vn">{{ $setting->company_website_domain ?? null }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v19.0" nonce="01oxi40l"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/assets/user/js/app.js" type="text/javascript"></script>
</body>
</html>
