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
            <label id="txtTime"></label>

            <div>
                <ul>
                    <li><a href="profile.php">Profile</a></li>
                    <li id="logout">Logout</li>
                </ul>
            </div>

        </div>
    </nav>

    <div class="main-back">

            <div class="form" id="frmnew-item">
                <div class="upper-sec">
                    <label class="lbl-new-item">Edit Item</label>
                    
                    <div class="div-btn">
                        <a name="btnCancel" id="btnCancel" href="home.php" class="new-item">Close</a>
                    </div>
                </div>
                
                <?php
             
             session_start();
if(isset($_SESSION['Lusername']) )
{
    $pID = $_GET['id'];
        
                $host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "TaskManager";
		
		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                
                $sql = "SELECT * FROM tasks where id = '$pID'";		
		$result = mysqli_query($conn, $sql);
                
			if($conn->query($sql))		
			{
                           
                            while($row = mysqli_fetch_array($result))
                            {   //Creates a loop to loop through results
                                
                                     echo <<<_END

                                            <form method='POST' action='EditTask.php?id={$row['id']}' class='form-submit'>
                                             <label class="lbl">Title: </label>
                                            <input class="txtInput" type="text" id="txttitle" name="txttitle" value="{$row['title']}" required placeholder="Title..."/>
                                            <label id="lblunFeedback"></label>
                                           <br>
                                            <label class="lbl">Description: </label>
                                            <textarea class="txtInput" required id="txtDesc" name="txtDesc">{$row['descrption']}</textarea>
                                            <label id="lbpaFeedback"></label>
                                            
                                            <label class="lbl">Completion Date: </label>
                                            <input class="txtInput" value="{$row['completion_date']}" type="date" id="dtDate" required name="dtDate" placeholder="Due Date..."/>
                                            <label id="lbrepaFeedback"></label>
                                            
                                            <br>
                                            <label class="lbl">Assigned to: </label>
                                            <input class="txtInput" type="text" value="{$row['assigned_to']}" id="txtassign" name="txtassign" required placeholder="assign to..."/>
                                             <br>
                                            <label class="lbl">Status: </label>
                                            <select class="txtInput"id="status" name="status">
                                                <option value="pending">pending</option>
                                                <option value="in-progress">in-progress</option>
                                                <option value="completed">completed</option>
                                            </select>
                                            
                                            <br>
                                            <input class='btn btn-info btn-block addItemBtn new-item' type='submit' value='Update' />
                                            
                                              </form>
                                                    
                                            <form method='POST' action='delete.php?id={$row['id']}' class='form-submit'>
                                           
                                              <button class='btn btn-info btn-block addItemBtn new-item'><i class='fas fa-cart-plus'></i>&nbsp;&nbsp;Delete</button>
                                            </form>
                               
                                
                                _END;
                                    
                            }	
                            
                            
			}
			else
			{
				echo "Error: ". $sql . "<br>" . $conn->error;
			}
			$conn->close();        
}
else
{
    echo header("Location: index.php");
}
                
             

                ?>

               
            </div>

    </div>
    
    <script src="javascript/ViewItem.js"></script>
    <script src="javascript/Logout.js"></script>
    
</body>
</html>