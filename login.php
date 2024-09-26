<?php include("config.php"); ?>
<?php
$Login = "";
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        .hr-container {
            display: flex;
            align-items: center;
            text-align: center;
            width: 100%;
        }

        .line {
            flex: 1;
            border: none;
            border-top: 1px solid black;
        }

        .text {
            padding: 0 10px;
        }

        .form-container {
            display: none;
        }

        .form-container.active {
            display: block;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>



    <div class="container mt-5" style="height: calc(100vh - 253px - 56px - 6rem);">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-5 col-xl-4">
                <div class="form-container active" id="login-form">
                    <div class="card">
                        <!-- <div class="card-header">
                            เข้าสู่ระบบ
                        </div> -->

                        <div class="card-body">
                            <form action="login_db.php" method="POST">
                                <div class="py-3">
                                    <!-- <label for="user" class="form-label">ชื่อผู้ใช้</label> -->
                                    <input type="text" class="form-control" id="user" name="user" placeholder="ชื่อผู้ใช้" required>
                                </div>
                                <div class="mb-3">
                                    <!-- <label for="password" class="form-label">รหัสผ่าน</label> -->
                                    <input type="password" class="form-control" id="" name="password" placeholder="รหัสผ่าน" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100" name="login_db">เข้าสู่ระบบ</button>
                            </form>
                            <div class="text-center">
                                <a href="#" class="text-reset">ลืมรหัสผ่าน?</a>
                            </div>
                            <hr class="border-bottom border border-dark">
                            <!-- <div class="hr-container">
                                <hr class="line">
                                <div class="text">เข้าสู่ระบบไม่ได้?</div>
                                <hr class="line">
                            </div> -->
                            <div class="pb-3 text-center">
                                <a href="#" class="btn btn-primary" onclick="toggleForms()">สร้างบัญชีผู้ใช้</a>
                                <!-- <a href="#" class="btn btn-secondary">ลืมรหัสผ่าน?</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-container" id="register-form">
                    <div class="card">
                        <div class="card-header">
                            สมัครสมาชิก
                        </div>
                        <div class="card-body">
                            <form id="register-form" action="register_db.php" method="post"
                                onsubmit="return validatePasswords()">
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lastname" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">ชื่อผู้ใช้</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">รหัสผ่าน</label>
                                    <input type="text" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">ยืนยัน รหัสผ่าน</label>
                                    <input type="text" class="form-control" id="confirm_password"
                                        name="confirm_password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">เบอร์ติดต่อ</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100">สมัครสมาชิก</button>
                            </form>
                            <p class="mt-3 text-center">มีสมาชิกอยู่แล้ว ? <a href="#"
                                    onclick="toggleForms()">เข้าสู่ระบบ</a></p>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleForms() {
            var loginForm = document.getElementById('login-form');
            var registerForm = document.getElementById('register-form');
            loginForm.classList.toggle('active');
            registerForm.classList.toggle('active');
        }

        function alertError() {
            var loginForm = document.getElementById('exampleModalCenter');
            loginForm.classList.toggle('active');
            registerForm.classList.toggle('active');
        }

        function validatePasswords() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            if (password != confirmPassword) {
                alert('ท่านกรอกรหัสไม่ตรงกัน กรุณาลองอีกครั้ง');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
<?php $conn->close(); ?>