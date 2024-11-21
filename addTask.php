<?php
session_start();

if(isset($_SESSION['Lusername']) )
{
     $title = Filter_input(INPUT_POST, 'txttitle');
$desc = Filter_input(INPUT_POST, 'txtDesc');
$completion_date = Filter_input(INPUT_POST, 'dtDate');
$assigned_to = Filter_input(INPUT_POST, 'txtassign');


if(!empty($title) || !empty($desc) || !empty($completion_date) || !empty($assigned_to))
{
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "taskManager";
		
		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);		//makes connection to the database, using the provided database information.
		
		if(mysqli_connect_error())
		{
			die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error()); 		// Error message to be shown when connection to the database fails, "die" kills the connection.
		}
		else 	//if connection to the database is successful the php file will write data into the database.
		{ 
			$sql = "INSERT INTO tasks (title, descrption, completion_date, status, assigned_to) values('$title', '$desc', '$completion_date', 'pending', '$assigned_to')";		//SQL code that writes data into the database.
			
			if($conn->query($sql))		//when information is added to the database successfully the messgage below is what the user will see.
			{
                            
                         
                           echo '<script>alert("Item HAS BEEN ADDED SUCCESFULLY")</script>';
                            header( "Refresh:0; url=NewTask.php", true, 303);
                            ////header('location: Product.html');
                            //header('<script>alert("Login Successful!")<script>');
				
			}
			else		//If information was not added this is what will be shown
			{
				echo "Error: ". $sql . "<br>" . $conn->error;
			}
			$conn->close(); 	//This ends the connection between the database and the website.
		}
}
else 		//if any info is missing on the "I GET INVOLVED" form, error message to be shown. 
{
	echo "One of the fields is empty, Please provide the required information.b".$title;
	die();		//kills connection.
}      
}
else
{
    echo header("Location: index.php");
}


?>