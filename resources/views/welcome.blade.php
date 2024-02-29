
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--FontAwesome-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/user/css/ace-responsive-menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/user/css/app.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div style="max-width: 1000px; margin-right: auto; margin-left: auto; background: red">
    <div>fsdf safs fasafsadf fsdafsafd fasdds  saf dsf  sas a s f fsdf safs fasafsadf fsdafsafd fasdds  saf dsf  sas a s f fsdf safs fasafsadf fsdafsafd fasdds  saf dsf  sas a s f fsdf safs fasafsadf fsdafsafd fasdds  saf dsf  sas a s f fsdf safs fasafsadf fsdafsafd fasdds  saf dsf  sas a s f </div>
    <div style="overflow-x:auto;">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Points</th>
                <th>Points</th>
                <th>Points</th>
                <th>Points</th>
                <th>Points</th>
                <th>Points</th>
                <th>Points</th>
                <th>Points</th>
                <th>Points</th>
                <th>Points</th>
            </tr>
            <tr>
                <td>Jill</td>
                <td>Smith</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Eve</td>
                <td>Jackson</td>
                <td>94</td>
                <td>94</td>
                <td>94</td>
                <td>94</td>
                <td>94</td>
                <td>94</td>
                <td>94</td>
                <td>94</td>
                <td>94</td>
                <td>94</td>
            </tr>
            <tr>
                <td>Adam</td>
                <td>Johnson</td>
                <td>67</td>
                <td>67</td>
                <td>67</td>
                <td>67</td>
                <td>67</td>
                <td>67</td>
                <td>67</td>
                <td>67</td>
                <td>67</td>
                <td>67</td>
            </tr>
        </table>
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
</script>
</body>
</html>
