
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
        /*==Reset CSS==*/
        * {
            margin: 0;
            padding: 0;
        }


        /*==Style cơ bản cho website==*/
        body {
            font-family: sans-serif;
            color: #333;
        }

        #menu {
            list-style: none;
            background: green;
            width: 100%;
            display: table;

        }

        #menu > li {
            color: #fff;
            float: left;
            position: relative;
        }
        #menu li a {
            text-decoration: none;
            font-size: 16px;
            display: block;
            padding: 15px;
            color: #fff;
            background: green;
        }

        #menu ul {
            list-style: none;
            position: absolute;
            display: none;
            min-width: 250px;
        }

        #menu > li:hover > .submenu {
            z-index: 100;
            display: block;
        }

    </style>
</head>
<body>
<div>
    <div>
        <ul id="menu">
            <li><a href="#">Trang chủ</a></li>
            <li>
                <a href="#">Diễn đàn</a>
                <ul class="submenu">
                    <li>
                        <a href="">Menu 1 df sf </a>
                    </li>
                </ul>
            </li>
            <li><a href="#">Tin tức</a></li>
            <li><a href="#">Tin tức</a></li>
            <li><a href="#">Hỏi đáp</a></li>
            <li><a href="#">Liên hệ</a></li>
        </ul>
        <div style="background: gray; height: 150px">112</div>
    </div>
</div>

<script type="text/javascript">

</script>
</body>
</html>
