<?php

$username = Filter_input(INPUT_POST, 'username');
$password = Filter_input(INPUT_POST, 'password');

if(!empty($username) || !empty($password))
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

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";		
        
        $result = mysqli_query($conn, $sql);
            if($conn->query($sql))		
            {

                $count = mysqli_num_rows($result);

                if($count != 0)
                {
                                      
                    session_start();
                    $pID = '';
                    $pRole = '';
                    
                    $_SESSION['Lusername'] = $username;
//                        $_SESSION['Lusername'] = $pID;
                    while($row = mysqli_fetch_array($result))
                    {
                        $pID = $row['ID'];
                        $pRole = $row['role'];
                    }
                    
                    if($pRole === "Admin")
                    {
                        header("Location: home.php");
                    }
//                    else if($pRole === "Advisor")
//                    {
//                        header("Location: StudentAdvisorDash.php");
//                    }
//                    else if($pRole === "cashiers")
//                    {
//                        header("Location: CashierDash.php");
//                    }
//                    else if($pRole === "nurses")
//                    {
//                        header("Location: NurseDocDash.php");
//                    }
//                    else if($pRole === "AdmissionsCoo")
//                    {
//                        header("Location: AdmissionCoDash.php");
//                    }

                        
                  
                        
                }
                else
                {
                   echo '<script>alert("Login failed, User not found.")</script>';

                    header( "Refresh:0; url=index.php", true, 303);
                }     			
            }
            else
            {
                    echo "Error: ". $sql . "<br>" . $conn->error;
            }
            $conn->close(); 	 	//This ends the connection between the database and the website.
    }
}
else 		//if any info is missing on the "I GET INVOLVED" form, error message to be shown. 
{
	echo "One of the fields is empty, Please provide the required information.";
	die();		//kills connection.
}