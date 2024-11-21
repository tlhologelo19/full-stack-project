<?php
session_start();
if(isset($_SESSION['Lusername']) )
{
    $title = htmlspecialchars(Filter_input(INPUT_POST, 'txttitle'));
    $desc =  htmlspecialchars(Filter_input(INPUT_POST, 'txtDesc'));
    $completion_date = htmlspecialchars(Filter_input(INPUT_POST, 'dtDate'));
    $assigned_to = htmlspecialchars(Filter_input(INPUT_POST, 'txtassign'));
    $status = htmlspecialchars(Filter_input(INPUT_POST, 'status'));

echo "<script>console.log('$title')</script>";
echo "<script>console.log('$desc')</script>";
echo "<script>console.log('$completion_date')</script>";
echo "<script>console.log('$assigned_to')</script>";
echo "<script>console.log('$status')</script>";
echo "<script>console.log('yess')</script>";





$pID = $_GET['id'];


if(!empty($title) || !empty($desc) || !empty($completion_date) || !empty($assigned_to))
{
	/*
	Declares variables then passes database information into these variables
	this includes, the username, password, name of the database, and host name.
	*/	
		 $host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "TaskManager";
		
		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);		//makes connection to the database, using the provided database information.
		
		if(mysqli_connect_error())
		{
			die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error()); 		// Error message to be shown when connection to the database fails, "die" kills the connection.
		}
		else 	//if connection to the database is successful the php file will write data into the database.
		{ 
                    
			$sql = "UPDATE `tasks` SET `title` = '$title', `descrption` = '$desc', `completion_date` = '$completion_date', `assigned_to` = '$assigned_to', `status` = '$status' WHERE `id` = '$pID'"; //SQL code that writes data into the database.
			
			if($conn->query($sql))		//when information is added to the databse successfully the messgage below is what the user will see.
			{
                             
                           echo '<script>alert("item details have been updated successfully")</script>';
                          
                           header( "Refresh:0; url=home.php", true, 0);
                           
                           //header('url = Product.php');
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
	echo "One of the fields is empty, Please provide the required informat,,ion..$desc";
	die();		//kills connection.
}       
}
else
{
    echo header("Location: index.php");
}
/*
These are declared variables for php and
and the values being passed are the values from the html file
for example "FirstName" in your HTML code is where a user inserts their firstname.. 
*/


?>