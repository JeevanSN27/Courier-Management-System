<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $phone = $_POST['phone'];
    
    // Validate input (you can add more validation)
    if (empty($fullname) || empty($email) || empty($password)) {
        echo "All fields are required.";
    } else {
        // Connect to your database (replace dbname, username, password, and host)
        $conn = new mysqli("localhost", "root", "Charan", "cms_db");
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Insert data into database
        $sql = "INSERT INTO customer (name, email, password, phone_number) VALUES ('$fullname', '$email', '$password',$phone)";
        
        if ($conn->query($sql) === TRUE) {
            include('cust_login.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Close connection
        $conn->close();
    }
}
?>
