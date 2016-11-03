<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gofit</title>
    <link href="css/login.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet"href="css/w3.css">
</head>
<body>
<a href="index.html"><div class="w3-closebtn w3-margin-right w3-medium">x</div></a>
<div class="login">
    <div class="message">Gofit-login</div>
    <div id="darkbannerwrap"></div>
    <form method="post" action="/login">
        <input name="action" value="login" type="hidden">
        <input name="username" placeholder="username" required="" type="text">
        <hr class="hr15">
        <input name="password" placeholder="password" required="" type="password">
        <hr class="hr15">
        <input value="login" style="width:100%;" type="submit">
        <hr class="hr20">
        <a href="register.php">Don't have an account?</a>
    </form>
</div>
<div class="copyright">© 2016TJStudio</div>

</body>
</html>