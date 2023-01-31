<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pizzaType = $_POST['pizza-type'];
$quantity = $_POST['quantity'];

$to = "youremail@example.com";
$subject = "New Pizza Order";
$message = "Name: $name\nEmail: $email\nPizza Type: $pizzaType\nQuantity: $quantity";


$headers = "From: $email";

mail($to, $subject, $message, $headers);

echo "Thank you for your order! We will contact you shortly.";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to database and retrieve user
    $conn = mysqli_connect('localhost', 'root', 'password', 'database');
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);

    // Check if user exists
    if (mysqli_num_rows($result) > 0) {
      // Redirect to homepage
      header('Location: index.html');
    } else {
      // Show error message
      echo 'Incorrect email or password';
    }
  }

?>