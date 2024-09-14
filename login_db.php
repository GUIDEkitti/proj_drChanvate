<?php
session_start();
include("config.php");

if (isset($_POST['login_db'])) {
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM Guests WHERE UserName='$user' ";
    $res = mysqli_query($conn, $sql);

    if ($res->num_rows == 1) {
        $row = $res->fetch_assoc();

        if ($pass == $row['Passkey']) {
            if ($row['Roll'] == 1 || $row['Roll'] == 2) {
                if ($row['Roll'] == 2) {
                    //admin
                    $_SESSION['user'] = $row['Firstname'];
                    $_SESSION['roll'] = 2;
                    echo "<script>window.location.href = 'index.php'</script>";
                } elseif ($row['Roll'] == 1) {
                    //user
                    $_SESSION['user'] = $row['Firstname'];
                    $_SESSION['roll'] = 1;
                    echo "<script>alert(
`ยินดีต้อนรับ...
คุณ $user`); window.location.href = 'index.php'</script>";
                } else {
                    echo "<script>alert('ผู้ใช้ยังไม่ผ่านการลงทะเบียน....'); window.location.href='login.php';</script>";
                }
            } else {
                echo "<script>alert('ผู้ใช้ $user ยังไม่ผ่านการยืนยัน...'); window.location.href='login.php';</script>";
            }
        } else {
            echo "<script>alert('ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง..'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง.'); window.location.href='login.php';</script>";
    }
} else {
    echo "<script>window.location.href='index.php';</script>";
}

/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo "<script>alert('ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง...'); window.location.href='login.php';</script>";
        exit;
    }

    $stmt = $conn->prepare("SELECT GuestID, FirstName, Passkey FROM Guests WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($guestID, $firstname, $hashed_password);
        $stmt->fetch();

        // Debugging: Check fetched values
        echo "<script>console.log('Email: " . $email . "');</script>";
        echo "<script>console.log('Password: " . $password . "');</script>";
        echo "<script>console.log('Hashed Password: " . $hashed_password . "');</script>";


        if (password_verify($password, $hashed_password)) {
            $_SESSION['user'] = $firstname;
            $_SESSION['user_id'] = $guestID;
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง..'); window.location.href='login.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง.'); window.location.href='login.php';</script>";
        exit;
    }

    $stmt->close();
} else {
    echo "<script>window.location.href='index.php';</script>";
} */


$conn->close();
?>