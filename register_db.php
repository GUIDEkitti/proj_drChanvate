<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);

    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($phone)) {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน'); window.location.href='login.php';</script>";
        exit;
    }

    $sql_check1 = "SELECT * FROM Guests WHERE Email = ?";
    if ($stmt_check1 = mysqli_prepare($conn, $sql_check1)) {
        mysqli_stmt_bind_param($stmt_check1, "s", $email);
        if (mysqli_stmt_execute($stmt_check1)) {
            mysqli_stmt_store_result($stmt_check1);
            if (mysqli_stmt_num_rows($stmt_check1) > 0) {
                echo "<script>alert('Email นี้ถูกใช้งานแล้วกรุณาเปลี่ยน Email ที่ใช้สมัคร'); window.location.href='login.php';</script>";
                exit;
            }
        } else {
            echo "<script>alert('มีบางอย่างผิดพลาด กลับไปหน้าลงทะเบียน'); window.location.href='login.php';</script>";
            exit;
        }
        mysqli_stmt_close($stmt_check1);
    }

    $sql_check2 = "SELECT * FROM Guests WHERE UserName = ?";
    if ($stmt_check2 = mysqli_prepare($conn, $sql_check2)) {
        mysqli_stmt_bind_param($stmt_check2, "s", $username);
        if (mysqli_stmt_execute($stmt_check2)) {
            mysqli_stmt_store_result($stmt_check2);
            if (mysqli_stmt_num_rows($stmt_check2) > 0) {
                echo "<script>alert('ชื่อผู้ใช้นี้ถูกใช้งานแล้วกรุณาเปลี่ยนชื่อผู้ใช้ที่ใช้สมัคร'); window.location.href='login.php';</script>";
                exit;
            }
        } else {
            echo "<script>alert('มีบางอย่างผิดพลาด กลับไปหน้าลงทะเบียน'); window.location.href='login.php';</script>";
            exit;
        }
        mysqli_stmt_close($stmt_check2);
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Guests (FirstName, LastName, UserName, Email, Passkey, Phone) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $username, $email, $hashed_password, $phone);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('ลงทะเบียนเรียบร้อย กลับไปหน้าลงทะเบียน'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('มีบางอย่างผิดพลาด กลับไปหน้าลงทะเบียน'); window.location.href='login.php';</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด กลับไปหน้าลงทะเบียน'); window.location.href='login.php';</script>";
    }

    $conn->close();
} else {
    echo "<script>window.location.href='index.php';</script>";
}
?>