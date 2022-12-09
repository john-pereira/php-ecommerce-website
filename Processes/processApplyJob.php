<?php 

//Paramenters(host, username, password, databasename)
// $conn = mysqli_connect("localhost","root", "", "bread_shop")
//         or die("Could not connect to the database");

// $application_id = $_POST['application_id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "bread_shop";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

$sql = "insert into jobs_applications(firstName,lastName,email,phone) values('$firstName','$lastName','$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    // echo "ADDED: ".$application_id.", ".$lastName.", ".$email.", ".$phone;
     echo '<script>window.location="../JobApplicationSent.php"</script>';
} else {
    echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();        

// $firstName = $_POST['firstName'];
// $lastName = $_POST['lastName'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];

// $sql = mysql_query("INSERT INTO jobs_applications (firstName, lastName, email, phone)
// VALUES VALUES ('$firstName', '$lastName', '$email', '$phone')");

// if ($conn->query($sql) === TRUE) {
// 	echo "ADDED: ".$firstName.", ".$lastName.", ".$email.", ".$phone;
// } else {
// 	echo "Error: ".$sql."<br>".$conn->error;
// }

// if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
//     $firstName = $_POST['firstName'];
//     $lastName = $_POST['lastName'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     if($name !=''||$email !=''){
//     //Insert Query of SQL
//     $query = mysql_query("INSERT INTO jobs_applications(firstname, lastname, email, phone) 
//     VALUES ('$firstName', '$lastName', '$email', '$phone')");
//     // echo "<br/><br/><span>Data Inserted successfully...!!</span>";
//     echo '<script>window.location="contentPages/contentJobApplicationSent.php"</script>';
//     }
//     else{
//     echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
//     }
//     }
    // mysql_close($connection); // Closing Connection with Server
    

?>