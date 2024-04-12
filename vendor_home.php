<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    // header('Location: ../regular_register.php');
    // echo "<script>window.location.href='login.php'</script>";
    // echo "<script>window.location.href='../login.php'</script>";
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="./css/vendor_home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--for the font Inter-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="left-side">
        <p id="inventory">Inventory</p>
        <a href="./actions/logout.php"><p id="logout">Logout ->]</p></a>
    </div>
    
    <div id="right-side">
        <button id="add-btn" onclick="showForm()">Add</button><br>

         <!--form for create -->
         <form id="formPopUp" action="./actions/vendor_home_post.php" method="post">
            <p id="close" class="close-form" onclick="closeForm()">&times</p>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
            <input type="text" name="item" id="item" placeholder="Item Name">
            <input type="submit" name="submit" id="submit" value="Submit">
        </form>


        <table>
            <thead>
                <th>Id</th>
                <th>Inventory</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                include ("./actions/fxn_view_item.php");
                while ($row = mysqli_fetch_assoc($result)){
                    //extracting values from results
                    $id = $row['id'];
                    $item = $row['item'];
                    //Displaying values
                    echo "<tr>";
                        echo "<td>1</td>";
                        echo "<td id='$id'>$item</td>";
                        echo "<td><a href='./actions/delete_item.php?id=$id'>
                        <span style='cursor:pointer;'>delete</span></a>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a>
                        <span data-item-id='$id' id='update' style='cursor:pointer;' onclick='showFormUpdate(this)'>update</span></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        
               

        <!--form for update-->
        <form id="formPopUpdate" action="./actions/update_item.php" method="post">
            <p id="close" class="close-form" onclick="closeFormUpdate()">&times</p>
            <input type="hidden" id="hidden-element" name="id" >
            <input type="text" name="item" id="item" placeholder="Item Name">
            <input type="submit" name="submit" id="submit" value="Submit">
        </form>

        <script>
            function showForm() {
                // Get the form element
                const form = document.getElementById("formPopUp");
                
                // Change the display style to block (show the form)
                form.style.display = "block";
            }

            function closeForm() {
                // Get the form element
                const form = document.getElementById("formPopUp");
                
                // Change the display style to none (hide the form)
                form.style.display = "none";
            }

            function showFormUpdate(clickedElement) {
                // Get the form element
                const form = document.getElementById("formPopUpdate");
                let itemId = clickedElement.dataset.itemId;
                document.getElementById("hidden-element").value = itemId;
                if (form.style.display="none"){
                    form.style.display = "block";
            }}

            function closeFormUpdate() {
                // Get the form element
                const form = document.getElementById("formPopUpdate");
                
                // Change the display style to none (hide the form)
                form.style.display = "none";
            }
        </script>

               
    </div>
</body>
</html>