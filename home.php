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

            <div class="nav-inner">
                

                <ul>
                    <div class="dropdown">

                        <img class="dropbtn" src="images/4737445_alarm_alert_bell_notification_ring_icon.png">
                        
                        <div class="dropdown-content">
                    
                        </div>
                    </div>

                    <li><a href="profile.php">Profile</a></li>
                    <li id="logout">Logout</li>
                </ul>
            </div>

        </div>
    </nav>
    
    <div class="main-back-home">
        

            <div class="upper-sec">
                <div method="" action="">
                    <input type="search" placeholder="Search title" id="txtSearch" name="txtSearch" class="txt-search">
                    
                </div>
                
                <div>
                    <a name="btnNewItem" href="NewTask.php" class="new-item">New task</a>
                </div>
            </div>
            
            <div class="tblItems">
                    <table id="tblItems">
                        <thead class="cls-thead">
                            <tr class="cls-th">
                                <th>#</th>                                
                                <th>title</th>
                                <th>Description</th>
                                <th>completion_date</th>
                                <th>assigned_to</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody id="tblTbody">
                            <?php
  session_start();
if(isset($_SESSION['Lusername']) )
{
                $host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "taskManager";
		
		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                
                $sql = "SELECT * FROM tasks";		//SQL code that writes data into the database.
		$result = mysqli_query($conn, $sql);
                
			if($conn->query($sql))		//when information is added to the databse successfully the messgage below is what the user will see.
			{
                            
                          // start a table tag in the HTML

                            while($row = mysqli_fetch_array($result))
                            {   //Creates a loop to loop through results
                                
                                 echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['title']}</td>
                                        <td>{$row['descrption']}</td>
                                        <td>{$row['completion_date']}</td>
                                        <td>{$row['assigned_to']}</td>                    
                                        <td>{$row['status']}</td>
                                            <td>
                                                <form method='POST' action='ViewTask.php?id={$row['id']}' class='form-submit'>

                                                     <input type='hidden' class='pid' name='product_name' value='$pd'>
                                                     <input type='hidden' class='pname' name='product_price' value='$pp'>
                                                    <button class='btn btn-info btn-block addItemBtn'><i class='fas fa-cart-plus'></i>&nbsp;&nbsp;view</button>
                                                  </form>
</td>                                       </td>
                                      </tr>";
                                        
                                
                                //echo "<tr><td>" . $row['PRODUCT_NAME'] . "</td><td>" . $row['PRODUCT_PRICE'] . "</td></tr>";  //$row['index'] the index here is a field name
                            }			
			}
			else		//If information was not added this is what will be shown
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
                        </tbody>
                    </table>
            </div>

            <div class="table-scro">
                <label>&lt;</label>
                <label> Page 1 </label>
                <label>&gt;</label>

            </div>
    </div>
    <script src="javascript/hom2.js"></script>
     <script src="javascript/Logout.js"></script>
</body>
</html>