<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);

    // Check if all fields are filled
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($phone)) {
        echo "All fields are required.";
        exit;
    }

    // Check if email is already registered
    $sql_check = "SELECT * FROM Guests WHERE Email = ?";
    if ($stmt_check = mysqli_prepare($conn, $sql_check)) {
        mysqli_stmt_bind_param($stmt_check, "s", $email);
        if (mysqli_stmt_execute($stmt_check)) {
            mysqli_stmt_store_result($stmt_check);
            if (mysqli_stmt_num_rows($stmt_check) > 0) {
                echo "Email already registered.";
                exit;
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            exit;
        }
        mysqli_stmt_close($stmt_check);
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the insert statement
    $sql = "INSERT INTO Guests (FirstName, LastName, Email, Passkey, Phone) VALUES (?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $hashed_password, $phone);

        if (mysqli_stmt_execute($stmt)) {
            echo "Registration successful. You can now login.";
            header("Location: login.php");
            exit(); // Ensure no further script execution
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
?>