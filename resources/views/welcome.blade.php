<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
    <link href="css/app.css" rel="stylesheet">
</head>
<body class="py-5">

<div class="container">
    <h2>Registration</h2>
    <form action="" name="registration">

        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" placeholder="John"/>

        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" placeholder="Doe"/>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="john@doe.com"/>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;"/>

        <button type="submit">Register</button>

    </form>
</div>
<script src="js/app.js" type="text/javascript"></script>
</body>
</html>
