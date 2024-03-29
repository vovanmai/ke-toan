<!DOCTYPE html>
<html>
<head>
    <style>
        * { background: #000; }
        img { width: 400px; height: 300px; float: left; margin: 0 10px 10px 0 }

        .loader {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0; left: 0;
            background: #fff url(https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif) no-repeat center center;
        }
    </style>
</head>
<body>

<h1>The img loading attribute</h1>
<div class="loader"></div>
<div class="images">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-1.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-2.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-3.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-4.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-5.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-6.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-7.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-8.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-9.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-10.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-11.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-12.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-13.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-14.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-15.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-16.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-17.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-18.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-19.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-20.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-21.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-22.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-23.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-24.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-25.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-26.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-27.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-28.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-29.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-30.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-31.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-32.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-33.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-34.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-35.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-36.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-37.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-38.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-39.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-40.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-41.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-42.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-43.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-44.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-45.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-46.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-47.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-48.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-49.jpg">
    <img class="lazy" data-original="http://www.hotelgarcinialeaf.com/images/gallery/thumbs/img-50.jpg">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
<script>
    $(document).ready(function(){
        $('.loader').hide();
    });

    $("img.lazy").lazyload({effect: "fadeIn"});


</script>
</body>
</html>
