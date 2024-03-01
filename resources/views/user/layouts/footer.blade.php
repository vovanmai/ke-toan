<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h6 class="company-name">CÔNG TY CỔ PHẦN TỔNG HỢP </h6>
                <div>
                    <p style="margin-bottom: 5px; font-size: 13px">
                        <i class="fa fa-phone" aria-hidden="true"></i> Phone:
                        <a href="tel:0984969752">0984.969.752</a>
                    </p>
                    <p style="margin-bottom: 5px; font-size: 13px">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ:
                        74 Trương Chí Cương, Quận Hải Châu, Đà Nẵng.
                    </p>
                    <p style="margin-bottom: 5px; font-size: 13px">
                        <i class="fa fa-envelope" aria-hidden="true"></i> Email:
                        ketoandpt@gmail.com
                    </p>
                    <p style="margin-bottom: 5px; font-size: 13px">
                        <i class="fa fa-globe" aria-hidden="true"></i> Website:
                        <a href="https://ketoandpt.com.vn">ketoandpt.com.vn</a>
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
<script src="/assets/user/js/ace-responsive-menu.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#respMenu").aceResponsiveMenu({
            resizeWidth: '768', // Set the same in Media query
            animationSpeed: 'fast', //slow, medium, fast
            accoridonExpAll: false //Expands all the accordion menu on click
        });
    });
    $('#menu > li').hover(function() {
        // khi thẻ menu li bị hover thì drop down menu thuộc thẻ li đó sẽ trượt xuống(hiện)
        $('.dropdown_menu', this).slideDown(200);
    },function() {
        // khi thẻ menu li bị out không hover nữa thì drop down menu thuộc thẻ li đó sẽ trượt lên(ẩn)
        $('.dropdown_menu', this).slideUp(200);
    });

    $('.dropdown_menu > li').hover(function() {
        // khi thẻ dropdown_menu li bị hover thì submenusubmenu thuộc thẻ li đó sẽ trượt xuống(hiện)
        $('.submenu', this).slideDown(200);
    },function() {
        // khi thẻ dropdown_menu li bị hover thì submenusubmenu thuộc thẻ li đó sẽ trượt lên(ẩnẩn)
        $('.submenu', this).slideUp(200);
    });
</script>
</body>
</html>
