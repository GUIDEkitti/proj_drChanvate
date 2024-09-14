<?php include("config.php"); ?>
<?php $Login = "" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container active" id="login-form">
                    <div class="card">
                        <div class="card-header">
                            เข้าสู่ระบบ
                        </div>
                        <div class="card-body">
                            <form action="login_db.php" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">อีเมล</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">รหัสผ่าน</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-success">เข้าสู่ระบบ</button>
                            </form>
                            <div class="hr-container">
                                <hr class="line">
                                <div class="text">เข้าสู่ระบบไม่ได้?</div>
                                <hr class="line">
                            </div>
                            <div class="d-flex justify-content-between py-3">
                                <a href="#" class="btn btn-primary" onclick="toggleForms()">สมัครสมาชิก</a>
                                <a href="#" class="btn btn-secondary">ลืมรหัสผ่าน</a>
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
                            <form action="process_register.php" method="post">
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city" required>
                                </div>
                                <div class="mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100">สมัครสมาชิก</button>
                            </form>
                            <p class="mt-3 text-center">มีรหัสอยู่แล้ว ? <a href="#"
                                    onclick="toggleForms()">เข้าสู่ระบบ</a></p>
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
    </script>
</body>

</html>