<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <nav>
        <div class="nav-bar">
            <label id="txtTime">00:00:00</label>

            <div>
                <ul>
                    <li id="logout">Logout</li>
                </ul>
            </div>

        </div>
    </nav>
    <div class="main-back">

        <div class="form">

            <div class="div-upp-pro">
                <img src="images/profilep.jpg" class="pro-pic">
                

                <div class="div-btn-profile">
                    <a name="btnCancel" href="home.php" class="new-item">Home</a>
                    <input type="submit" value="Save" name="btnSave" id="btnSubm" class="btnSubm">
                </div> 
            </div>

            <label class="lbl">Username:</label>
            <input class="txtInput" type="text" id="txtUsername" name="username" required placeholder="Username">
            <label id="lblunFeedback"></label>
            <label class="lbl">Password:</label>
            <input class="txtInput" type="password" id="txtPassword" name="password" placeholder="password">
            <label id="lbpaFeedback"></label>
            <label class="lbl">Re-type password:</label>
            <input class="txtInput" type="password" id="txtRePassword" name="repassword" placeholder="password">
            <label id="lbrepaFeedback"></label>

            <label class="lbl-new-item"></label>
        
        </div>

    </div>
    <script src="javascript/profile.js"></script>
    <script src="javascript/Logout.js"></script>
</body>
</html>

