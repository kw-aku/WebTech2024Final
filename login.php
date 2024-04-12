<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="./css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> <!--for the Ajax-->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--for the font Inter-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="content-container">
        <form action="./actions/login_action.php" method="post">
            <p><span id="headline">Awesome!</span><br>
                <span id="sub-headline">Its good to have you back again</span>
            </p>
            <div>
                <input type="email" name="email" id="email" placeholder="email" required><br>
                <input type="password" name="password" id="password" placeholder="password" required><br><br><br><br>
                <input type="submit" name="submit" id="submit" value="Login">
            </div>
            <p id="register-txt">Don't have an Account? <a href="regular_register.php"><span id="register-btn">Register</span></a></p>
        </form>
    </div>
</body>
</html>