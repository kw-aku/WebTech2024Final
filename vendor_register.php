<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="./css/vendor_register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> <!--for the Ajax-->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--for the font Inter-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="content-container">
        <form action="./actions/vendor_action.php" method="POST">
            <p id="headline">Create an account!</p>

            <div id="user-btns">
                <input type="button" value="Regular"id="regular-btn"></a> 
                <input type="button" value="Vendor"id="vendor-btn" href="">
            </div>
            
            <div>
                <input type="text" name="pubname" id="pubname" placeholder="Pub Name" required><br>
                <input type="text" name="city" id="city" placeholder="City" required><br>
                <input type="email" name="email" id="email" placeholder="Email" required><br>
                <input type="password" name="password" id="password" placeholder="Password" required><br><br>
                <input type="submit" name="submit" id="submit" value="Create an account">
                <p id="login-txt">Already have an account?&nbsp&nbsp&nbsp<a href="login.php"><span id="login-btn">->] Log in</span></a></p>
            </div>
            
        </form>
        
    </div>
</body>

<!--Ajax-->
<script>
    $(document).ready(function() {
        // Defining function for redirecting pages
        function loadContent(url) {
            $("#content-container").load(url);
        }

        // Event handlers for buttons
        $("#regular-btn").click(function() {
            loadContent("regular_register.php"); // when regular is clicked
        });

        $("#vendor-btn").click(function() {
            loadContent("vendor_register.php"); // when vendor is clicked
        });
    });
</script>
</html>